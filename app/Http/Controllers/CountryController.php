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
    public function index()
    {
        return view('admin.country');
    }

    public function store(Request $request)
    {



        $request->validate([

            'name' => 'required',
            'file' => 'required|max:2048',

        ]);
        try {
            DB::beginTransaction();
            $country = new Country();
            $country->name = $request->name;
            $country->save();
            foreach ($request->file('file') as  $file) {

                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('uploads/country/', $name);
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
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'warrning'
            );
            return redirect()->back()
                ->with($notification);
        }
    }
    public function show()
    {
        $country = Country::orderBy('id', 'DESC')->get();
        return view('admin.viewcountry', compact('country'));
    }
    public function destroy(Request $request, $id)
    {
        $id = decrypt($request->id);
        $country = Country::find($id);
        $country->delete();

        $notification = array(
            'message' => 'Country Deleted Successfully',
            'alert-type' => 'danger'
        );
        return redirect()->back()
            ->with($notification);
    }
    public function edit($id)
    {
        $id = decrypt($id);
        $country = Country::find($id);

        return view('admin.editcountry', compact('country'));
    }
    function update(Request $request, $id)
    {

        $check = Country::find($id);

        $country = new Country();
        $country->exists = true;
        $country->id = $id;
        $country->name = $request->name;
        $country->save();
        if ($request->file('file')) {
            foreach ($request->file('file') as  $file) {

                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('uploads/country/', $name);
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
    public function desfront()
    {
        $countries = Country::all();
        return view('admin.countrydes', compact('countries'));
    }

    public function countrydesAdd(Request $request)
    {
        $request->validate([
                        
            'title' => 'required',
            'country_id' => 'required',
            'editor1' => 'required',
            'intake' => 'required',
   
       ]);
        $countryDes = new CountryDes();
        $countryDes->title = $request->input('title');
        $countryDes->description = $request->input('editor1');
        $countryDes->country_id = $request->country_id;
        $countryDes->intake = $request->intake;
        $countryDes->save();
        $notification = array(
            'message' => 'Country Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('country.des.view')->with($notification);
    }

    public function countryimage(Request $request)
    {
        $CountryDes = CountryDes::all();
        return view('admin.countryDesImage', compact('CountryDes'));
    }

    public function countryeye(Request $request)
    {

        $id = $request->id;
        $images = CountryImage::where('country_id', $id)->get();

        $html = view('admin.displayimages', compact('images'))->render();
        return json_encode(['data' => $html]);
    }

    public function singleimg(Request $request, $id)
    {
        $id = decrypt($id);
        $countryImage = CountryImage::find($id);
        $countryImage->delete();

        $notification = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function Countrydatatable()
    {
        //  return 'hi';
        $data = Country::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
                $i = 1;
                return $i++;
            })
            ->addColumn('image', function ($row) {
                $countryImage     = CountryImage::where('country_id', $row->id)->first();
                if (isset($countryImage)) {
                    return '<img src="' . asset("uploads/country/" . $countryImage->image) . '" width="75" height="75">';
                } else {
                    return '<img src="	https://crm.scholarseries.com/public/img/80.png" width="75" height="75">';
                }
            })
            ->addColumn('action', function ($row) {
                return '<a type="button" href="' . route("country.edit", ['id' => encrypt($row->id)]) . '" class="btn btn-sm btn-primary "> <i class="fa fa-pencil-alt"></i> </a>

											<a  href="' . route("country.destroy", ['id' => encrypt($row->id)]) . '" class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
            })
            ->rawColumns(['id', 'image', 'action'])
            ->make(true);
    }
    public function viewDesdescript()
    {
        return view('admin.countrydescription');
    }

    public function countryDesdescript()
    {
        //  return 'hi';
        $data = CountryDes::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
                $i = 1;
                return $i++;
            })
            ->addColumn('country', function ($row) {


                $country   =  Country::where('id', $row->country_id)->first();
                if (isset($country)) {
                    return ucfirst($country->name);
                }
            })
            ->addColumn('intake', function ($row) {
                  $date = $row->intake;
                    return date('d-F-Y', strtotime($date));
  
            
            })
            ->addColumn('description', function ($row) {
                $description = $row->description;
                  return "$description";

          
          })


            ->addColumn('action', function ($row) {
                return '<a type="button" href="' . route("country.edit", ['id' => encrypt($row->id)]) . '" class="btn btn-sm btn-primary "> <i class="fa fa-pencil-alt"></i> </a>

				<a  href="' . route("country.DesdescriptDel", ['id' => encrypt($row->id)]) . '" class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
            })

            ->rawColumns(['id','country','intake','description','action'])
            ->make(true);
    }

    function countryDesdescriptDel(Request $request)
    {
        $id = decrypt($request->id);
        $country = CountryDes::find($id);
        $country->delete();

        $notification = array(
            'message' => 'Country Description Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
    }
}
