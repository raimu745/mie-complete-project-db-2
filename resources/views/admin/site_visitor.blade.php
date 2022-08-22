@extends('layoutAdmin.master')
 @section('title') Admin|SliderTable @endsection 
 @section('main-content')

<div class="bg-body-light">
	<div class="content content-full">
		<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
			<h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Site Visitor</h1>
			<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Dashboard</li>
					<li class="breadcrumb-item active" aria-current="page">Site Visitor</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<div class="block-content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
			<h3 class="block-title">Site Visitor</h3> </div>
		<div class="block-content block-content-full">
			<!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
			<div style="overflow-x:auto;">
			<table class="table data-table datatable table-responsive" id="table">
				<thead>
					<tr>
						<th scope="col">#id</th>
						<th scope="col">ip_address</th>
						<th scope="col"> country_name</th>
						<th scope="col">country_code</th>
                        <th scope="col">region_code</th>
                        <th scope="col">region_name</th>
						<th scope="col">city_name</th>
                        <th scope="col">zip_code</th>
                        <th scope="col">latitude</th>
                        <th scope="col">longitude</th>
                        <th scope="col">area_code</th>
						<th scope="col">Action</th>

					</tr>
				</thead>
				<tbody> 
                  
                </tbody>
			</table>
			</div>
		</div>
	</div>
</div>
 @endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                responsive:true,
                serverSide: true,
                ajax: "{{ route('site.datatable') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'ip_address', name: 'ip_address'},
					{data: 'country_name', name: 'country_name'},
                    {data: 'country_code', name: 'country_code'},
                    {data: 'region_code', name: 'region_code'},
                    {data: 'region_name', name: 'region_name'},
                    {data: 'city_name', name: 'city_name'},
					{data: 'zip_code', name: 'zip_code'},
					{data: 'latitude', name: 'latitude'},
                    {data: 'longitude', name: 'longitude'},
                    {data: 'area_code', name: 'area_code'},		
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
</script>

<script>
$(document).on("click", ".browse", function() {
	var file = $(this).parent().parent().parent().find(".file");
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
	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
	});
	$('.image-popup-fit-width').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: false
		}
	});
	$('.image-popup-no-margins').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});
});
</script> 
@endsection