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

<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}

.col-md-3 {
    min-height: 300px; /* Ajusta según sea necesario */
}
</style>

<script>
$('#documentosPendientes').hide();
	const isEmail = input => /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(input);
	$('#no').prop('checked', true);
	$('#si').on('change', function() {
	//$('#si').prop('checked', true);
	$('#no').prop('checked', false);
    $('#documentosPendientes').show();
	$('#documentosPendientes').tagEditor({
  		beforeTagSave: (field, editor, tags, tag, val) => {
    		// make sure it is a formally valid email
			if (!isEmail(val)) {
				console.log(`"${val}" is not a valid email`);
				//return false;
			}
  		}
	});
});

$('#no').on('change', function() {
	$('#no').prop('checked', true);
	$('#si').prop('checked', false);
    $('#documentosPendientes').hide();
});


	$(document).ready(function() {
       
    $('.documentosAdjuntadosTarea').on('click', function() {
        $('.documentosAdjuntados').toggle(); // Alternar la visibilidad

        if ($('#valor_id').val() == "") {
            // Ocultar elementos si no hay valor en #valor_id
            $('.imagendiv, .imagenlogo, .imagenlogodos, .numeroExpediente, .documentosPendientes, .nombreFuncionario, .lugarTarea, .vencimientoplazolegal').hide();
            $('.prioridad').show();
        } else {
            // Mostrar elementos si hay valor en #valor_id
            $('.imagendiv, .imagenlogo, .imagenlogodos, .numeroExpediente, .documentosAdjuntados, .nombreFuncionario, .lugarTarea, .prioridad, .documentosPendientes, .vencimientoplazolegal').show();
        }
    });

    // Función para mostrar imagen
    function displayImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#cimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $('#archivo').text($('#customFile').val().split('\\').pop());
    }

    // Llama a displayImg cuando el input cambia
    $('#customFile').on('change', function() {
        displayImg(this);
    });

    // Inicialización de Summernote
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ol', 'ul', 'paragraph', 'height']],
            ['table', ['table']],
            ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
        ]
    });

    // Inicialización de Select2
    $('#employee_id').select2({
        placeholder: 'Elija empleado',
        width: '100%'
    });

    $('#prioridad').select2({
        placeholder: 'Elija la prioridad',
        width: '100%'
    });
});
		
$('#manage-task').on('submit', function(e) {
       e.preventDefault(); // Previene el envío del formulario si no es válido
    //e.preventDefault(); // Prevenir el envío del formulario inicialmente
    // Validar el formulario usando HTML5
    if (!this.checkValidity()) {
        if (sessionStorage.getItem('valor') === null) {
            alert("Por favor ingrese un nombre de la tarea y elija un abogado para poder guardar.");
            localStorage.setItem('valor',0);
            $(this)[0].reportValidity();
        //this.reportValidity();
        return; 
       
        }     
        // No proceder con la llamada AJAX si el formulario no es válido  
    }
    // Si el formulario es válido, ejecutar la lógica AJAX
    start_load();
    $.ajax({
        url: 'ajax.php?action=save_task',
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast('Datos grabados satisfactoriamente', "Proceso Exitóso");
                $('#exampleModal').hide();
                setTimeout(function() {
                    location.reload();
                }, 50);
            }
        }
    });
});

$('#campo').on('input', function() {
    // Obtener el texto ingresado y eliminar los espacios y convertirlo a minúsculas
    var texto = $(this).val().replace(/\s+/g, '').toLowerCase();
       
    // Agregar el texto modificado al segundo campo de texto
    $('#campobdd').val(texto + "_"+$("#task").val().replace(/\s+/g, '').toLowerCase());   
        // Establecer la variable de sesión con el texto modificado
        //sessionStorage.setItem('textoModificado', texto);
    });
	$('.cerrarModal').on('click', function() {
    	$('#exampleModal').hide();
		$('#manage-task').show();
		
	});
	$('.borrarCampo').on('click', function() {
		var idLabel = $(this).parent().attr("id");
		
		Swal.fire({
			title: "¿Estas seguro que deseas elimnar este campo?",
			text: "¡No podrás revertir esto!",
			icon: "warning",
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Si, ¡Eliminalo!"
			}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "borrar_campo.php", // URL del script PHP que procesará la solicitud
					type: "POST", // Método de la solicitud (POST o GET)
					data: { campo: idLabel }, // Datos a enviar (en este caso, el ID del registro)
					success: function(response) {
						// Manejar la respuesta del servidor si es necesario
						Swal.fire({
							title: "¡Eliminado!",
							text: "El campo se ha eliminado",
							icon: "success",
                timer: 2000,
                showConfirmButton: false
						}).then(() => {
                			location.reload();
				//$('#exampleModal').modal('hide');
				
            });
						// Recargar la página o actualizar la interfaz de usuario según sea necesario
						
					},
					error: function(xhr, status, error) {
						// Manejar errores si los hay
						console.error(xhr.responseText);
					}
            	});
				//uni_modal("<i class='fa fa-edit'></i> Editar Tarea","manage_task.php?id="+obj.name,'mid-large');
			}
		});
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
						Swal.fire({
							 title: "¡Guardado!",
                text: "El campo se ha guardado",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
				}).then(() => {
				location.reload();
            });
        },
				error: function(xhr, status, error) {
        			Swal.fire({
					position: "center",
					icon: "error",
					title: "ERROR",
					showConfirmButton: false,
					timer: 2000
				});
    		}
		})
	});
	
	$(".preguntaTarea").on('click', function() {
		Swal.fire({
		title: "Tarea",
		zIndex: 2000,
		html: "<b>Indica aquí el nombre o proceso que realizarás.</b> "
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
		$(".asignarTarea").on('click', function() {
		Swal.fire({
		title: "Asignar a",
		html: "<b>Aquí puede asignar la tarea a otra persona.</b> ",
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
	
			$(".fechaVencimientoTarea").on('click', function() {
		Swal.fire({
		title: "Fecha de Presentación",
		html: "<b>Utiliza este campo para establecer una fecha límite para la presentación del expediente o para asignar un plazo a otra persona.</b> "
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
	$(".documentosPendientesTarea").on('click', function() {
		Swal.fire({
		title: "Documentos Pendientes",
		html: "<b>Aquí puedes listar los documentos que aún faltan para completar el expediente.</b> "
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
		$(".plagoLegalTarea").on('click', function() {
		Swal.fire({
		title: "Vencimiento de Plazo Legal",
		html: "<b>Indica aquí la fecha límite establecida por una autoridad gubernamental o judicial.</b> "
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
			$(".documentosAdjuntadosTarea").on('click', function() {
		Swal.fire({
		title: "Documentos Adjuntados",
		html: "<b>Indica qué documentos has adjuntado al expediente.</b> "
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
				$(".nombreFuncionarioTarea").on('click', function() {
		Swal.fire({
		title: "Nombre del Funcionario",
		html: "<b>Indica aquí el nombre del funcionario público o judicial a cargo del expediente</b> "
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
					$(".lugarDondeTarea").on('click', function() {
		Swal.fire({
		title: "Lugar Donde se presentó la Tarea",
		html: "<b>Especifica dónde se presentó el expediente.</b> "
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
						$(".logotipoTarea").on('click', function() {
		Swal.fire({
		title: "Logotipo",
		html: "<b>Puedes cargar una imagen relacionada con la tarea, como el logotipo de tu bufete, empresa o el de tu cliente, para distinguirla de las demás tareas.</b> "
		}).then((result) => {
        // Acción a realizar cuando se presiona "OK"
		 event.stopPropagation();
        // Aquí puedes añadir la lógica que necesites ejecutar. 
});
		
	});
</script>
<button type="button" class="btn btn-primary botonAgregarCampos" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-plus"></i> Agregar Campos</button><br><br>
<label style="display:none">Nota: Para poder guardar una Tarea tienes que escribir el nombre de la tarea y asignarsela a un Abogado</label>
<div class="container-fluid">
	<form id="manage-task">
		<input type="hidden" id="valor_id" name="id" value="<?php echo isset($id) ? $id : '' ?>">
	    <div class="col-lg-12">
            <div class="row">
            <!-- Primera columna: hasta 'Numero de Expediente' -->
                <div class="col-md-3 d-flex flex-column">
                    <div class="form-group">
                        <label for="">Tarea </label>&nbsp;<i class="fa fa-question-circle preguntaTarea"></i>
                        <input type="text" class="form-control form-control-sm" id="task" name="task" value="<?php echo isset($task) ? $task : '' ?>" required placeholder="Escriba el nombre de su tarea">
                    </div>
                    <input type="hidden" name="empresa" value="<?php echo $_SESSION['login_empresa']; ?>">
                    <?php 
                        $carpeta = $conn->query("SELECT * FROM carpetas where empresa='{$_SESSION['login_empresa']}' and seleccionado=1");
                        while($row=$carpeta->fetch_assoc()):
                    ?>
                    <input type="hidden" name="carpeta" value="<?php echo $row['nombre'] ?>">
                    <?php endwhile; ?>
                    <input name="seleccionado" type="hidden" value=1>
                    <div class="form-group">
                        <label for="">Asignar a</label>&nbsp;<i class="fa fa-question-circle asignarTarea"></i>
                        <select name="employee_id" id="employee_id" class="form-control form-control-sm" required>
                            <option value="" disabled selected>Elija un Abogado</option>
                                <optgroup label="Empleados">
                                    <?php 
                                        $employees = $conn->query("SELECT concat(firstname,' ',middlename,' ',lastname) AS name,id FROM employee_list where empresa='{$_SESSION['login_empresa']}'");
                                        while($row=$employees->fetch_assoc()):
                                    ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($employee_id) && $employee_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                </optgroup>
                                    <?php endwhile; ?>
                                <optgroup label="Administradores">
                                    <?php 
                                        $employees = $conn->query("SELECT concat(firstname,' ',lastname) AS name, id FROM users where empresa='{$_SESSION['login_empresa']}'");
                                        while($row=$employees->fetch_assoc()):
                                    ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($employee_id) && $employee_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                </optgroup>
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Cliente</label>
                        <input type="text" class="form-control form-control-sm" name="cliente" value="<?php echo isset($cliente) ? $cliente : '' ?>" placeholder="Escriba el nombre del Cliente">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de Presentación</label>&nbsp;<i class="fa fa-question-circle fechaVencimientoTarea"></i>
                        <input type="date" class="form-control form-control-sm" name="due_date" value="<?php echo isset($due_date) ? $due_date : date("Y-m-d") ?>">
                    </div>
                    <div id="tagContainer" class="form-group documentosPendientes">
                        <label for="">Documentos Pendientes: </label>&nbsp;<i class="fa fa-question-circle documentosPendientesTarea"></i>
                        <label for="">Si</label>
                        <input type="checkbox" id="si" value="si">
                        <label for="">No</label>
                        <input type="checkbox" id="no" value="no">
                        <input type="text" class="form-control form-control-sm" id="documentosPendientes" name="documentosPendientes" value="<?php echo isset($documentosPendientes) ? $documentosPendientes : '' ?>" placeholder="Escriba los documentos pendientes">
                    </div>
                    <div class="form-group imagendiv">
                        <label for="" class="control-label">Logotipo </label>&nbsp;<i class="fa fa-question-circle logtipoTarea"></i>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
                            <label class="custom-file-label" id="archivo" for="customFile">Escoge archivo</label>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center imagenlogo">
                        <img src="<?php echo isset($meta['avatar']) ? 'assets/uploads/'.$meta['avatar'] :'' ?>" alt="" id="cimg" class="img-fluid img-thumbnail imagenlogodos">
                    </div>
                </div>

                <!-- Segunda columna: desde 'Documentos Adjuntados' hasta el final de la primera parte -->
                <div class="col-md-3 d-flex flex-column" style="display:none;">
                    <div class="form-group vencimientoplazolegal">
                    <label for="">Vencimiento de Plazo Legal </label>&nbsp;<i class="fa fa-question-circle plagoLegalTarea"></i>
                    <input type="number" class="form-control form-control-sm" name="plazoLegal" value="<?php echo isset($plazoLegal) ? $plazoLegal : '' ?>" placeholder="Escriba el Plazo" maxlength="4" min="0" max="9999">
                </div>
                            <div class="form-group numeroExpediente">
                    <label for="">Numero de Expediente</label>
                    <input type="text" class="form-control form-control-sm" name="numeroExpediente" value="<?php echo isset($numeroExpediente) ? $numeroExpediente : '' ?>" placeholder="Escriba el número de expediente">
                </div>
                <div class="form-group documentosAdjuntados" style="display:none;">
                    <label for="">Documentos Adjuntados </label>&nbsp;<i class="fa fa-question-circle documentosAdjuntadosTarea"></i>
                    <input type="text" class="form-control form-control-sm" name="documentosAdjuntados" value="<?php echo isset($documentosAdjuntados) ? $documentosAdjuntados : '' ?>" placeholder="Escriba los documentos adjuntados">
                </div>
                <div class="form-group nombreFuncionario" style="display:none;">
                    <label for="">Nombre del Funcionario </label>&nbsp;<i class="fa fa-question-circle nombreFuncionarioTarea"></i>
                    <input type="text" class="form-control form-control-sm" name="nombreFuncionario" value="<?php echo isset($nombreFuncionario) ? $nombreFuncionario : '' ?>" placeholder="Escriba el nombre del Funcionario">
                </div>
                <div class="form-group lugarTarea" style="display:none;">
                    <label for="">Lugar donde se presentó la Tarea </label>&nbsp;<i class="fa fa-question-circle lugarDondeTarea"></i>
                    <input type="text" class="form-control form-control-sm" name="lugarTarea" value="<?php echo isset($lugarTarea) ? $lugarTarea : '' ?>" placeholder="Escriba el lugar">
                </div>
                <div class="form-group prioridad">
                    <label for="">Nivel de Prioridad</label>
                    <select name="prioridad" id="prioridad" class="form-control form-control-sm">
                    <option value="<?php echo isset($prioridad) ? $prioridad : '' ?>"><?php echo isset($prioridad) ? $prioridad : '' ?></option>
                        <option value="Urgente">Urgente</option>
                        <option value="Importante">Importante</option>
                        <option value="Medio">Medio</option>
                        <option value="Bajo">Bajo</option>
                    </select>
                </div>
            <?php
                // Obtén los primeros 3 campos nuevos
                $cnuevos = $conn->query("SELECT * FROM camposnuevos_tareas WHERE id_tarea=$id LIMIT 3"); // Limitar a 3
                while ($row = $cnuevos->fetch_assoc()): ?>
                    <div class="form-group camposnuevos">
                        <label id="<?php echo $row['campobdd']; ?>" for=""><?php echo $row['campo']; ?> <i class="fa fa-trash borrarCampo"></i></label>
                        <input type="<?php echo ($row['tipo'] == "varchar(100)") ? "text" : (($row['tipo'] == "int") ? "number" : "date"); ?>" class="form-control form-control-sm" name="<?php echo $row['campobdd']; ?>" placeholder="<?php echo $row['campo']; ?>" 
                        value="<?php
                            $sql = "SELECT " . $row['campobdd'] . " FROM task_list WHERE id=$id";
                            $resultado = $conn->query($sql);
                            echo ($resultado->num_rows > 0) ? $resultado->fetch_assoc()[$row['campobdd']] : "";
                        ?>">
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Tercera columna: campos restantes -->
             <!-- Tercera columna: desde 'camposnuevos' -->
           <?php
// Obtén todos los campos nuevos
$cnuevos = $conn->query("SELECT * FROM camposnuevos_tareas WHERE id_tarea=$id LIMIT 300 OFFSET 6");

// Inicializa un contador para saber en qué columna estás
$contador = 0;
$columnas = [];
$columnasMax = 6; // Número máximo de campos por columna

// Recorre los campos y agrégales a las columnas correspondientes
while ($row = $cnuevos->fetch_assoc()) {
    $i = $row['campobdd'];

    // Si el contador es divisible por el número máximo de campos, crea una nueva columna
    if ($contador % $columnasMax == 0) {
        $columnas[] = [];
    }

    // Agrega el campo a la columna actual
    $columnas[count($columnas) - 1][] = $row;

    $contador++;
}
?>
    <?php foreach ($columnas as $index => $columna): ?>
    <div class="col-md-3 d-flex flex-column"  style="<?php echo $index > 1 ? 'display:none;' : ''; ?>">
            <?php foreach ($columna as $row): ?>
                <div class="form-group camposnuevos" style="<?php echo $index > 1 ? 'display:none;' : ''; ?>">
                    <label id="<?php echo $row['campobdd']; ?>" for=""><?php echo $row['campo']; ?> <i class="fa fa-trash borrarCampo"></i></label>
                    <input type="<?php
                        if ($row['tipo'] == "varchar(100)") {
                            echo "text";
                        }
                        if ($row['tipo'] == "int") {
                            echo "number";
                        }
                        if ($row['tipo'] == "date") {
                            echo "date";
                        }
                    ?>" class="form-control form-control-sm" name="<?php echo $row['campobdd']; ?>" placeholder="<?php echo $row['campo']; ?>" 
                    value="<?php
                        $sql = "SELECT " . $row['campobdd'] . " FROM task_list WHERE id=$id";
                        $resultado = $conn->query($sql);
                        if ($resultado->num_rows > 0) {
                            $field = $resultado->fetch_assoc();
                            $nombre = $field[$row['campobdd']];
                        } else {
                            $nombre = "";
                        }
                        echo $nombre;
                    ?>">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

            
        </div> 
    </form>

 </div>
	<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Campos</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del Campo</label>
            <input type="text" class="form-control form-control-sm" id="campo" placeholder="Escribe el nombre del campo">
          </div>
          <div class="form-group" style="display:none">
            <label for="recipient-name" class="col-form-label">Nombre del Campo BDD</label>
            <input type="text" class="form-control form-control-sm"  id="campobdd" placeholder="Escribe el nombre del campo EN MINISCULA, SIN ESPACIOS Y SINCARACTERES ESPECIALES">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Tipo del Campo</label>
            <select id="tipo" class="form-control form-control-sm" required>
							<option value="varchar(100)">Texto</option>
							<!-- <option value="int">Numérico</option> -->
							<option value="date">Fecha</option>
						</select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cerrarModal">Cerrar</button>
        <button type="button" class="btn btn-primary guardarCampos">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div>
