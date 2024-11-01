<!-- Navbar -->
<script>
  $(document).ready(function() {
    $(".notificacion").each(function(indice) {
        var notificacion = $(this);
        notificacion.click(function() { // Agrega un controlador de eventos para hacer clic en la notificación
        notificacion.fadeOut(); // Desvanece la notificación cuando se hace clic en ella
    });
    });
    $(".tareasvencidas").click(function() {
      var id = $(this).attr("id");
      uni_modal("Ver Tarea","view_task.php?id="+id,'mid-large')
    });
});

  </script>
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <?php if(isset($_SESSION['login_id'])): ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      </li>
    <?php endif; ?>
      <li class="nav-item dropdown">
        <span>
                <div class="d-felx badge-pill">
                <span><?php echo ucwords($_SESSION['login_empresa']) ?></span>
                  <span class=""><img src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img border "></span>
                </div>
              </span>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    <li>
    <a href="#">
      
    </a>
  </li>
    <li class="nav-item dropdown">
            <a class="nav-link"  data-toggle="dropdown" aria-expanded="true" href="javascript:void(0)">
              <span>
                <div class="d-felx badge-pill">
                <span class="icon">🔔</span>
                <span class="badge notificacion"><?php 
				          $empresa=$_SESSION['login_empresa']; 
				        echo $conn->query("SELECT * FROM task_list where empresa='$empresa'")->num_rows;
			      ?></span>
                </div>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
            <?php
            $where = " where empresa='{$_SESSION['login_empresa']}'";
                  if($_SESSION['login_type'] == 0)
                    $where = " where empresa='{$_SESSION['login_empresa']}'";
                    $qry = $conn->query("SELECT DATEDIFF(due_date, CURDATE()) AS diferencia_dias, task,id FROM task_list $where");
                    while($row= $qry->fetch_assoc()):
                      ?>
              
              <a class="dropdown-item tareasvencidas" href="javascript:void(0)" id="<?php echo $row['id']; ?>">
              <?php 
              $task=$row['task'];
              $d=$row['diferencia_dias'];
              if($d<=10){
                if($d<=0){
                  echo "<i class='fas fa-heart-broken'></i> <b>Tarea: ".$task ." - ¡Tarea Vencida!</b>";
                }else{
                  echo "<i class='fas fa-sad-cry'></i> <b>Tarea: ".$task ." - En ".$d." días vence esta Tarea, ¡Apresúrate!</b>";
                }
              }         
              ?></a>
                <?php endwhile; ?>
            </div>
                    

      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     <li class="nav-item dropdown">
            <a class="nav-link"  data-toggle="dropdown" aria-expanded="true" href="javascript:void(0)">
              <span>
                <div class="d-felx badge-pill">
                  <span class=""><img src="assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" alt="" class="user-img border "></span>
                  <span><b><?php echo ucwords($_SESSION['login_firstname']) ?></b></span>
                  <span class="fa fa-angle-down ml-2"></span>
                </div>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
              <a class="dropdown-item" href="javascript:void(0)" id="manage_account"><i class="fa fa-cog"></i> Gestionar Cuenta</a>
              <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
            </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <script>
     $('#manage_account').click(function(){
        uni_modal('Gestionar Cuenta','manage_user.php?id=<?php echo $_SESSION['login_id'] ?>')
      })
  </script>
  <style>
    .user-img {
        border-radius: 50%;
        height: 25px;
        width: 25px;
        object-fit: cover;
    }
  </style>
