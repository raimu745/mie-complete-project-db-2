@extends('layoutAdmin.master')
@section('title')
Admin|index
@endsection
@section('main-content')
<div class="content">
                    <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                        <div>
                            <h1 class="h2 mb-1">
                                Dashboard
                            </h1>
                            <p class="mb-0">
                                Welcome, admin! You have today<a class="font-w500" href="{{route('contact.show')}}">{{' '. App\Models\Contact::whereDate('created_at', \Carbon\Carbon::today())->where('status',0)->count();}} new contacts</a>.
                            </p>
                        </div>
                      
                    </div>
                </div>

                <div class="content">
                    <!-- Overview -->
                    <div class="row row-deck">
                        <div class="col-sm-6 col-xl-3">
                            <div class="block block-rounded text-center d-flex flex-column">
                                <div class="block-content block-content-full flex-grow-1">
                                    <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                        <i class="fa fa-users text-muted"></i>
                                    </div>
                                    <div class="text-black font-size-h1 font-w700">{{App\Models\Contact::count();}}</div>
                                    <div class="text-muted mb-3">Total Users</div>
                                    
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    <a class="font-w500" href="{{route('contact.show')}}">
                                        View all users
                                        <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="block block-rounded text-center d-flex flex-column">
                                <div class="block-content block-content-full flex-grow-1">
                                    <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                        <i class="fa fa-level-up-alt text-muted"></i>
                                    </div>
                                    <div class="text-black font-size-h1 font-w700">{{App\Models\SiteVisitor::whereDate('created_at', \Carbon\Carbon::today())->count();}}</div>
                                    <div class="text-muted mb-3">Today Visitor</div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    <a class="font-w500" href="{{route('site.visitor')}}">
                                        View all
                                        <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="block block-rounded text-center d-flex flex-column">
                                <div class="block-content block-content-full flex-grow-1">
                                    <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                        <i class="fa fa-chart-line text-muted"></i>
                                    </div>
                                    <div class="text-black font-size-h1 font-w700">{{App\Models\Country::count();}}</div>
                                    <div class="text-muted mb-3">Total Countries</div>
                                    
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    <a class="font-w500" href="{{route('country.show')}}">
                                        View all Countries
                                        <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="block block-rounded text-center d-flex flex-column">
                                <div class="block-content block-content-full">
                                    <div class="item rounded-lg bg-body-dark mx-auto my-3">
                                        <i class="fa  fa-1x fa-broadcast-tower"></i>
                                    </div>
                                    <div class="text-black font-size-h1 font-w700">{{App\Models\SiteVisitor::count();}}</div>
                                    <div class="text-muted mb-3">Total Visitors</div>
                                   
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                                    <a class="font-w500" href="javascript:void(0)">
                                       View all visitors
                                        <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Overview -->

                    

                    <!-- Latest Orders + Stats -->
                    <div class="row">
                        <div class="col-md-10">
                            <!--  Latest Orders -->
                            <div class="block block-rounded block-mode-loading-refresh">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">
                                        Latest Contacts
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        
                                    </div>
                                </div>
                                <div class="block-content">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>SR#</th>
                                                <th class="d-none d-xl-table-cell">Name</th>
                                                <th>Email</th>
                                                <th>Phnoe</th>
                                                <th>Message</th>
                                                <th class="d-none d-sm-table-cell text-right" style="width: 120px;">Reply</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                              $all = App\Models\Contact::latest()->limit(5)->get();
                                              $i=1;
                                            @endphp
                                            @foreach($all as $list)
                                            <tr>
                                                <td>
                                                    <span class="font-w600">{{$i++}}</span>
                                                </td>
                                                <td class="d-none d-xl-table-cell">
                                                    <span class="font-size-sm text-muted">{{ucfirst($list->name)}}</span>
                                                </td>
                                                <td>
                                                    <span class="font-w600 text-success">{{$list->email}}</span>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right font-w500">
                                                {{$list->phone}}
                                                </td>
                                                <td class="d-none d-sm-table-cell text-right font-w500">
                                                {{$list->message}}
                                                </td>
                                                <td class="text-center text-nowrap font-w500">
                                                    <a href='{{route("contact.edit",["id"=> encrypt($list->id)])}}'>
                                                    <i class="fa-solid fa-message"></i>

                                                    </a>
                                                </td>
                                            </tr>
                                   @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm text-center">
                                    <a class="font-w500" href="{{route('contact.show')}}">
                                        View all Users
                                        <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- END Latest Orders -->
                        </div>
                        <div class="col-md-2 d-flex flex-column">
                            <!-- Stats -->
                            <?php 
                             $country =  App\Models\Country::withCount(['country_visitors'=>function($query){
                             }])->orderBy('country_visitors_count','Desc')->take(3)->get();
                             $i = 1;
                            

                            ?>
                           
                            @foreach($country as  $row)
                            <div class="block block-rounded">
                                <div class="block-content block-content-full d-flex justify-content-between align-items-center flex-grow-1">
                                    <div class="mr-3">
                                        <h5>Top  {{$i++}}</h5>
                                        <p class="font-size-h3 font-w700 mb-0">
                                            {{$row->country_visitors_count}}
                                        </p>
                                        <p class="text-muted mb-0">
                                        {{ucwords($row->name)}}
                                        </p>
                                    </div>
                                    <!-- <div class="item rounded-lg bg-body-dark">
                                        <i class="fa fa-check text-muted"></i>
                                    </div> -->
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm text-center">
                                    <a class="font-w500" href="javascript:void(0)">
                                    
                                        <i class="fa fa-arrow-right ml-1 opacity-25"></i>
                                    </a>
                                </div>
                            </div>
                           @endforeach
                        </div>
                        
                    </div>
                    <!-- END Latest Orders + Stats -->
                </div>


@endsection