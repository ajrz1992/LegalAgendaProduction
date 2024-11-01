<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
}

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    
    $ids = $_SESSION['id'];
    $idArray = explode(',', $ids); // Convertir la cadena de IDs en un array
    
    // Escapar los IDs para evitar SQL injection
    $escapedIds = array_map([$conn, 'real_escape_string'], $idArray);
    $idList = implode(',', $escapedIds);

    // Consulta para obtener el progreso, tarea y detalles del empleado
    $progress = $conn->query("
        SELECT 
            p.*, 
            t.task AS task_title, 
            t.id AS task_id, 
            CONCAT(u.firstname, ' ', u.lastname) AS uname, 
            u.avatar, 
            DATE_FORMAT(p.date_created, '%Y-%m-%d') AS calendar_date 
        FROM task_progress p 
        INNER JOIN task_list t ON t.id = p.task_id 
        LEFT JOIN employee_list u ON u.id = t.employee_id 
        WHERE p.task_id IN ($idList) 
        ORDER BY p.task_id, p.date_created ASC
    ");

    // Arreglo para agrupar las tareas por ID
    $tasks = [];
    if ($progress->num_rows > 0) {
        while ($row = $progress->fetch_assoc()) {
            $tasks[$row['task_id']][] = $row; // Agrupar por task_id
        }
    }
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progreso de Tareas</title>
    <link rel="stylesheet" > <!-- Asegúrate de incluir Bootstrap si lo usas -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <style>
        /* Estilos del timeline */
        .timeline-container {
            position: relative;
            padding: 20px 0;
            margin: 0;
        }
        .timeline-line {
            position: absolute;
            left: 0;
            top: 60%;
            width: 100%;
            height: 2px;
            background-color: #007bff;
            z-index: 1;
        }
        .timeline-items {
            display: flex;
            overflow-x: auto;
            padding: 10px 0;
        }
        .timeline-item {
            position: relative;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 20px;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            flex: 0 0 auto;
            width: 200px;
        }
        .timeline-item-content {
            position: relative;
            z-index: 2;
        }
        .user-block {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 0.5rem;
        }
        .user-block .username {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .user-block .username a {
            font-weight: bold;
            color: #007bff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .user-block .description {
            font-size: 0.875rem;
            color: #6c757d;
        }
        #post-field {
            max-height: 70vh;
            overflow: auto;
        }
        form {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form h5 {
            margin-bottom: 20px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div id="post-field">
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $taskId => $taskProgress): ?>
                    <h4><?php echo htmlspecialchars($taskProgress[0]['task_title']); ?></h3> <!-- Mostrar el título de la tarea -->
                    <div class="timeline-container">
                        <div class="timeline-line"></div>
                        <div class="timeline-items">
                            <?php foreach ($taskProgress as $row): ?>
                                <div class="timeline-item">
                                    <div class="timeline-item-content">
                                        <div class="user-block">
                                            <span class="username">
                                                <a href="#"><?php echo htmlspecialchars(ucwords($row['action'])); ?></a>
                                                <b><?php echo htmlspecialchars(date('M d, Y', strtotime($row['FechaCalendario']))); ?></b>
                                                <br><br>
                                            </span>
                                        </div>
                                        <div>
                                            <?php echo htmlspecialchars($row['progress']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div> <!-- Cerrar el div de los ítems de la línea de tiempo -->
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="mb-2">
                    <center><i>Ningún progreso reportado aún</i></center>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if (count($idArray) === 1): ?> <!-- Mostrar el formulario solo si hay un ID -->
        <div class="mt-4">
            <h5>Añadir Nueva Acción</h5>
            <form id="add-action-form">
                <div class="form-group">
                    <label for="action">Nombre de Acción</label>
                    <input type="text" class="form-control" id="action" name="action" required>
                </div>
                <div class="form-group">
                    <label for="FechaCalendario">Fecha</label>
                    <input type="date" class="form-control" id="FechaCalendario" name="FechaCalendario" required>
                </div>
                <div class="form-group">
                    <label for="PlazoLegal">Plazo Legal</label>
                    <input type="date" class="form-control" id="PlazoLegal" name="PlazoLegal">
                </div>
                <input type="hidden" name="task_id" value="<?php echo htmlspecialchars($ids); ?>">
                <button type="submit" class="btn btn-primary">Añadir Acción</button>
            </form>
            <div id="message-box" style="margin-top: 10px; font-weight: bold;"></div>
        </div>
    <?php else: ?>
        <p>A continuación se presenta la consolidación de tareas seleccionadas.</p>
    <?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Se agregó una tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modalMessage">Ha creado una tarea satisfactoriamente</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="modalErrorTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalErrorTitle">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="errorMessage">Ha ocurrido un error.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<script>
    $(document).ready(function() {
        $('#add-action-form').submit(function(e) {
            e.preventDefault(); // Evita el envío tradicional del formulario
            $('input').removeClass("border-danger");
            $('#message-box').html(''); // Limpiar el mensaje actual

            var formData = new FormData(this);

            $.ajax({
                url: 'ajax.php?action=save_progress',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    console.log('Respuesta del servidor:', data); // Verifica la estructura de la respuesta

                    if (data.status === 'success') {
                        $('#modalMessage').text(data.message);
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();

                        // Limpia el formulario
                        $('#add-action-form')[0].reset();

                        // Opcional: reinicia los campos del formulario a sus estados originales
                        $('input').removeClass("border-danger");
                        $('#message-box').html(''); 

                        // Actualiza el timeline sin recargar la página
                        updateTimeline();

                         // Recarga la página después de 1 segundos
                         setTimeout(function() {
                            location.reload();
                        }, 1000);

                    } else {
                        $('#errorMessage').text(data.message);
                        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                        errorModal.show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', xhr.responseText); // Muestra la respuesta del servidor para depuración
                    $('#errorMessage').text('Error en la solicitud. Por favor, inténtelo de nuevo.');
                    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    errorModal.show();
                }
            });
        });
                 

        function updateTimeline() {
                var taskId = <?php echo json_encode($ids); ?>;

                $.ajax({
                    url: 'ajax.php?action=get_progress',
                    method: 'POST',
                    data: { id: taskId },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Datos recibidos:', response); // Imprime los datos recibidos en la consola

                        // Imprime los datos en una sección del frontend para depuración
                        $('#debug-output').html('<pre>' + JSON.stringify(response, null, 2) + '</pre>');

                        if (Array.isArray(response)) {
                            $('.timeline-items').html(response.map(item => 
                                `<div class="timeline-item">
                                    <h5>${item.action}</h5>
                                    <p>${item.FechaCalendario}</p>
                                </div>`
                            ).join(''));
                        } else if (response.status === 'error') {
                            console.error('Error en la respuesta:', response.message);
                        } else {
                            console.error('Respuesta inesperada:', response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la solicitud AJAX:', xhr.responseText);
                    }
                });
            }
    });
</script>



</body>
</html>

<?php
} else {
    echo "Seleccione al menos dos Tareas a Comparar.";
}
?>
