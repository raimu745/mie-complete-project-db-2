@extends('layoutAdmin.master')
@section('title')
Admin|Setting
@endsection

@section('main-content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Setting</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>

                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<form action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Setting</h3>
                <div class="block-options">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-check"></i> Submit
                    </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                 
                    <div class="col-md-6">
                        <div class="form-group">

                            <label style="text-align:left !important;">Logo <span class="text-danger">*</span></label>

                            <input type="file" name="image" class="file" style="display: none"><br />
                            @if($setting->logo)
                            <img src="{{asset('assets/setting/'.$setting->logo)}}" id="preview" class="img-responsive browse" style="    height: 100px;">

                            @else
                            <img src="https://crm.scholarseries.com/public/img/80.png" id="preview" class="img-responsive browse" style="    height: 100px;">
                            @endif
                        </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-6">  
                        <input type="hidden" id="id" value="">
                        <div class="form-group">
                            <label style="text-align:left !important;">Email </label>
                            <input type="text" class="form-control" name="email"  value="{{old('email') ?? $setting
                                ->email ?? ''}}"  placeholder="Enter a Email..">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <input type="hidden" id="id" value="">
                        <div class="form-group">
                            <label style="text-align:left !important;">Address </label>
                            <input type="text" class="form-control" name="address" value="{{old('address') ?? $setting
                                ->address ?? ''}}" placeholder="Enter a Address..">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-md-6">  
                        <input type="hidden" id="id" value="">
                        <div class="form-group">
                            <label style="text-align:left !important;">Phone_nbr</label>
                            <input type="text" class="form-control" value="{{old('phone_nbr') ?? $setting
                                ->phone_nbr ?? ''}}" name="phone_nbr" placeholder="Enter a Phone_nbr..">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <input type="hidden" id="id" value="">
                        <div class="form-group">
                            <label style="text-align:left !important;">Facebook_link</label>
                            <input type="text" class="form-control" value="{{old('facebook_link') ?? $setting
                                ->facebook_link ?? ''}}" name="facebook_link" placeholder="Enter a Facebook_link ..">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</form>

@endsection


@section('js')
<script>
    $(document).on("click", ".browse", function() {
        var file = $(this)
            .parent()
            .parent()
            .parent()
            .find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
   

</script>
@endsection


