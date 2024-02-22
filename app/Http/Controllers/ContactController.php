<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    function show(){
        return view('admin.view_contact');
    }

    function contactDatatable(Request $request){
        $data = Contact::latest()->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('reply', function($row) {
            
            return  $row->reply;
     })
        ->addColumn('status', function($row) {
            if($row->status == 0)
            {
                return '<span class="nav-main-link-badge badge badge-pill badge-primary">Pendding</span>';
            }else{
                return '<span class="nav-main-link-badge badge badge-pill badge-success">Answerd</span>';
            }
            
   
        })

        ->addColumn('action', function($row) {

            if($row->status == 0){
               return '<a type="button" href="'.route("contact.edit",["id"=> encrypt($row->id)]).'" class="btn btn-sm btn-primary "> <i class="fa-solid fa-message"></i> </a>

                                        <a  href='.route("contact.del",["id"=> encrypt($row->id)]).' class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
            }
            else{
                return '<a  href='.route("contact.del",["id"=> encrypt($row->id)]).' class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
            }
                                    })
        ->rawColumns(['reply','status','action'])
        ->make(true);

    }
    function ContactDel(Request $request){
        $id = decrypt($request->id);
      $contact = Contact::find($id);
      $contact->delete();
      $notification = array(
        'message' => 'Team member deleted successfully',
        'alert-type' => 'success'
    );
     return redirect()->back()->with($notification);
    }

   
    function ContactEdit(Request $request){
        
       $id = decrypt($request->id);
     
       $edit = Contact::find($id);
       $all = Contact::latest()->where('status',0)->get();
    //    dd($edit);
       return view('admin.mail',compact('edit','all'));

     }
     function contactMail(Request $request){
    
      $id = decrypt($request->id);
      
      $update = new Contact();
      $update->exists=true;
      $update->id=$id;
      $update->status = 1;
      $update->reply =$request->editor1;
      $update->save();
      $contact = Contact::find($update->id);
   //   Send Reply
   $data = ['name' => $contact->name,'id' => $contact->id,'reply'=>$contact->reply];
   $user['to'] = $contact->email;
   $user['name'] = $contact->name;
  $view='email.reply';
 Mail::send($view,$data, function ($message) use ($user) {
   $message->to($user['to']);
   $message->subject('Reply from MIE Consultant Team to ' . ' ' . $user['name']);
});
    
     
      $notification = array(
        'message' => 'Reply To '.$contact->name.' Successfully',
        'alert-type' => 'success'
    );
     return redirect()->route('contact.show')->with($notification);
 
     }
    
}
