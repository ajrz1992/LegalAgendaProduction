<?php include('db_connect.php') ?>
<style>
	.carpeta_click{
		cursor: move;
	}
	.button-right{
		position: absolute; /* Establecer posición absoluta */
            right: 0; /* Posicionar el botón a la derecha */
           
            margin-bottom: 10px; 
			background-color: transparent;
			border: none;
			padding: 0;
	}
	</style>
<div class="col-lg-12">
<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<button class="btn btn-block btn-sm btn-default btn-flat border-primary" id="nueva_carpeta"><i class="fas fa-folder-plus"></i> Nueva Carpeta</button>
			</div>
		</div>
		<div class="card-tools">
		<i class="fas fa-search"></i>
				<label for="">Buscar</label>
				<input type="text" id="search" placeholder="Nombre de la Carpeta"></input>
				
			</div>
        <div class="row">
			<input type="hidden" id="carpeta"></input>
             <?php
				$i = 1;
				$where = " where empresa='{$_SESSION['login_empresa']}'";
				if($_SESSION['login_type'] == 0)
					$where = " where id_usuario = '{$_SESSION['login_id']}' and empresa='{$_SESSION['login_empresa']}'";
				$qry = $conn->query("SELECT * FROM carpetas $where");
				while($row= $qry->fetch_assoc()):
			?>
			
  <div class="col-12 col-sm-6 col-md-4 carpeta_click" id="<?php echo ucwords($row['nombre']) ?>" data-nombre="<?php echo ucwords($row['nombre']) ?>" draggable="true">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <p id="nombre_carpeta"><b><?php echo ucwords($row['nombre']) ?></b></p>
        <p>Total de Tareas: 
			<?php 
				$empresa=$_SESSION['login_empresa']; 
				$carpeta=$row['nombre'];
				echo $conn->query("SELECT * FROM task_list where empresa='$empresa' and carpeta='$carpeta'")->num_rows;
			 ?>
		</p>
		
      </div>
      <div class="icon">
        <i class="fas fa-folder"></i>
      </div>
    </div>
  </div>
			<?php endwhile; ?>
	    </div>
        </div>
        </div>
		<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <img id="imagenborrar" src="assets/uploads/borrar.png" style="display:none">
</div>

<script>
	$(document).ready(function(){
		$('#search').on('input', function() {
                var textoBusqueda = $(this).val().toLowerCase(); // Obtener el texto de búsqueda y convertirlo a minúsculas
                
                // Mostrar u ocultar divs según el texto de búsqueda
                $('.carpeta_click').each(function() {
                    var nombreDiv = $(this).data('nombre').toLowerCase(); // Obtener el nombre del div y convertirlo a minúsculas
                    
                    // Mostrar el div si el nombre coincide con el texto de búsqueda, de lo contrario, ocultarlo
                    $(this).toggle(nombreDiv.includes(textoBusqueda));
                });
            });
        $('.carpeta_click').dblclick(function(){
			//var nombreCarpeta=$(this).attr('id').toString();
			var nombreCarpeta=$(this).attr('id').toString();
			$('#carpeta').val(nombreCarpeta);
			var dato=$('#carpeta').val();
			$.ajax({
				url: 'variableEmpresa.php',
				type: 'POST',
				data: { nombre: dato }, // Aquí se pasa la variable "dato" como parte de los datos de la solicitud
				success: function(response) {
					console.log('Respuesta del servidor:', response);
					window.location.href = 'https://demolegalagenda.tecnologiainnovacion.com/index.php?page=task_list';
				},
				error: function(xhr, status, error) {
					console.error('Error en la solicitud AJAX:', error);
				}
			});
		})
		$(".carpeta_click").on("contextmenu", function(event) {
			event.preventDefault();
			var nombreCarpeta=$(this).attr('id').toString();
			$('#carpeta').val(nombreCarpeta);
			Swal.fire({
  title: 'LegalAgenda',
  text: "¿Qué deseas hacer?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Editar Nombre',
  cancelButtonText: 'Eliminar Carpeta'
}).then((result) => {
  if (result.isConfirmed) {
	Swal.fire({
				title: "Editar Nombre de la Carpeta",
				input: "text",
				inputValue: nombreCarpeta,
				showCancelButton: true,
				confirmButtonText: "Editar",
				cancelButtonText: 'Cancelar',
				showLoaderOnConfirm: true
			}).then((result) => {
  				if (result.isConfirmed) {
					$.ajax({
						url:'modificar_carpeta.php',
						method:'POST',
						data:{nombreCarpeta: nombreCarpeta, valor: result.value},
						success:function(resp){
							if(resp==1){
								alert_toast("El nombre de la carpeta ha sido editado exitósamente",'success')
								
							}
						}
					})
					window.location.href = 'https://demolegalagenda.tecnologiainnovacion.com/index.php?page=carpetas';
  				}
			});
  } else {
    //aqui va el codigo de eliminar
  }
})


		})
	$('#nueva_carpeta').click(function(){
		uni_modal("<i class='fa fa-plus'></i> Nueva Carpeta","agregar_carpeta.php",'mid-large')
	})
	// $('.view_task').click(function(){
	// 	uni_modal("Ver Tarea","view_task.php?id="+$(this).attr('data-id'),'mid-large')
	// })
	$('.manage_task').click(function(){
		console.log("mauro");
		uni_modal("<i class='fa fa-edit'></i> Editar Tarea","manage_task.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.new_progress').click(function(){
		uni_modal("<i class='fa fa-plus'></i> Nuevo progreso de: "+$(this).attr('data-task'),"manage_progress.php?tid="+$(this).attr('data-tid'),'mid-large')
	})
	// $('.view_progress').click(function(){
	// 	uni_modal("Progeso de: "+$(this).attr('data-task'),"view_progress.php?id="+$(this).attr('data-tid'),'mid-large')
	// })
	$('.delete_task').click(function(){
	_conf("¿Estás seguro de eliminar esta tarea?","delete_employee",[$(this).attr('data-id')])
	})
	})
	function delete_task($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_task',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Datos eliminados exitósamente",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	}
	function manage_task(obj){
		uni_modal("<i class='fa fa-edit'></i> Editar Tarea","manage_task.php?id="+obj.name,'mid-large');
	}
	function view_task(obj){
		uni_modal("Ver Tarea","view_task.php?id="+obj.name,'mid-large')
	}
	function view_progress(obj){
		uni_modal("Progeso de: "+obj.name,"view_progress.php?id="+obj.id,'mid-large')
	}
	
	// Agregar controladores de eventos de arrastre y soltar
	var div2 = document.getElementById('div2');
        div2.addEventListener('drop', drop);
        div2.addEventListener('dragover', allowDrop);

        // Agregar controlador de evento de arrastre a las carpetas
        var carpetas = document.querySelectorAll('.carpeta_click');
        carpetas.forEach(function(carpeta) {
            carpeta.addEventListener('dragstart', dragStart);
        });
    function allowDrop(event) {
        event.preventDefault();
	
    }
    function dragStart(event) {
		$("#imagenborrar").show();
        event.dataTransfer.setData('text/plain', event.target.id);
		nombreCarpeta=$(this).attr('id').toString();
    }

    function drop(event) {
		//alert(nombreCarpeta);
		$("#imagenborrar").hide();
        event.preventDefault();
        var data = event.dataTransfer.getData('text');
        var draggableElement = document.getElementById(data);
        var clone = draggableElement.cloneNode(true);
        clone.removeAttribute('id'); // Elimina el ID para evitar conflictos
        event.target.appendChild(clone);
			$('#carpeta').val(nombreCarpeta);
			Swal.fire({
				title: 'LegalAgenda',
				text: "¿Qué deseas hacer?",
				icon: 'warning',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Elimnar Carpeta'
				}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire({
								title: "¿Estas seguro que deseas eliminar esta carpeta?",
								showCancelButton: true,
								confirmButtonText: "Si, Eliminar",
								cancelButtonText: 'Cancelar',
								showLoaderOnConfirm: true
							}).then((result) => {
								if (result.isConfirmed) {
									$.ajax({
										url:'eliminar_carpeta.php',
										method:'POST',
										data:{nombreCarpeta: nombreCarpeta},
										success:function(resp){
											if(resp==1){
												Swal.fire({
												position: "center",
												icon: "success",
												title: "¡Carpeta eliminada con éxito!",
												showConfirmButton: false,
												timer: 1500
												});
												
											}
											window.location.href = 'https://demolegalagenda.tecnologiainnovacion.com/index.php?page=carpetas';
										}
									})
									
								}
							});
				} 
				})
    }
</script>
