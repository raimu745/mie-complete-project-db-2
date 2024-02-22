@extends('layoutAdmin.master')
@section('title')
Admin|About
@endsection

@section('main-content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">About Page</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>

                    <li class="breadcrumb-item active" aria-current="page">About Page</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">About Page</h3>
                <div class="block-options">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fa fa-fw fa-check"></i> Submit
                    </button>
                </div>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-6">  
                        <input type="hidden" id="id" value="">
                        <div class="form-group">
                            <label style="text-align:left !important;">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{old('title') ?? $about
                                ->title ?? ''}}" placeholder="Enter a title..">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <label style="text-align:left !important;">Upload Image <span class="text-danger">*</span></label>

                            <input type="file" name="image" class="file" style="display: none"><br />
                            @if($about->image)
                            <img src="{{asset('assets/about/'.$about->image)}}" id="preview" class="img-responsive browse" style="    height: 100px;">

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
                <div class="form-group mb-5">
                <label>Description</label>
                <textarea  name="editor1"> {!! $about->description !!}  </textarea>
                @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                @enderror
                </div>
                </div>
            </div>

           
        </div>
    </div>
    <div class="content">
        <div class="block block-rounded">
           
            <div class="block-content">
                <div class="row">
                    <div class="col-md-6">  
                        <input type="hidden" id="id" value="">
                        <div class="form-group">
                            <label style="text-align:left !important;">Title 2 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="s2_title" value="{{old('s2_title') ?? $about
                                ->s2_title ?? ''}}" placeholder="Enter a title..">
                            @error('title2')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                <div class="form-group mb-5">
                <label>Section Description</label>
                <textarea  name="editor2"> {!! $about->s2_description !!}  </textarea>
                @error('editor2')
                            <div class="alert alert-danger">{{$message}}</div>
                @enderror
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
    CKEDITOR.replace( 'editor2' );

</script>
<script type="text/javascript">
        $(document).ready(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('about.showpage') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'title', name: 'title'},
                    // {data: 'country', name: 'country'},
                    // {data: 'intake', name: 'intake'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
</script>
@endsection

