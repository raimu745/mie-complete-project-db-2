@extends('layoutAdmin.master')
@section('title')
Admin|Slider
@endsection

@section('main-content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Slider Management</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>

                    <li class="breadcrumb-item active" aria-current="page">Slider Management</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<form action="{{route('slider.update',['id'=>$slider->id])}}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Slider</h3>
                <div class="block-options">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-check"></i> Update
                    </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-6">  
                        
                        <div class="form-group">
                            <label style="text-align:left !important;">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$slider->name ?? '')}}" placeholder="Enter a name..">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status <span class="">*</span></label>
                            <select class="form-control" name="status">
                                <option value="">Please select</option>
                                <option value="1" {{old('status',$slider->status ?? '') == 1 ? 'selected' : '' }} >Active</option>
                                <option value="0" {{old('status',$slider->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>

                            </select>
                        </div>
                    </div>
                </div>

            
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">

                            <label style="text-align:left !important;">Upload Image <span class="text-danger">*</span></label>

                            <input type="file" name="image" class="file" style="display: none"><br />
                            <img src="{{asset('assets/uploads/slider/'.$slider->image)}}" id="preview" class="img-responsive browse" style="    height: 100px;">
                            @error('image')
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