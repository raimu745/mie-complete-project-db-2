@extends('layoutAdmin.master')
@section('title')
Admin|EditTeam
@endsection

@section('main-content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Edit Team</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>

                    <li class="breadcrumb-item active" aria-current="page">Edit Team</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<form action="{{route('team.update',['id'=>encrypt($edit->id)])}}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Team</h3>
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

                            <label style="text-align:left !important;">Upload Image <span class="text-danger">*</span></label>

                            <input type="file" name="image" class="file" style="display: none"><br />
                            @if($edit->image)
                            <img src='{{asset("assets/team/".$edit->image)}}' id="preview" class="img-responsive browse" style="height: 100px;">
                           @else
                           <img src="https://crm.scholarseries.com/public/img/80.png" id="preview" class="img-responsive browse" style="    height: 100px;">

                           @endif
                            @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
        

        <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label style="text-align:left !important;">Name </label>
                            <input type="text" class="form-control" name="name"    placeholder="Enter a name.." value="{{old('name') ?? $edit->name ?? ''}}">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">        
                        <div class="form-group">
                            <label style="text-align:left !important;">Description</label>
                            <input type="text" class="form-control" name="description"  placeholder="Enter a description.." value="{{old('description') ?? $edit->description ?? ''}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label style="text-align:left !important;">Fb_link</label>
                            <input type="text" class="form-control" name="fb_link"  placeholder="Enter a fb_link.."  value="{{old('fb_link') ?? $edit->fb_link ?? ''}}">       
                        </div>
                    </div>
                    <div class="col-md-6">        
                        <div class="form-group">
                            <label style="text-align:left !important;">twitter_link</label>
                            <input type="text" class="form-control" name="twitter_link"  placeholder="Enter a twitter_link.."  value="{{old('twitter_link') ?? $edit->twitter_link ?? ''}}">          
                        </div>
                    </div>
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
    CKEDITOR.replace( 'editor1' );

</script>

@endsection

