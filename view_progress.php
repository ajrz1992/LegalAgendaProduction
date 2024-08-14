<?php
session_start();
include 'db_connect.php';
$id = $_GET['id'];
?>
<div class="container-fluid">
    <div id="post-field">
    <?php 
    // Consulta para obtener el progreso, tarea y detalles del empleado
    $progress = $conn->query("
        SELECT 
            p.*, 
            t.task AS task_title, 
            CONCAT(u.firstname, ' ', u.lastname) AS uname, 
            u.avatar, 
            DATE_FORMAT(p.date_created, '%Y-%m-%d') AS calendar_date 
        FROM task_progress p 
        INNER JOIN task_list t ON t.id = p.task_id 
        INNER JOIN employee_list u ON u.id = t.employee_id 
        WHERE p.task_id = '$id' 
        ORDER BY p.date_created ASC
    ");
    
    // Verificar si hay resultados
    if ($progress->num_rows > 0):
    ?>
        <div class="timeline-container">
            <div class="timeline-line"></div>
            <div class="timeline-items">
    <?php
        while($row = $progress->fetch_assoc()):
    ?>
            <div class="timeline-item">
                <div class="timeline-item-content">
                    <div class="user-block">
                        <!-- <img class="img-circle img-bordered-sm" src="assets/uploads/<?php echo htmlspecialchars($row['avatar']); ?>" alt="user image">-->
                        <span class="username">
                            <a href="#"><?php echo htmlspecialchars(ucwords($row['action'])); ?></a>
                            <b><?php echo htmlspecialchars(date('M d, Y', strtotime($row['FechaCalendario']))); ?></b>
							<br>
							<br>
                        </span>
                    </div>
                    <div>
                        <?php echo htmlspecialchars($row['progress']); ?>
                    </div>
                </div>
            </div>
    <?php
        endwhile;
    ?>
            </div> <!-- Cerrar el div de los ítems de la línea de tiempo -->
        </div>
    <?php else: ?>
        <div class="mb-2">
            <center><i>Ningún progreso reportado aún</i></center>
        </div>
    <?php endif; ?>
    </div>
</div>

<style>
    .timeline-container {
        position: relative;
        padding: 20px 0;
        margin: 0;
    }
    .timeline-line {
        position: absolute;
        left: 0;
        top: 60%; /* Ajusta este valor para desplazar la línea hacia abajo */
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
        /* Ajusta el ancho según sea necesario */
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
    .user-block img {
        border-radius: 50%;
        height: 50px;
        width: 50px;
        object-fit: cover;
        margin-right: 10px;
    }
    .user-block .username {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .user-block .username a {
        font-weight: bold;
        color: #007bff;
        white-space: nowrap; /* Evita que el texto se rompa en varias líneas */
        overflow: hidden; /* Oculta el texto que desborda */
        text-overflow: ellipsis; /* Agrega puntos suspensivos si el texto es demasiado largo */
    }
    .user-block .description {
        font-size: 0.875rem;
        color: #6c757d;
    }
    #post-field {
        max-height: 70vh;
        overflow: auto;
    }
</style>

<div class="modal-footer display p-0 m-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>

<script>
    $('.manage_progress').click(function(){
        uni_modal("<i class='fa fa-edit'></i> Editar Progreso","manage_progress.php?tid=<?php echo $id ?>&id="+$(this).attr('data-id'),'large')
    })
    $('.delete_progress').click(function(){
        _conf("¿Estás seguro de eliminar este progreso?","delete_progress",[$(this).attr('data-id')])
    })
    function delete_progress($id){
        start_load()
        $.ajax({
            url:'ajax.php?action=delete_progress',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp == 1){
                    alert_toast("Dato eliminado",'Proceso Exitoso')
                    setTimeout(function(){
                        location.reload()
                    },1500)
                }
            }
        })
    }
</script>

<style>
    #uni_modal .modal-footer{
        display: none
    }
    #uni_modal .modal-footer.display{
        display: flex
    }
</style>
