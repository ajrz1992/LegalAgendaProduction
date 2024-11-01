<!DOCTYPE html>
<html lang="es">
<?php session_start() ?>
<?php 
	if(!isset($_SESSION['login_id']))
	    header('location:login.php');
    include 'db_connect.php';
    ob_start();
  if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  }
  ob_end_flush();

	include 'header.php' 
?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include 'topbar.php' ?>
  <?php include 'sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-body text-white">
	    </div>
	  </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">    <h1 class="m-0"><?php
            if($title=="Home") {
              $title="Inicio";
            }
            if($title=="Lista de Tareas") {
              $title="Lista de Tareas";
            }
            if($title=="New Employee") {
              $title="Nuevo Empleado";
            }
            if($title=="Employee List") {
              $title="Lista de Empleados";
            }
            if($title=="Evaluation") {
              $title="Evaluación";
            }
            if($title=="Department") {
              $title="Departamentos";
            }
            if($title=="Designation") {
              $title="Cargos";
            }
            if($title=="New Evaluator") {
              $title="Nuevo Evaluador";
            }
            if($title=="Evaluator List") {
              $title="Lista de Evaluadores";
            }
            if($title=="New User") {
              $title="Nuevo Usuario";
            }
            if($title=="User List") {
              $title="Lista de Usuarios";
            }
            if($title=="Edit User") {
              $title="Editar Usuario";
            }
            echo $title ?></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            if(!file_exists($page.".php")){
                include '404.html';
            }else{
            include $page.'.php';

            }
          ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmación</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continuar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Guardar</button>
        <button type="button" class="btn btn-secondary cancelar">Cancelar</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline-block">
      <b><?php echo $_SESSION['system']['name'] ?></b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
<script>
  
  $(document).click(function(event) {
                if (!$(event.target).closest('#uni_modal, #openModal').length) {
                    $('#uni_modal').modal('hide');
                    //sessionStorage.removeItem('valor');
                }
            });
	$(document).on('keydown', function(event) {
  if (event.key === "Escape") {
	//$('#exampleModal').hide();
    //$('#manage-task').hide();
	 sessionStorage.removeItem('valor');
	location.reload();
  }


});
  	$('.cancelar').on('click', function() {
      sessionStorage.removeItem('valor');
      location.reload();  
	});
  $('#submit').on('click', function() {
    if(localStorage.getItem('valor')==0){
      localStorage.removeItem('valor');
    }
    else{
      location.reload(); 
      sessionStorage.removeItem('valor');   
    }
      
	});
  </script>
</html>
