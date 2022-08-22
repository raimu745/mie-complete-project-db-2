@extends('layoutAdmin.master')
 @section('title') Admin|SliderTable @endsection 
 @section('main-content')
 <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

</style>
<div class="bg-body-light">
	<div class="content content-full">
		<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
			<h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Contact Page</h1>
			<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Dashboard</li>
					<li class="breadcrumb-item active" aria-current="page">Contact Page</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<div class="block-content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
			<h3 class="block-title">Contact Page</h3> </div>
		<div class="block-content block-content-full">
			<!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
			<div style="overflow-x:auto;">
			<table class="table data-table datatable table-responsive" id="table">
				<thead>
					<tr>
						<th scope="col">#id</th>
						<th scope="col">Name</th>
						<th scope="col"> Email</th>
						<th scope="col">Phone</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
						<th scope="col">Reply</th>
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
                ajax: "{{ route('contact.datatable') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
					{data: 'email', name: 'email'},
					{data: 'phone', name: 'phone'},
					{data: 'message', name: 'message'},
                    {data: 'status', name: 'status',orderable: false, searchable: false},
					{data: 'reply', name: 'reply',orderable: false, searchable: false},
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