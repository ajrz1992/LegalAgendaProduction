<?php include 'db_connect.php'; 
?>


<div class="col-lg-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <div class="card-tools">
                <a class="btn btn-default btn-sm btn-flat border-info wave-effect text-info view-progress" id="view-selected-progress"  data-toggle="modal" data-target="#progressModal">
                    <i class="fa fa-plus"></i> Comparar Progresos
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php
            $empresa = $_SESSION['login_empresa'];
            $qry = $conn->query("
               SELECT 
                t.carpeta, 
                t.id, 
                t.task, 
                s.action, 
                s.FechaCalendario 
            FROM 
                task_list t 
            INNER JOIN 
                task_progress s ON t.id = s.task_id 
            INNER JOIN 
                (
                    SELECT 
                        task_id, 
                        MAX(FechaCalendario) AS last_activity_date 
                    FROM 
                        task_progress 
                    GROUP BY 
                        task_id
                ) latest ON s.task_id = latest.task_id AND s.FechaCalendario = latest.last_activity_date 
            WHERE 
                t.empresa = '$empresa' 
            ORDER BY 
                t.carpeta, 
                s.FechaCalendario DESC;
            ");

            $current_carpeta = '';

            while ($row = $qry->fetch_assoc()):
                if ($current_carpeta != $row['carpeta']):
                    if ($current_carpeta != ''):
            ?>
                    </tbody>
                </table>
                <?php endif; ?>
                
                <h3><?php echo htmlspecialchars($row['carpeta']); ?></h3>
                <table class="table table-hover table-bordered" id="list">
                    <thead>
                        <tr>
                            <th class="text-center"><input type="checkbox" class="select-task" value="<?php echo htmlspecialchars($row['id']) ?>"></th>
                            <th>Tarea</th>
                            <th>Última Actividad</th>
                            <th>Fecha</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $current_carpeta = $row['carpeta'];
                endif;
                ?>
                <tr>
                    <td class="text-center"><input type="checkbox" class="select-task" value="<?php echo htmlspecialchars($row['id']) ?>"></td>
                    <td><b><?php echo htmlspecialchars(ucwords($row['task'])) ?></b></td>
                    <td><b><?php echo htmlspecialchars(ucwords($row['action'])) ?></b></td>
                    <td><b><?php echo htmlspecialchars(date('d-m-Y', strtotime($row['FechaCalendario']))) ?></b></td>
                    <td class="text-center">
                        <button class="btn btn-default btn-sm btn-flat border-info wave-effect text-info view-progress" data-id="<?php echo htmlspecialchars($row['id']) ?>" data-toggle="modal" data-target="#progressModal">Ver progreso</button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- Modal para ver el progreso -->
<div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="progressModalLabel">Detalles del Progreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="progressContent">
                <!-- Aquí se cargará el contenido del progreso -->
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#list').dataTable();

        // Seleccionar/Desmarcar todas las casillas de verificación
        $('#select-all').click(function() {
            var checked = this.checked;
            $('.select-task').each(function() {
                this.checked = checked;
            });
        });

        // Enviar los IDs seleccionados al servidor
        $('#view-selected-progress').click(function() {
            var selectedIds = [];
            $('.select-task:checked').each(function() {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length > 0) {
                var idsString = selectedIds.join(','); // Convertir el array de IDs en una cadena separada por comas

                // Imprimir los IDs concatenados en la consola
                console.log('IDs seleccionados: ' + idsString);

                $.ajax({
                    url: 'view_progress.php',
                    method: 'GET',
                    data: { ids: idsString },
                    success: function(response) {
                        $('#progressContent').html(response);
                        $('#progressModal').modal('show'); // Asegúrate de que el modal se muestre después de cargar el contenido
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al cargar el progreso:', error);
                    }
                });
            } else {
                alert('Por favor, selecciona al menos una tarea.');
            }
        });

        // Cargar el contenido del progreso en el modal
        $('.view-progress').click(function() {
            var id = $(this).data('id'); // Usar .data('id') para acceder al atributo data-id

            // Imprimir el ID en la consola
            console.log('ID seleccionado: ' + id);

            $.ajax({
                url: 'view_progress.php',
                method: 'GET',
                data: { id: id },
                success: function(response) {
                    $('#progressContent').html(response);
                    $('#progressModal').modal('show'); // Asegúrate de que el modal se muestre después de cargar el contenido
                },
                error: function(xhr, status, error) {
                    console.error('Error al cargar el progreso:', error);
                }
            });
        });
    });
</script>



<style>
    .modal-lg {
        max-width: 45%; /* Ajusta el ancho del modal */
    }

    .modal-body {
        max-height: 80vh; /* Ajusta la altura del contenido del modal */
        overflow-y: auto; /* Agrega un scroll vertical si el contenido es largo */
    }
</style>