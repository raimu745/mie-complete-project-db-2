
@extends('layoutAdmin.master')
@section('title')
Admin|Country Description
@endsection

@section('main-content')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Country Description</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>

                    <li class="breadcrumb-item active" aria-current="page">Country Description</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<form action="{{url('/admin/countrydes_add')}}" method="POST" enctype="multipart/form-data" id="contactForm" class="dropzone">
    @csrf()
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"><a href="{{route('country.des.view')}}" class="btn btn-primary"> View Country Description</a></h3>

                <div class="block-options">
                    <button type="submit" class="btn btn-sm btn-primary" id="btn">
                        <i class="fa fa-fw fa-check"></i> Submit
                    </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label style="text-align:left !important;">Title<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" placeholder="Enter a name..">
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">

                            <div class="form-group">
                            <label style="text-align:left !important;">Country<span class="text-danger">*</span></label>

                            <select class="form-control select"  name="country_id">
                                <option selected>--Select-Option--</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                
                
                    <div class="col-md-6">

                        <div class="form-group">
                            <label style="text-align:left !important;">Intake<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="intake" placeholder="Enter a name..">
                            @error('intake')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>

                <div class="form-group mb-5">
                <label>Description</label>
                <textarea  name="editor1"></textarea>
                @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                @enderror
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

    $(document).ready(function() {
    $('.select').select2();


});
CKEDITOR.replace( 'editor1' );
</script>

@endsection
