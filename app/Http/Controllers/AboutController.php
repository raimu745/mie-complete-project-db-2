<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Exception;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\DB;


class AboutController extends Controller
{
    function index(){
        
        $about = About::find(1);
        return view('admin.about',compact('about'));
    }
    function store(Request $request){
    //   dd($request->all());
    $image ="";
    if($request->hasfile('image'))
    {
        $file = $request->file('image');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('assets/about/', $filename);
        $image = $filename;
    }else{
        $about = About::find(1);
        $image = $about->image;
      
    }
      $about = new About();
      $about->exists = true;
      $about->id = 1;
      $about->title = $request->title;
      $about->description = $request->editor1;
      $about->image = $image;
      $about->s2_title = $request->s2_title;
      $about->s2_description = $request->editor2;

      $about->save();
      $notification = array(
        'message' => 'About Description Save Successfully',
        'alert-type' => 'success'
    );
     return redirect()->back()->with($notification);
    }
    
    function view_Page(){
        return view('admin.about_view');
    }
    public function show(Request $request){
        
        // return 'table';

            $data = About::latest()->get();

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('id', function($row){
                $i =1;
                  return $i++;
            })
            ->addColumn('image', function($row){
                return '<img src="'.asset("assets/about/".$row->image).'" width="75" height="75">';
            })
            ->addColumn('title', function($row){
                return $row->title;
            })
            ->addColumn('description', function($row){
                return $row->description;
            })
            ->rawColumns(['id','image','title','description','action'])
            ->make(true);

        //return view('viewslider');

    }
    
}
