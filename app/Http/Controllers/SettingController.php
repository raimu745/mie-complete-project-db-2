<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index(){
         $setting = Setting::find(1);
        return view('admin.settings',compact('setting'
    ));
    }
    function store(Request $request){
     
      

        $image ="";
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('assets/setting/', $filename);
            $image = $filename;
        }else{
            $setting = Setting::find(1);
            $image = $setting->logo;
          
        }
        $setting = new Setting();
        $setting->exists=true;
        $setting->id =1;
        $setting->logo = $image;
        $setting->email = $request->input('email');
        $setting->address = $request->input('address');
        $setting->phone_nbr = $request->input('phone_nbr'); 
        $setting->facebook_link = $request->input('facebook_link');
        $setting->save();
        $notification = array(
            'message' => 'Setting Save Successfully',
            'alert-type' => 'success'
        );
         return redirect()->back()->with($notification);

    }
}
