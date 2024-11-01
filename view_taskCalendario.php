<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT t.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name FROM task_list t inner join employee_list e on e.id = t.employee_id  where t.id = ".$_GET['id'])->fetch_array();
	if ($qry) {
        // El bucle foreach solo se ejecutará si hay resultados
        foreach($qry as $k => $v){
            $$k = $v;
        }
    } 
	else {
		$qry2 = $conn->query("SELECT t.*,concat(e.lastname,', ',e.firstname) as name FROM task_list t inner join users e on e.id = t.employee_id  where t.id = ".$_GET['id'])->fetch_array();
		if ($qry2) {
			// El bucle foreach solo se ejecutará si hay resultados
			foreach($qry2 as $k => $v){
				$$k = $v;
			}
		} else {
			// Si no hay resultados, puedes mostrar un mensaje o realizar otra acción
			echo "No se encontraron resultados para el ID proporcionado.";
		}
	}
}
?>
<input type="hidden" class="idtarea" value="<?php echo $id ?>">
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-6">
				<dl>
					<dt><b class="border-bottom border-primary">Tarea</b></dt>
					<dd class="task"><?php echo ucwords($task) ?></dd>
				</dl>
				<dl>
					<dt><b class="border-bottom border-primary">Asignado a</b></dt>
					<dd><?php echo ucwords($name) ?></dd>
				</dl>
			</div>
			<div class="col-md-6">
				<dl>
					<dt><b class="border-bottom border-primary">Fecha de Vencimiento</b></dt>
					<dd><?php echo date("m d,Y",strtotime($due_date)) ?></dd>
				</dl>
				<dl>
					<dt><b class="border-bottom border-primary">Estado</b></dt>
					<dd>
						<?php 
			        	if($status == 0){
					  		echo "<span class='badge badge-info'>Pendiente</span>";
			        	}elseif($status == 1){
					  		echo "<span class='badge badge-primary'>En-Progreso</span>";
			        	}elseif($status == 2){
					  		echo "<span class='badge badge-success'>Completo</span>";
			        	}
			        	if(strtotime($due_date) < strtotime(date('Y-m-d'))){
					  		echo "<span class='badge badge-danger mx-1'>Vencido</span>";
			        	}
			        	?>
					</dd>
				</dl>
			</div>
		</div>
		<div class="row" style="display:none">
			<div class="col-md-12">
				<dl>
				<dt><b class="border-bottom border-primary">Descripción</b></dt>
				<dd><?php echo html_entity_decode($description) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl>
				<dt><b class="border-bottom border-primary">Cliente</b></dt>
				<dd><?php echo html_entity_decode($cliente) ?></dd>
			</dl>
			</div>
		</div>
	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
	#post-field{
		max-height: 70vh;
		overflow: auto;
	}
</style>
<div class="modal-footer display p-0 m-0">
<button type="button" class="btn btn-primary ira">Ir a la tarea</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
<script>
 	$(".ira").click(function() {
        miVariable=$(".idtarea").val();
		$.ajax({
    		url: 'nombreTarea.php', // URL del archivo PHP que procesará la solicitud
    		type: 'POST', // Método de la solicitud (POST o GET)
    		data: {variable: miVariable}, // Datos a enviar (en este caso, la variable)
    		success: function(response) {
        		// Manejar la respuesta del servidor si es necesario
        		console.log(response);
				window.location.href = "https://demolegalagenda.tecnologiainnovacion.com/index.php?page=task_listCalendario";
    		},
    		error: function(xhr, status, error) {
        		// Manejar errores si los hay
        		console.error(xhr.responseText);
    		}
		});

	});
</script>