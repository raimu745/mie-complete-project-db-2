@extends('layoutAdmin.master') @section('title') Admin|SliderTable @endsection @section('main-content')
<div class="bg-body-light">
	<div class="content content-full">
		<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
			<h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Slider Management</h1>
			<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Dashboard</li>
					<li class="breadcrumb-item active" aria-current="page">About Page</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<div class="block-content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
			<a href="{{route('about.index')}}" class="btn btn-primary">About Page</a> </div>
		<div class="block-content block-content-full">
			<!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
			<table class="table data-table datatable"  id="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Title</th>
      <th scope="col">description</th>
      <th scope="col">image</th>
     
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
		</div>
	</div>
</div>

@endsection



@section('js')

<script type="text/javascript">
        $(document).ready(function() {
            var table = $('.datatable').DataTable({
                processing: false,
                serverSide: true,
                ajax: "{{ route('about.showpage') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'image', name: 'image'},
                    {data: 'title', name: 'title'},
                    {data:'description',name:'description'},
                   
                ]
            });
        });
</script>


 @endsection
