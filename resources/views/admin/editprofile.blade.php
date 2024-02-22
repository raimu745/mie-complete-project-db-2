@extends('layoutAdmin.master')
@section('title')
Admin|index
@endsection
@section('main-content')
<div class="bg-image" style="background-image: url('assets/media/photos/photo17@2x.jpg');">
                    <div class="bg-black-75">
                        <div class="content content-full">
                            <div class="py-5 text-center">
                                <a class="img-link" href="be_pages_generic_profile.html">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('assets/uploads/'.auth()->user()->image)}}" alt="">
                                </a>h
                                <h1 class="font-w700 my-2 text-white">Edit Account</h1>
                                <h2 class="h4 font-w700 text-white-75">
                                    {{auth()->user()->name}}
                                </h2>
                                <a class="btn btn-hero-dark" href="{{route('dashboard')}}">
                                    <i class="fa fa-fw fa-arrow-left"></i> Back to Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content content-full content-boxed">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <form action="{{route('update.profile')}}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <!-- User Profile -->
                                <h2 class="content-heading pt-0">
                                    <i class="fa fa-fw fa-user-circle text-muted mr-1"></i> User Profile
                                </h2>
                                <div class="row push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Your account’s vital info. Your username will be publicly visible.
                                        </p>
                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        <form action="">
                                        
                                        <div class="form-group">
                                            <label for="dm-profile-edit-name">Name</label>
                                            <input type="text" class="form-control" id="dm-profile-edit-name" name="name" placeholder="Enter your name.." value="{{old('name',auth()->user()->name ??  '')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="dm-profile-edit-email">Email Address</label>
                                            <input type="email" class="form-control" id="dm-profile-edit-email" name="email" placeholder="Enter your email.." value="{{old('email',auth()->user()->email ??  '')}}">
                                        </div>
                            
                                        <div class="form-group">
                                            <label>Your Avatar</label>
                                            <div class="push">
                                                <img class="img-avatar" src="{{asset('assets/uploads/'.auth()->user()->image)}}" alt="">
                                            </div>
                                            <div class="custom-file">
                                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="dm-profile-edit-avatar" name="image">
                                                <label class="custom-file-label" for="dm-profile-edit-avatar">Choose a new avatar</label>
                                            </div>
                                        </div>
                                        <div class="row push">
                                 
                                </div>
                                    </div>
                                    <div class="col-lg-8 col-xl-5 offset-lg-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-alt-primary">
                                                <i class="fa fa-check-circle mr-1"></i> Update Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
</form>
                                <!-- END User Profile -->
 <form action="{{route('update.pass')}}" method="Post">
    @csrf()
                                <!-- Change Password -->
                                
                                <h2 class="content-heading pt-0">
                                    <i class="fa fa-fw fa-asterisk text-muted mr-1"></i> Change Password
                                </h2>
                                <div class="row push">
                                    <div class="col-lg-4">
                                        <p class="text-muted">
                                            Changing your sign in password is an easy way to keep your account secure.
                                        </p>
                                    </div>
                                    <div class="col-lg-8 col-xl-5">
                                        
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="dm-profile-edit-password-new">New Password</label>
                                                <input type="password" class="form-control" id="dm-profile-edit-password-new" name="password">
                                                @error('password')
                                             <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="dm-profile-edit-password-new-confirm">Confirm New Password</label>
                                                <input type="password" class="form-control" id="dm-profile-edit-password-new-confirm" name="password_confirmation">
                                                @error('password_confirmation')
                                             <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Change Password -->


                               

                                <!-- Submit -->
                                <div class="row push">
                                    <div class="col-lg-8 col-xl-5 offset-lg-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-alt-primary">
                                                <i class="fa fa-check-circle mr-1"></i> Update Password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Submit -->
                            </form>
                        </div>
                    </div>
                </div>

@endsection