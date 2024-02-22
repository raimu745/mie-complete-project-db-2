<?php

namespace App\Http\Controllers;

use App\Models\SiteVisitor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SiteVisitController extends Controller
{
    function show(){
        return view('admin.site_visitor');
    }

    function siteDatatable(Request $request){
        $data = SiteVisitor::latest()->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row) {
            
                return '<a  href='.route("site.delete",["id"=> encrypt($row->id)]).' class="btn btn-sm btn-danger  del" data-original-title="Delete"> <i class="fa fa-times"></i> </a>';
                                    })
        ->rawColumns(['action'])
        ->make(true);

    }
    function siteVisitDel(Request $request){
        $id = decrypt($request->id);
      $contact = SiteVisitor::find($id);
      $contact->delete();
      
      $notification = array(
        'message' => 'Site Visitor deleted successfully',
        'alert-type' => 'success'
    );
     return redirect()->back()->with($notification);
    }

    function alldel_row(){
        // dd(12234313);
        $siteVistor = SiteVisitor::truncate();

        return redirect()->back();
    }

}
