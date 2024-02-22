<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Country;
use App\Models\CountryDes;
use App\Models\CountryVisitor;
use App\Models\Setting;
use App\Models\SiteVisitor;
use App\Models\Slider;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Location\Facades\Location;


class HomeController extends Controller
{
    function index(Request $request){
        $slider = Slider::where('status',1)->latest()->limit(4)->get();
        if(isset($slider[0])){
         $s1 = $slider[0]->image;
        }
        else{
            $s1="https://crm.scholarseries.com/public/img/80.png";
           
        }
        if(isset($slider[1])){
         $s2 = $slider[1]->image;
        }
        else{
            $s2="https://crm.scholarseries.com/public/img/80.png";
           
        }
        if(isset($slider[2])){
         $s3 = $slider[2]->image;
        }
        else{
                        $s3="https://crm.scholarseries.com/public/img/80.png";
            
        }
        if(isset($slider[3])){
         $s4 = $slider[3]->image;
        }
        else{
            $s4="https://crm.scholarseries.com/public/img/80.png";
        }

        // $ip= $request->ip();

        $ip = '103.7.78.173';
        $data = Location::get($ip);
       
        SiteVisitor::create([
            'ip_address' => $ip,
            'country_name' =>  $data->countryName ,
            'country_code' => $data->countryCode,
            'region_code' => $data->regionCode,
            'region_name' => $data->regionName,
            'city_name' =>  $data->cityName,
            'zip_code' => isset($data->zipCode) ?$data->zipCode :'',
            'latitude' => $data->latitude,
            'longitude'=> $data->longitude,            
            'area_code'=> $data->areaCode,
        ]);

        $country = Country::limit(6)->get();

         

        return view('site.home',compact('s1','s2','s3','s4','country'));
    }


      function countryDetails(Request $request){
          $id = decrypt($request->id);
          $country_des = CountryDes::where('country_id',$id)->latest()->first();
          $ip = '103.7.78.173';
          $data = Location::get($ip);
          DB::beginTransaction();

try {
          CountryVisitor::create([
              'ip_address' => $ip,
              'country_name' =>  $data->countryName ,
              'country_code' => $data->countryCode,
              'region_code' => $data->regionCode,
              'region_name' => $data->regionName,
              'city_name' =>  $data->cityName,
              'zip_code' => isset($data->zipCode) ?$data->zipCode :'',
              'latitude' => $data->latitude,
              'longitude'=> $data->longitude,            
              'area_code'=> $data->areaCode,
              'country_id' => $id
          ]);
          DB::commit();
        }catch(Exception $e){
            DB::rollback();
          return view('site.countrydescription',compact('country_des')); 

        }
         
          return view('site.countrydescription',compact('country_des')); 

       
      }

      function destination(){
        $country = Country::orderBy('id','Desc')->get();

        return view('site.destination',compact('country'));

      }
      function about(){
        $about = About::find(1);
        $team = Team::all();
        return view('site.about',compact('about','team'));
    }

    function contact(Request $request){
        $contact = Setting::find(1);
        
       return view('site.contact',compact('contact'));
    }

 
      function contact_save(Request $request){
         
           
            $setting = Setting::find(1);
             $save = new Contact();
             $save->name = $request->name;
             $save->email = $request->eamil1;
             $save->phone = $request->phone;
             $save->message = $request->message;
             $save->save();
            if($save == true){
                try{
                $data = ['name' => $request->name,'id' => $save->id,'message1'=>$request->message,'email1'=>$request->eamil1];
                $user['to'] = $setting->email;
                $user['name'] = "Admin";
               $view='email.message';
              Mail::send($view,$data, function ($message) use ($user,$request) {
                $message->to($user['to'])->cc([$request->eamil1]);
                $message->subject($request->subject . ' for enquiry to ' . 'Admin');
            });
        }catch(Exception $e){
            return redirect()->back()->with(['success'=>"Thanks yours enquiry lock and the MIE team will response you  soon "]);

        }
        }

        return redirect()->back()->with(['success'=>"Thanks yours enquiry lock and the MIE team will response you  soon "]);
        
      }
       



}
