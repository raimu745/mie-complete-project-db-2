@extends('layoutAdmin.master')
@section('title')
Admin|Country
@endsection
<style>
    .job-field{
margin-right: 10px;
}

.job-field input{
    padding: 10px 10px;
    width: 100%;
    border: 2px solid #e0e3da;
}
.job-field select{
    padding: 10px 10px;
    width: 100%;
	border: 2px solid #e0e3da;
}
.job-field input::placeholder{
    font-weight: bold;
    font-size: 16px;
}
.min{
    padding-right: 10px;
}
.mainWrap label{
    font-weight: bold;
    font-size: 16px;
}
.mainWrap{
    width: 70%;
    margin: 40px auto;
}
.job-field{
    width: 50%;
}
.main-job{
    padding-bottom: 20px;
}
.min-max{
    display: flex;
}
.textarea-job textarea{
    width: 100%;
    border: 2px solid #e0e3da;
    border-radius: 4px;
   
background-color: transparent;
resize: none;
outline: none;
}

.desird{
	display: flex;
    justify-content: space-between;
	align-items: center;
    width: 50%;
	border: 2px solid #e0e3da;
    
	padding: 0px 10px;
	margin-right: 10px;
}
.main-job{
	display: flex;
}
.desird input{
	width: 40px;
    height: 20px;
}
#file{
	visibility: hidden;
	
}
.job-choose{
	position: relative;
	margin-bottom: 30px;
	margin-top: 10px;
}
.add-file{
	position: absolute;
	top: 0px;

	
}
.add-file label{
	margin-right: 10px;
}
.add-file label i{
	border: 2.5px solid rgb(137, 137, 241);
	padding: 3px;
	height: 40px;
	width: 40px;
	display: flex;
	align-items: center;
	justify-content: center;
	border-radius: 8px;
	font-size: 20px;
}
.bigBtn{
	width: 200px;
	height:50px;
	background: #2c68b1;
	border-radius: 30px;
	border: none;
	color: white;
	font-weight: 600;
}
/* add more start*/
#files-area {
	 width: 30%;
	 
}
 .file-block {
	 border-radius: 10px;
	 background-color: rgba(144, 163, 203, 0.2);
	 margin: 5px;
	 color: initial;
	 display: inline-flex;
}
 .file-block 
 span.name {
	 padding-right: 10px;
	 width: max-content;
	 display: inline-flex;
}
 .file-delete {
	 display: flex;
	 width: 24px;
	 color: initial;
	 background-color: #6eb4ff 0;
	 font-size: large;
	 justify-content: center;
	 margin-right: 3px;
	 cursor: pointer;
}
 .file-delete:hover {
	 background-color: rgba(144, 163, 203, 0.2);
	 border-radius: 10px;
}
 .file-delete &gt;
 span {
	 transform: rotate(45deg);
}
/ add more end /
@media (max-width:767px) {
	.mainWrap{
		width: 100%;
		padding: 0px 10px;
	}
	.main-job{
		flex-direction: column;
	}
	.job-field{
		width: 100%;
	}
	.job-field input{
		width: 100%;
		margin-bottom: 20px;
	}
	.desird{
		width: 100%;
	}

}
@media (max-width:475px) {
	.bigBtn{
		width: 100%;
	}
}
</style>
@section('main-content')
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Country</h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>

                    <li class="breadcrumb-item active" aria-current="page">Country</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<form action="{{route('country.store')}}" method="POST" enctype="multipart/form-data">
    @csrf()
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Country</h3>
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
                            <label style="text-align:left !important;">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter a name..">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                  

                
            </div>
			
			<div class="add-more">
							<p class="mt-3">
								<label for="attachment">
									<a class="btn btn-primary text-light" role="button" aria-disabled="false">+ Add Images</a>
									
								</label>
								<input type="file" name="file[]" accept="image/*" id="attachment" style="visibility: hidden; position: absolute;" multiple/>
								
							</p>
							<p id="files-area">
								<span id="filesList">
									<span id="files-names"></span>
								</span>
							</p>
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
<script type="text/javascript">
	// add row
	const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file

$("#attachment").on('change', function(e){
	for(var i = 0; i < this.files.length; i++){
		let fileBloc = $('<span/>', {class: 'file-block'}),
			 fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
		fileBloc.append('<span class="file-delete"><span>x</span></span>')
			.append(fileName);
		$("#filesList > #files-names").append(fileBloc);
	};
	// Ajout des fichiers dans l'objet DataTransfer
	for (let file of this.files) {
		dt.items.add(file);
	}
	// Mise à jour des fichiers de l'input file après ajout
	this.files = dt.files;

	// EventListener pour le bouton de suppression créé
	$('span.file-delete').click(function(){
		let name = $(this).next('span.name').text();
		// Supprimer l'affichage du nom de fichier
		$(this).parent().remove();
		for(let i = 0; i < dt.items.length; i++){
			// Correspondance du fichier et du nom
			if(name === dt.items[i].getAsFile().name){
				// Suppression du fichier dans l'objet DataTransfer
				dt.items.remove(i);
				continue;
			}
		}
		// Mise à jour des fichiers de l'input file après suppression
		document.getElementById('attachment').files = dt.files;
	});
});
</script>
@endsection