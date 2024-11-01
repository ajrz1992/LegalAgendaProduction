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
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <dl>
                <dt><b class="border-bottom border-primary">Tarea</b></dt>
                <dd><?php echo ucwords($task) ?></dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Asignar a</b></dt>
                <dd><?php echo ucwords($name) ?></dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Fecha de Vencimiento</b></dt>
                <dd><?php setlocale(LC_TIME, 'es_ES.UTF-8'); echo strftime('%d de %B de %Y', strtotime($due_date)); ?></dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Progreso Actual</b></dt>
                <dd>
                    <?php 
                        if($status == 0){
                            echo "<span class='badge badge-info'>Pendiente</span>";
                        } elseif($status == 1){
                            echo "<span class='badge badge-primary'>En-Progreso</span>";
                        } elseif($status == 2){
                            echo "<span class='badge badge-success'>Completo</span>";
                        }
                        if(strtotime($due_date) < strtotime(date('Y-m-d'))){
                            echo "<span class='badge badge-danger mx-1'>Vencido</span>";
                        }
                    ?>
                </dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Carpeta</b></dt>
                <dd><?php echo html_entity_decode($carpeta) ?></dd>
            </dl>
        </div>
        <div class="col-md-3">
            <dl>
                <dt><b class="border-bottom border-primary">Documentos Pendientes</b></dt>
                <dd>
                    <?php 
                        $documentosArray = explode(", ", $documentosPendientes); 
                        foreach ($documentosArray as $documento) {
                            echo "<span class='badge badge-info'>" . $documento . "</span> &nbsp;";
                        }
                    ?>
                </dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Documentos Adjuntados</b></dt>
                <dd><?php echo html_entity_decode($documentosAdjuntados) ?></dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Número del Expediente</b></dt>
                <dd><?php echo html_entity_decode($numeroExpediente) ?></dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Lugar de la Tarea</b></dt>
                <dd><?php echo html_entity_decode($lugarTarea) ?></dd>
            </dl>
            <dl>
                <dt><b class="border-bottom border-primary">Prioridad</b></dt>
                <dd><?php echo html_entity_decode($prioridad) ?></dd>
            </dl>
        </div>
        <?php
        // Obtener todos los campos de la consulta
        $valor = $conn->query("SELECT * FROM camposnuevos_tareas WHERE id_tarea=" . $_GET['id']);
        $campos = [];
        while ($row = $valor->fetch_assoc()) {
            $campos[] = $row;
        }

        // Dividir los campos en grupos de 6
        $grupos = array_chunk($campos, 5);
        $colIndex = 1; // Índice de la columna

        // Mostrar los grupos en columnas
        foreach ($grupos as $grupo) {
            $style = ($colIndex > 2) ? 'display:none;' : '';

echo '<div class="col-md-3" style="' . $style . '">';
            foreach ($grupo as $row) {
                $i = $row['campobdd'];
                ?>
                <dl>
                    <dt><b class="border-bottom border-primary"><?php echo $row['campo']; ?></b></dt>
                    <dd>
                        <?php
                        $sql = "SELECT " . $i . " FROM task_list WHERE id=" . $_GET['id'];
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
                <?php
            }
            echo '</div>'; // Cierra la columna
            $colIndex++;
        }
        ?>
  


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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>