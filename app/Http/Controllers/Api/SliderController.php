<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function data(Request $request){
       if($request->name == null){
        $response  = ['success'=>false,'msg'=>'name is required'];
        return response()->json($response);
       }
        if($request->file('image') == null){
           $response = ['success'=>false,'message'=>'Image field is required'];
       return response()->json($response);
        }
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

       $response = ['success'=>true,'data'=>$slider,'message'=>'slider is added successfully'];
       return response()->json($response);
   }

     function delete(){
        //  $msg = ['msg'=>'some issue'];
        //  return response()->json($msg);
         dd('123');
     }
}
