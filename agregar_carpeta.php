<?php 
include 'db_connect.php';
session_start();
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM task_list where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<form action="" id="agregar-carpeta">
		<input type="hidden" name="id_usuario" value="<?php echo isset($_SESSION['login_id']) ? $_SESSION['login_id'] : '' ?>">
        <input type="hidden" name="empresa" value="<?php echo isset($_SESSION['login_empresa']) ? $_SESSION['login_empresa'] : '' ?>">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="">Nombre</label>
						<input type="text" class="form-control form-control-sm" name="nombre" required placeholder="Nombre de la Carpeta">
					</div>
			</div>
		</div>
	</form>
</div>

<script>
	$(document).ready(function(){

	$('#employee_id').select2({
		placeholder:'Elija empleado',
		width:'100%'
	})

	$('.summernote').summernote({
        height: 200,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    })
     })
    
    $('#agregar-carpeta').submit(function(e){
    	e.preventDefault()
    	start_load()
    	$.ajax({
    		url:'ajax.php?action=save_carpeta',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Carpeta creada satisfactoriamente',"Proceso Exitóso");
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
    	})
    })
</script>