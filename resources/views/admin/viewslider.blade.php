@extends('layoutAdmin.master') @section('title') Admin|SliderTable @endsection @section('main-content')
<div class="bg-body-light">
	<div class="content content-full">
		<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
			<h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Slider </h1>
			<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">Dashboard</li>
					<li class="breadcrumb-item active" aria-current="page">Slider</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<div class="block-content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
			<h3 class="block-title"><a href="{{route('slider.index')}}" class="btn btn-primary">Add Slider</h3></a></div>
		<div class="block-content block-content-full">
			<!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
			<table class="table data-table datatable"  id="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
		</div>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detele Slider</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
			</div>
			<div class="modal-body">
				<p>Are You Show To Delete This Record ?</p>
			</div>
			<div class="modal-footer">
				<form action="" method="POST"> @csrf()
					<input type="hidden" name="id" id="id" />
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div>
	</div>
</div> @endsection @section('js')







<!-- <script>
$(document).ready(function() {
	$('#table').DataTable();
});
</script> -->

<script type="text/javascript">
        $(document).ready(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('slider.datatable') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
</script>


<script>
$('.del').on('click', function() {
    alert('sdf');
	$id = $(this).attr('data-id');
	$('#id').val($id);
	$('#myModal').modal('show'); // Show modal
});
$('.btn-close').on('click', function() {
	$('#myModal').modal('hide');
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
