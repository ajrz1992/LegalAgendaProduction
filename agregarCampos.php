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
	<form action="" id="manage-task">
		<input type="hidden" id="valor_id" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="">Tarea</label>
						<input type="text" class="form-control form-control-sm" name="task" value="<?php echo isset($task) ? $task : '' ?>" required placeholder="Escriba el nombre de su tarea">
					</div>
					
				
			</div>
		</div>
		
	</form>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
// 	if ($('#manage-task').is(':focus')) {
// 		alert("habilitado")
// 		if($('#valor_id').val()!=""){
// 		$('.imagendiv').hide();
// 		$('.imagenlogo').hide();
// 		$('.imagenlogodos').hide();
// 		// $('.numeroExpediente').hide();
// 		// $('.documentosAdjuntados').hide();
// 		// $('.nombreFuncionario').hide();
// 		// $('.lugarTarea').hide();
// 		// $('.prioridad').hide();
// 	}
// 	if($('#valor_id').val()==""){
// 		$('.imagendiv').show();
// 		$('.imagenlogo').show();
// 		$('.imagenlogodos').show();
// 		// $('.numeroExpediente').show();
// 		// $('.documentosAdjuntados').show();
// 		// $('.nombreFuncionario').show();
// 		// $('.lugarTarea').show();
// 		// $('.prioridad').show();
// 	}
// } 
	

	$('#no').prop('checked', true);
		function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
		$('#archivo').text($('#customFile').val().split('\\').pop());
	}
	$('#si').on('change', function() {
		$('#si').prop('checked', true);
		$('#no').prop('checked', false);
                $('#documentosPendientes').show();
    });

	$('#no').on('change', function() {
		$('#no').prop('checked', true);
		$('#si').prop('checked', false);
                $('#documentosPendientes').hide();
    });

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
    
    $('#manage-task').submit(function(e){
    	e.preventDefault()
    	start_load()
    	$.ajax({
    		url:'ajax.php?action=save_task',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Datos grabados satisfactoriamente',"Proceso Exitóso");
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
    	})
	})
</script>