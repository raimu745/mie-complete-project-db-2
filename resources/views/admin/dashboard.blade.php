@extends('layoutAdmin.master')
@section('title')
Admin|Dashboard
@endsection

@section('main-content')

<div class="content">
                    <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
                        <div>
                            <h1 class="h2 mb-1">
                                Dashboard
                            </h1>
                            <p class="mb-0">
                                Welcome, admin! You have <a class="font-w500" href="javascript:void(0)">5 new notifications</a>.
                            </p>
                        </div>
                        <div class="mt-4 mt-md-0">
                            <a class="btn btn-sm btn-alt-primary" href="javascript:void(0)">
                                <i class="fa fa-cog"></i>
                            </a>
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-sm btn-alt-primary px-3" id="dropdown-analytics-overview" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Last 30 days <i class="fa fa-fw fa-angle-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right font-size-sm" aria-labelledby="dropdown-analytics-overview">
                                    <a class="dropdown-item" href="javascript:void(0)">This Week</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Previous Week</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">This Month</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Previous Month</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


@endsection


@section('js')


@endsection

