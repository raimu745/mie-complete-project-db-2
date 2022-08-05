<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Location\Facades\Location;

class AdminRegisterController extends Controller
{
    function register(){
        return view('admin.register');
    }
    function login(){
        return view('admin.login');
    }
    function regstore(Request $request){
       
        
        $request->validate([
                          
                 'email' => 'string | email | unique:users',
                 'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                 'password_confirmation' => 'min:6',
                 'name'=>'required',
                 'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
            ]);
            try{
                DB::beginTransaction();

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('assets/uploads/', $filename);
            $user->image = $filename;
        }
        $user->save();

       // $ip= $request->ip();

        $ip = '103.7.78.173';
        $data = Location::get($ip);
        $user->visitor()->create([
            'ip_address' => $ip,
            'country_name' =>  $data->countryName ,
            'country_code' => $data->countryCode,
            'region_code' => $data->regionCode,
            'region_name' => $data->regionName,
            'city_name' =>  $data->cityName,
            'zip_code' => $data->zipCode,
            'latitude' => $data->latitude,
            'longitude'=> $data->longitude,            
            'area_code'=> $data->areaCode,
        ]);

        /////////////////  Emai lsend function /////////////////
        $data = ['fullname' => $request->name,'id' => $user->id];
                    $user['to'] = $request->email;
                    $user['name'] = $request->name;
                   $view='email.email_verify';
                  Mail::send($view,$data, function ($message) use ($user) {
                    $message->to($user['to']);
                    $message->subject('Hello ' . ' ' . $user['name']);
                });
                DB::commit();
        $notification = array(
            'message' => 'Please Verify Your Email',
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

    public function login_verify(Request $request)
    {
        
        $id =  decrypt($request->id);
        $customer = new User();
        $customer->exists=true;
        $customer->id = $id;
        $customer->verify = 1;
        $customer->save();
        if ($customer==true) {
            return redirect()->route('login');
        }

}
    public function loginstore(Request $request){
        $request->validate([
                          
            'email'=>'required',
            'password' => 'min:6|required',
                                  
       ]);
       $check=User::where('email',$request->email)->first();

       if($check){
       if($check->verify == '1'){

       if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }
    else{
        $notification = array(
            'message' => 'The provided credentials do not match our records.',
            'alert-type' => 'error'
        );
        return redirect()->back()
            ->with($notification);
    }
       }else{
        $data = ['fullname' => $check->name,'id' => $check->id];
        $user['to'] = $request->email;
        $user['name'] = $request->name;
       $view='email.email_verify';
      Mail::send($view,$data, function ($message) use ($user) {
        $message->to($user['to']);
        $message->subject('Hello ' . ' ' . $user['name']);
    });
    $notification = array(
        'message' => 'Please Verify Your Email',
        'alert-type' => 'success'
    );
    return redirect()->back()
        ->with($notification);
       }
    }else{
        $notification = array(
            'message' => 'The provided credentials do not match our records.',
            'alert-type' => 'error'
        );
        return redirect()->back()
            ->with($notification);
    }
    
    }
    function forget(){
        return view('admin.forget');
    }

    function logoutUser(){ 
              
        Auth::logout();        
        return redirect()->route('logout.user');
    }

    function forgetmail(Request $request){
        $check=User::where('email',$request->email)->first();
       
        if($check != null  &&  $check->verify == '1'){
            $data = ['fullname' => $check->name,'id' => $check->id];
            $user['to'] = $request->email;
            $user['name'] = $request->name;
           $view='email.forgetPassword';
          Mail::send($view,$data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject('Hello ' . ' ' . $user['name']);
        });
        $notification = array(
            'message' => 'Please Check Your Email To Reset Your Password',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
             
           
        }else{
            $notification = array(
                'message' => 'Email Cannot Exist',
                'alert-type' => 'error'
            );
            return redirect()->back()
                ->with($notification);
                 
        }
    }

    function forgetuser(Request $request){
        $id = decrypt($request->id);
        return view('admin.resetform',['id'=>$id]);
    }
    function resetform(Request $request){
        
        $request->validate([
                          
            
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            
           
       ]);
     
       $update = User::where('id',$request->id)->update([
            'password' => Hash::make($request->password)
       ]);  
       

       $notification = array(
        'message' => 'Password Updated Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('login')
        ->with($notification);
         
         


       
    }
}
