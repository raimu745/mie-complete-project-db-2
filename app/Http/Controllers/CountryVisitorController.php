<?php

namespace App\Http\Controllers;

use App\Models\CountryVisitor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CountryVisitorController extends Controller
{
    function index(){
        return view('admin.countryvisitor');
    }

    
    function countryvisitorDatatable(Request $request){
        $data = CountryVisitor::latest()->get();

        return DataTables::of($data)
        ->addIndexColumn()
     
 

        ->addColumn('action', function($row) {
            
           
                return '<a  href='.route("country_visitor.delete",["id"=> encrypt($row->id)]).' class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
            
                                    })
        ->rawColumns(['action'])
        ->make(true);

    }
    
    function countryVisitDel(Request $request){
        $id = decrypt($request->id);
      $contact = CountryVisitor::find($id);
      $contact->delete();
      
      $notification = array(
        'message' => 'Country Visitor deleted successfully',
        'alert-type' => 'success'
    );
     return redirect()->back()->with($notification);
    }
}
