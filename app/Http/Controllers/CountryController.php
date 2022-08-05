<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CountryDes;
use App\Models\CountryDesImage;
use App\Models\CountryImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    public function index(){
        return view('admin.country');
    }

    public function store(Request $request){



        $request->validate([

            'name'=>'required',
            'file' => 'required|max:2048',

       ]);
       try{
        DB::beginTransaction();
      $country = new Country();
      $country->name = $request->name;
      $country->save();
      foreach( $request->file('file') as  $file ) {

        $name=time() . '-' . $file->getClientOriginalName();
       $file->move('uploads/country/',$name);
       CountryImage::create([
                 'image' => $name,
                 'country_id' => $country->id,
    ]);
}
      DB::commit();

      $notification = array(
       'message' => 'Country Added Successfully',
       'alert-type' => 'success'
   );
   return redirect()->route('country.show')
       ->with($notification);

    } catch(Exception $e){
        DB::rollback();
        $notification = array(
            'message' => $e->getMessage(),
            'alert-type' => 'warrning'
        );
        return redirect()->back()
            ->with($notification);

    }
    }
    public function show(){
        $country = Country::orderBy('id', 'DESC')->get();
        return view('admin.viewcountry',compact('country'));

    }
    public function destroy(Request $request,$id){
        $id = decrypt($request->id);
        $country = Country::find($id);
        $country->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'danger'
        );
        return redirect()->back()
            ->with($notification);
        }
        public function edit($id){
            $id = decrypt($id);
            $country = Country::find($id);

        return view('admin.editcountry',compact('country'));
        }
        function update(Request $request, $id){

            $check = Country::find($id);
            //   $image = null;
            // if($request->hasFile('image')){
            //     $destination = 'uploads/country/'.$check->file;
            //     if(File::exists($destination)){
            //         File::delete($destination);
            //     }

            //     $file = $request->file('image');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = time() . '.' .$extension;
            //     $file->move('uploads/country/',$filename);
            //     $image = $filename;
            // }else{
            //     $image = $check->image;
            // }

            $country = new Country();
            $country->exists = true;
            $country->id = $id;
            $country->name = $request->name;
            $country->save();
           if($request->file('file')){
            foreach($request->file('file') as  $file ) {

                $name=time() . '-' . $file->getClientOriginalName();
               $file->move('uploads/country/',$name);
               CountryImage::create([
                         'image' => $name,
                         'country_id' => $country->id,
            ]);
        }
    }
               $notification = array(
                'message' => 'Country Updated Successfully',
                'alert-type' => 'success'
            );
              return redirect()->back()
                ->with($notification);


            }
            public function desfront(){
                $countries = Country::all();
                return view('admin.countrydes',compact('countries'));
            }

            public function countrydesAdd(Request $request){
                // dd($request->description);
                // dd($request->country_id);

                //  dd($request->all());


                // $images_bid =[];
                // foreach( $request->file('image') as $k => $file ) {

                //     $name=time() . '-' . $file->getClientOriginalName();
                //    $file->move('uploads/country/',$name);
                //     $images[]=$name;
                //     $data = collect([
                //         'image' => $images[$k],
                //     ]);
                //     $images_bid[] = $data->toArray();
                // }

                // dd($images_bid);


                $countryDes = new CountryDes();
                $countryDes->title = $request->input('title');
                $countryDes->description = $request->input('description');
                $countryDes->country_id = $request->country_id;
                $countryDes->save();




        $notification = array(
            'message' => 'Country Added Successfully',
            'alert-type' => 'success'
        );

                return redirect()->back()->with($notification);
            }

        public function countryimage(Request $request){
            $CountryDes = CountryDes::all();
            return view('admin.countryDesImage',compact('CountryDes'));
        }

        public function countryeye(Request $request){

           $id = $request->id;
           $images = CountryImage::where('country_id',$id)->get();

           $html = view('admin.displayimages',compact('images'))->render();
           return json_encode(['data'=>$html]);
        }

        public function singleimg(Request $request,$id){
            $id = decrypt($id);
            $countryImage = CountryImage::find($id);
            $countryImage->delete();

            $notification = array(
                'message' => 'Image Deleted Successfully',
                'alert-type' => 'danger'
            );

                    return redirect()->back()->with($notification);
        }
          public function Countrydatatable(){
            //  return 'hi';
            $data = Country::latest()->get();

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('id', function($row){
                $i =1;
                  return $i++;
            })
            ->addColumn('image', function($row){
             $countryImage     = CountryImage::where('country_id',$row->id)->first();
               if(isset($countryImage)){
                return '<img src="'.asset("uploads/country/".$countryImage->image).'" width="75" height="75">';
            }else{
                return '<img src="	https://crm.scholarseries.com/public/img/80.png" width="75" height="75">';
            }
            })
            ->addColumn('action', function($row) {
                   return '<a type="button" href="'.route("country.edit",['id' => encrypt($row->id)]).'" class="btn btn-sm btn-primary "> <i class="fa fa-pencil-alt"></i> </a>

											<a  href="'.route("country.destroy",['id'=> encrypt($row->id)]).'" class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
            })
            ->rawColumns(['id','image','action'])
            ->make(true);

          }
          public function viewDesdescript(){
            return view('admin.countrydescription');
          }

          public function countryDesdescript(){
            //  return 'hi';
            $data = CountryDes::latest()->get();

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('id', function($row){
                $i =1;
                  return $i++;
            })
            ->addColumn('country', function($row){


             $country   =  Country::where('id',$row->country_id)->first();
            if(isset($country)){
            return ucfirst($country->name);
            }
            })

            ->addColumn('action', function($row) {
                   return '<a type="button" href="'.route("country.edit",['id' => encrypt($row->id)]).'" class="btn btn-sm btn-primary "> <i class="fa fa-pencil-alt"></i> </a>

											<a  href="'.route("country.destroy",['id'=> encrypt($row->id)]).'" class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
            })
            ->rawColumns(['id','country','action'])
            ->make(true);

          }

    }

