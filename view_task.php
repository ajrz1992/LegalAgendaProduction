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
<?php 
	if($documentosPendientes==null){
				echo "<script>
				$('.documentosPendientesValor').hide();
				</script>";
	}
	if($documentosAdjuntados==null){
				echo "<script>
				$('.documentosAdjuntadosValor').hide();
				</script>";
	}
	if($numeroExpediente==null){
				echo "<script>
				$('.numeroExpedienteValor').hide();
				</script>";
	}
		if($nombreFuncionario==null){
				echo "<script>
				$('.funcionarioValor').hide();
				</script>";
	}
			if($lugarTarea==null){
				echo "<script>
				$('.lugarTareaValor').hide();
				</script>";
	}
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-6">
				<dl>
					<dt><b class="border-bottom border-primary">Tarea</b></dt>
					<dd><?php echo ucwords($task) ?></dd>
				</dl>
				<dl>
					<dt><b class="border-bottom border-primary">Asignar a</b></dt>
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
		<div class="row">
			<div class="col-md-12">
				<dl class="descripcionValor">
				<dt><b class="border-bottom border-primary">Descripción</b></dt>
				<dd><?php echo html_entity_decode($description) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl>
				<dt><b class="border-bottom border-primary">Carpeta</b></dt>
				<dd><?php echo html_entity_decode($carpeta) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl>
				<dt><b class="border-bottom border-primary">Plazo Legal</b></dt>
				<dd><?php echo html_entity_decode($plazoLegal) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl class="documentosPendientesValor">
				<dt><b class="border-bottom border-primary">Documentos Pendientes</b></dt>
				<dd><?php echo html_entity_decode($documentosPendientes) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl class="documentosAdjuntadosValor">
				<dt><b class="border-bottom border-primary">Documentos Adjuntados</b></dt>
				<dd><?php echo html_entity_decode($documentosAdjuntados) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl class="numeroExpedienteValor">
				<dt><b class="border-bottom border-primary">Número del Expediente</b></dt>
				<dd><?php echo html_entity_decode($numeroExpediente) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl class="funcionarioValor">
				<dt><b class="border-bottom border-primary">Nombre del Funcionario</b></dt>
				<dd><?php echo html_entity_decode($nombreFuncionario) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl class="lugarTareaValor">
				<dt><b class="border-bottom border-primary">Lugar de la Tarea</b></dt>
				<dd><?php echo html_entity_decode($lugarTarea) ?></dd>
			</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<dl>
				<dt><b class="border-bottom border-primary">Prioridad</b></dt>
				<dd><?php echo html_entity_decode($prioridad) ?></dd>
			</dl>
			</div>
		</div>
		<!-- Aqui empiezo a poner los otros nuevos de esta tarea -->
		<?php		
					$valor = $conn->query("SELECT * from camposnuevos_tareas where id_tarea=".$_GET['id']);
                     while($row=$valor->fetch_assoc()):
						$i=$row['campobdd'];
        				?>
                        <div class="row">
							<div class="col-md-12">
								<dl>
									<dt><b class="border-bottom border-primary"><?php echo $row['campo']; ?></b></dt>
									<dd>
										<?php
											$sql = "SELECT " . $i . " FROM task_list WHERE id=".$_GET['id']; 
											$resultado = $conn->query($sql);
											if ($resultado->num_rows > 0) {
												$row_inner = $resultado->fetch_assoc();
												$nombre = $row_inner[$i];
											} else {
												$nombre = ""; 
											}
											echo html_entity_decode($nombre);
										?>
									</dd>
								</dl>
							</div>
						</div>
                    <?php endwhile; ?>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>