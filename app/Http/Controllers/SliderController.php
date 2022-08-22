<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Exception;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slider()
    {

        return view('admin.slider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sliderstore(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

       ]);
    //    dd($request);
       try{
        DB::beginTransaction();
      $slider = new Slider();
      $slider->name = $request->name;

      if($request->hasfile('image'))
      {
          $file = $request->file('image');
          $extenstion = $file->getClientOriginalExtension();
          $filename = time().'.'.$extenstion;
          $file->move('assets/uploads/slider/', $filename);
          $slider->image = $filename;
      }
      $slider->save();

      DB::commit();

      $notification = array(
       'message' => 'Slider Added Successfully',
       'alert-type' => 'success'
   );
   return redirect()->route('slider.table')
       ->with($notification);

    }

    catch(Exception $e){
        DB::rollback();
        $notification = array(
            'message' => $e->getMessage(),
            'alert-type' => 'warrning'
        );
        return redirect()->back()
            ->with($notification);

    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stable()
    {

        $slider = Slider::where('status',1)->orderby('id','desc')->get();

        return view('admin.viewslider',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id =decrypt($request->id);
        //  $id = $slider->id ;
       $slider = Slider::find($id);
       $slider->delete();

       $notification = array(
        'message' => 'Slider Deleted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()
        ->with($notification);
    }

    function editsld($id){

        $id = decrypt($id);
        $slider = Slider::find($id);

        return view('admin.editslider',compact('slider'));
    }
    function updateslider(Request $request, $id){
    //    echo 'ok';




    $check = Slider::find($id);


      $image = null;

    if($request->hasFile('image')){
        $destination = 'assets/uploads/slider/'.$check->file;
        if(File::exists($destination)){
            File::delete($destination);
        }

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' .$extension;
        $file->move('assets/uploads/slider/',$filename);
        $image = $filename;
    }else{
        $image = $check->image;
    }
    // $image =empty($image) ?$check->image :$image;
    $slider = new Slider();
    $slider->exists = true;
    $slider->id = $id;
    $slider->name = $request->name;
    $slider->status = $request->status;
    $slider->image = $image;
    $slider->save();
    // dd($slider);

       $notification = array(
        'message' => 'Slider Updated Successfully',
        'alert-type' => 'success'
    );
      return redirect()->route('slider.table')
        ->with($notification);


    }
    public function datatable(Request $request){
        // return 'table';

            $data = Slider::latest()->get();

            return DataTables::of($data)
            ->addIndexColumn()
            
            ->addColumn('image', function($row){
                return '<a class="image-popup-vertical-fit no gaps, zoom animation" href="'.asset("assets/uploads/slider/".$row->image).'" title="'.$row->name.'">
                <img src="'.asset("assets/uploads/slider/".$row->image).'" width="75" height="75">';
            })
            ->addColumn('action', function($row) {
                   return '<a type="button" href="'.route("edit.slider",["id"=> encrypt($row->id)]).'" class="btn btn-sm btn-primary "> <i class="fa fa-pencil-alt"></i> </a>

											<a  href='.route("slider.destroy",["id"=> encrypt($row->id)]).' class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
            })
            ->rawColumns(['image','action'])
            ->make(true);

        //return view('viewslider');

    }
}

