@extends('layoutAdmin.master')
 @section('title') Admin|SliderTable @endsection 
 @section('main-content')
 <div class="row no-gutters flex-lg-10-auto">
                    <div class="col-lg-5 col-xl-3 h100-scroll">
                        <div class="content">
                            <!-- Toggle Side Content -->
                            <div class="row gutters-tiny d-lg-none push">
                                <div class="col-12 text-center mb-4">
                                    <!-- Logo -->
                                    <a class="font-size-lg font-w600 tracking-wide text-dark" href="">
                                        Dash<span class="opacity-75">mix</span>
                                        <span class="font-w400">Messages</span>
                                    </a>
                                    <!-- END Logo -->
                                </div>
                                <div class="col-6">
                                    <!-- Toggle Sidebar -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="layout" data-action="sidebar_toggle">
                                        <i class="fa fa-bars opacity-50 mr-1"></i> Menu
                                    </button>
                                </div>
                                <div class="col-6">
                                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                                    <button type="button" class="btn btn-alt-primary btn-block" data-toggle="class-toggle" data-target="#side-content" data-class="d-none">
                                        <i class="fa fa-envelope opacity-50 mr-1"></i> Messages
                                    </button>
                                </div>
                            </div>
                            <!-- END Toggle Side Content -->

                            <!-- Side Content -->
                            <div id="side-content" class="d-none d-lg-block push">
                                <!-- Search Messages -->
                                <form action="db_messages.html" method="POST" onsubmit="return false;">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control border-0" placeholder="Search Messages..">
                                            <div class="input-group-append">
                                                <span class="input-group-text border-0 bg-white">
                                                    <i class="fa fa-fw fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Search Messages -->

                                <!-- Sorting/Filtering -->
                                
                                <!-- END Sorting/Filtering -->

                                <!-- Messages -->
                                <div class="list-group font-size-sm">
                                <?php $now = Carbon\Carbon::now();?>
                                @foreach($all as $list)
                                <?php $days_count = Carbon\Carbon::parse($list->created_at)->diffInDays($now); ?> 
                                    <a class="list-group-item list-group-item-action" href="{{route('contact.edit',['id'=> encrypt($list->id)])}}">
                                        <span class="badge badge-pill badge-primary m-1 float-right">1</span>
                                        <p class="font-size-h6 font-w700 mb-0">
                                           {{$list->name}}
                                        </p>
                                        <p class="text-muted mb-2">
                                            {{$list->message}}
                                        </p>
                                        <p class="font-size-sm text-muted mb-0">
                                            <strong>{{$list->name}}</strong>,<br/> {{$days_count}} days ago
                                        </p>
                                    </a>
                                @endforeach
                                 
                                </div>
                                <!-- END Messages -->
                            </div>
                            <!-- END Side Content -->
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-9 h100-scroll bg-body-dark">
                        <!-- Main Content -->
                        <div class="content">
                            <!-- Message -->
                            <div class="block block-rounded">
                                <div class="block-content block-content-sm block-content-full bg-body-light">
                                    <div class="media py-3">
                                        <div class="mr-3 ml-2 overlay-container overlay-right">
                                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar4.jpg') }}" alt="">
                                            <i class="far fa-circle text-white overlay-item font-size-sm bg-success rounded-circle"></i>
                                        </div>
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <a class="font-w600 link-fx" href="javascript:void(0)">
                                                        {{$edit->name}}
                                                    </a></a>
                                                    <div class="font-size-sm text-muted">{{$edit->email}}</div>
                                                </div>
                                                <div class="col-sm-5 d-sm-flex align-items-sm-center">
                                                    <div class="font-size-sm font-italic text-muted text-sm-right w-100 mt-2 mt-sm-0">
                                                        <p class="mb-0">{{$edit->created_at->format('d') .'-'. $edit->created_at->format('M') .'-'.$edit->created_at->format('y')}}</p>
                                                        <p class="mb-0">{{$edit->created_at->format('H:i:s');}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p>Dear Admin,</p>
                                    <p>
                                        {!! $edit->message !!}
                                    </p>
                                    <p>All the best,</p>
                                    <p>{{$edit->name}}</p>
                                </div>
                                <div class="block-content bg-body-light">
                                    <div class="row gutters-tiny">
                                        <div class="col-4 col-xl-2">
                                            <div class="options-container fx-item-rotate-r">
                                                <img class="img-fluid options-item" src="assets/media/photos/photo16.jpg" alt="">
                                                <div class="options-overlay bg-black-75">
                                                    <div class="options-overlay-content">
                                                        <a class="btn btn-sm btn-primary" href="javascript:void(0)">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <!-- END Message -->

                            <!-- Reply -->
                            <form action="{{route('contact.mail',['id'=>encrypt($edit->id)])}}" method="Post">
       @csrf()
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <!-- Summernote (.js-summernote class is initialized in Helpers.summernote()) -->
                                    <!-- For more info and examples you can check out http://summernote.org/ -->
                                    <div class="row">
                <div class="form-group mb-5">
                <label>Reply</label>
                <textarea  name="editor1">   </textarea>
                </div>
                </div>
                                    <!-- <button type="button" class="btn btn-alt-primary mt-2">Send Message</button> -->
                                    <input type="submit" value="submit" class="btn btn-primary">
                                </div>
                            </div>
                            </form>
                            <!-- END Reply -->
                        </div>
                        <!-- END Main Content -->
                    </div>
                </div>
 @endsection
@section('js')
<script>
    CKEDITOR.replace( 'editor1' );
</script>

@endsection