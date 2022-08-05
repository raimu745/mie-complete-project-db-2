<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function editpro(){

        return view('admin/editprofile');
    }
    public function updateprofile(Request $request)
    {

        $id = auth()->user()->id;
        $image_user = null;
        $check = User::where('id',$id)->first();

        if($request->hasfile('image'))
        {
            $destination = public_path().'/assets/uploads/'.$check->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('assets/uploads/', $filename);
            $image_user = $filename;
        }else{
            $image_user = $check->image;
        }
        try{
            DB::beginTransaction();

        $update = new User;
        
        $update->exists = true;
        $update->id = $id;
        $update->name = $request->name;
        $update->email = $request->email;
        $update->image = $image_user;
        $update->save();

        DB::commit();
        
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
    }catch(Exception $e){
        DB::rollback();
        $notification = array(
            'message' => $e->getMessage(),
            'alert-type' => 'warrning'
        );
        return redirect()->back()
            ->with($notification);
          
    }
    }
    function updatepass(Request $request){
        // dd('hi');
        $request->validate([
                          
          
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        
   
       ]);
       try{
        DB::beginTransaction();

       $update = new User;
       $update->exists = true;
       $update->id = auth()->user()->id;
       $update->password = Hash::make($request->password);
       $update->save();
       
       DB::commit();

       $notification = array(
        'message' => 'Password Updated Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()
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
    
}
