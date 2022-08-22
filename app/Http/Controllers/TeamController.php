<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    function index(){
        return view('admin.team');
    }
    function store(Request $request){

     $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);   
     $team = new Team();
     $team->name = $request->name;
     $team->description = $request->description;
     $image = "";
     if($request->hasfile('image'))
     {
         $file = $request->file('image');
         $extenstion = $file->getClientOriginalExtension();
         $filename = time().'.'.$extenstion;
         $file->move('assets/team/', $filename);
         $image = $filename;
     }
     $team->image = $image;
     $team->fb_link = $request->fb_link;
     $team->twitter_link = $request->twitter_link;
     $team->save();

     $notification = array(
        'message' => 'Team data Save Successfully',
        'alert-type' => 'success'
    );

     return redirect()->route('team.show')->with($notification);

    }
    function show(){
       
        return view('admin.teamview');
       
    }

    function teamDatatable(Request $request){
        $data = Team::latest()->get();

        return DataTables::of($data)
        ->addIndexColumn()
        
        ->addColumn('image', function($row){
            return '<img src="'.asset("assets/team/".$row->image).'" width="75" height="75">';
        })
        ->addColumn('action', function($row) {
               return '<a type="button" href="'.route("team.edit",["id"=> encrypt($row->id)]).'" class="btn btn-sm btn-primary "> <i class="fa fa-pencil-alt"></i> </a>

                                        <a  href='.route("team.del",["id"=> encrypt($row->id)]).' class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
        })
        ->rawColumns(['image','action'])
        ->make(true);

    }

     function teamEdit(Request $request){
        $id = decrypt($request->id);
       $edit = Team::find($id);
       return view('admin.edit_team',compact('edit'));

     }
      function teamUpdate(Request $request){
        $id = decrypt($request->id);
       $update =  new Team();
       $update->exists = true;
       $update->id = $id;
       $update->name = $request->name;
     $update->description = $request->description;
     $image = "";
     if($request->hasfile('image'))
     {
         $file = $request->file('image');
         $extenstion = $file->getClientOriginalExtension();
         $filename = time().'.'.$extenstion;
         $file->move('assets/team/', $filename);
         $image = $filename;
     }else{
        $check =Team::find($id);
        $image = $check->image;
     }
     $update->image = $image;
     $update->fb_link = $request->fb_link;
     $update->twitter_link = $request->twitter_link;
     $update->save();

     $notification = array(
        'message' => 'Team member updated Successfully',
        'alert-type' => 'success'
    );
     return redirect()->route('team.show')->with($notification);
      }
     
    function teamDel(Request $request){
        $id = decrypt($request->id);
        Team::find($id)->delete();
        $notification = array(
            'message' => 'Team member deleted successfully',
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notification);

    }
}
