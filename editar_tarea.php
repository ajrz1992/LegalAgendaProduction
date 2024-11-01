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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-filter"></i> Agregar Campos</button><br><br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Campos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del Campo</label>
            <input type="text" class="form-control form-control-sm" id="campo" placeholder="Escribe el nombre del campo">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del Campo BDD</label>
            <input type="text" class="form-control form-control-sm"  id="campobdd" placeholder="Escribe el nombre del campo SIN ESPACIOS NI CARACTERES ESPECIALES seguido del simbolo: _ ejemplo: tarea_nombredelcampo">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tipo del Campo</label>
            <select id="tipo" class="form-control form-control-sm" required="">
							<option value="varchar(100)">Texto</option>
							<option value="int">Numérico</option>
						</select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarModal">Cerrar</button>
        <button type="button" class="btn btn-primary guardarCampos">Guardar</button>
      </div>
    </div>
  </div>
</div>
       
		<input type="hidden" id="valor_id" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="col-lg-12">
			<div class="row">

				<div class="col-md-5">
					<div class="form-group">
						<label for="">Tarea</label>
						<input type="text" class="form-control form-control-sm" name="task" value="<?php echo isset($task) ? $task : '' ?>" required placeholder="Escriba el nombre de su tarea">
					</div>
					<div class="form-group">
						<label for="">Asignar a</label>
						<select name="employee_id" id="employee_id" class="form-control form-control-sm" required="">
							<option value=""></option>
							<?php 
							$employees = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM employee_list order by concat(lastname,', ',firstname,' ',middlename) asc");
							while($row=$employees->fetch_assoc()):
							?>
							<option value="<?php echo $row['id'] ?>" <?php echo isset($employee_id) && $employee_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Fecha de Vencimiento</label>
						<input type="date" class="form-control form-control-sm" name="due_date" value="<?php echo isset($due_date) ? $due_date : date("Y-m-d") ?>" required>
					</div>
					<div class="form-group">
						<label for="">Documentos Pendientes: </label>
						<label for="">Si</label>
						<input type="checkbox" id="si" value="si">
						<label for="">No</label>
						<input type="checkbox" id="no" value="no">
						<input type="text" class="form-control form-control-sm" id="documentosPendientes" name="documentosPendientes" value="<?php echo isset($documentosPendientes) ? $documentosPendientes : '' ?>" required placeholder="Escriba los documentos pendientes" style="display:none">
					</div>
					<div class="form-group">
						<label for="">Plazo Legal</label>
						<input type="number" class="form-control form-control-sm" name="plazoLegal" value="<?php echo isset($plazoLegal) ? $plazoLegal : '' ?>" required placeholder="Escriba el Plazo">
					</div>
					<div class="form-group numeroExpediente">
						<label for="">Numero de Expediente</label>
						<input type="text" class="form-control form-control-sm" name="numeroExpediente" value="<?php echo isset($numeroExpediente) ? $numeroExpediente : '' ?>" placeholder="Escriba el número de expediente">
					</div>
					<div class="form-group documentosAdjuntados">
						<label for="">Documentos Adjuntados</label>
						<input type="text" class="form-control form-control-sm" name="documentosAdjuntados" value="<?php echo isset($documentosAdjuntados) ? $documentosAdjuntados : '' ?>" placeholder="Escriba los documentos adjuntados">
					</div>
					<div class="form-group nombreFuncionario">
						<label for="">Nombre del Funcionario</label>
						<input type="text" class="form-control form-control-sm" name="nombreFuncionario" value="<?php echo isset($nombreFuncionario) ? $nombreFuncionario : '' ?>" placeholder="Escriba el nombre del Funcionario">
					</div>
					<div class="form-group lugarTarea">
						<label for="">Lugar donde se presentó la Tarea</label>
						<input type="text" class="form-control form-control-sm" name="lugarTarea" value="<?php echo isset($lugarTarea) ? $lugarTarea : '' ?>" placeholder="Escriba el lugar">
					</div>
					<div class="form-group prioridad">
						<label for="">Nivel de Prioridad</label>
						<select name="prioridad" id="prioridad" class="form-control form-control-sm" required="">
							<option value="Nivel1">Nivel 1</option>
							<option value="Nivel2">Nivel 2</option>
						</select>
					</div>
					
					<div class="form-group" style="display:none;">
							<label class="control-label">Empresa</label>
							<input type="text" class="form-control form-control-sm" name="empresa" required value="<?php echo isset($_SESSION['login_empresa']) ? $_SESSION['login_empresa'] : '' ?>">
							<small id="#msg"></small>
						</div>
				</div>
		
				<?php		
					$valor = $conn->query("SELECT nombre from carpetas WHERE seleccionado=1 and id_usuario={$_SESSION['login_id']} and empresa='{$_SESSION['login_empresa']}'");
                     while($row=$valor->fetch_assoc()):
        				?>
                        <input type="hidden"  name="carpeta" value="<?php $v=$row['nombre']; echo trim($v); ?>"></input>
                    <?php endwhile; ?>
						<input type="hidden" name="seleccionado" value=1>
				<div class="col-md-7">
					<div class="form-group">
						<label for="">Descripción</label>
						<textarea name="description" id="" cols="30" rows="10" class="summernote form-control">
							<?php echo isset($description) ? $description : '' ?>
						</textarea>
					</div>
                    <?php 
							$cnuevos = $conn->query("SELECT * FROM camposnuevos_tareas where id_tarea=$id");
							while($row=$cnuevos->fetch_assoc()):
							?>
							<div class="form-group camposnuevos">
						<label for=""><?php echo $row['campo']; ?></label>
						<input type="text" class="form-control form-control-sm" name="<?php echo $row['campobdd']; ?>" placeholder="<?php echo $row['campo']; ?>" value="<?php echo isset($campo) ? $campo : '' ?>">
					</div>
							<?php endwhile; ?>
                    
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
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Agregar Campos')
})
$('.cerrarModal').on('click', function() {
    $('#exampleModal').hide();
});
$('.guardarCampos').on('click', function() {
    campo=$('#campo').val();
    campobdd=$('#campobdd').val();
    tipo=$('#tipo').val();
    idTarea=$('#valor_id').val();
    $.ajax({
    		url:'guardarCampos.php',
			data: {campo: campo, tipo: tipo, idtarea: idTarea, campobdd: campobdd},
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
					alert_toast('Datos grabados satisfactoriamente',"Proceso Exitóso");
					setTimeout(function(){
                        location.reload()
					},1500)
                    
			}
    	})
});

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
$('.agregarCampos').on('click', function() {
    var inputBox = $('<input type="text">');

        // Agrega el nuevo elemento de entrada al cuerpo del documento
        $('form').append(inputBox);

        // Puedes agregar más configuraciones o estilos aquí según sea necesario

        // Enfoca el cuadro de entrada para que el usuario pueda escribir inmediatamente
        inputBox.focus();
});

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