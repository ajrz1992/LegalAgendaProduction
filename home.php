<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 2): ?>
<div class="row">
  <div class="col-12 col-sm-6 col-md-4 departamentos">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <h3><?php  	$empresa=$_SESSION['login_empresa']; echo $conn->query("SELECT * FROM department_list WHERE empresa='$empresa'")->num_rows; ?></h3>
        <p>Total de Departmentos</p>            
      </div>
      <div class="icon">
        <i class="fa fa-th-list"></i>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 cargos">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <h3><?php 	$empresa=$_SESSION['login_empresa']; echo $conn->query("SELECT * FROM designation_list where empresa='$empresa'")->num_rows; ?></h3>
        <p>Total de Cargos</p>
      </div>
      <div class="icon">
        <i class="fa fa-list-alt"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-4 usuarios">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <h3><?php 	$empresa=$_SESSION['login_empresa']; echo $conn->query("SELECT * FROM users where empresa='$empresa'")->num_rows; ?></h3>
        <p>Total de Administradores</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
    </div>
  </div>
  
  <div class="col-12 col-sm-6 col-md-4 empleados">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <h3><?php $empresa=$_SESSION['login_empresa']; echo $conn->query("SELECT * FROM employee_list where empresa='$empresa'")->num_rows; ?></h3>
        <p>Total de Abogados</p>
      </div>
      <div class="icon">
        <i class="fa fa-user-friends"></i>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-4">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <h3><?php 	$empresa=$_SESSION['login_empresa']; echo $conn->query("SELECT * FROM task_list where empresa='$empresa'")->num_rows; ?></h3>
        <p>Total de Tareas</p>
      </div>
      <div class="icon">
        <i class="fa fa-tasks"></i>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-4 carpetas">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <h3><?php 	$empresa=$_SESSION['login_empresa']; echo $conn->query("SELECT * FROM carpetas where empresa='$empresa'")->num_rows; ?></h3>
        <p>Total de Carpetas</p>
      </div>
      <div class="icon">
        <i class="fas fa-folder"></i>
      </div>
    </div>
  </div>
</div>
<script>
  $('.departamentos').dblclick(function(){
		window.location.href = 'https://demolegalagenda.tecnologiainnovacion.com/index.php?page=department';
	})
   $('.usuarios').dblclick(function(){
		window.location.href = 'https://demolegalagenda.tecnologiainnovacion.com/index.php?page=user_list';
	})
   $('.cargos').dblclick(function(){
		window.location.href = 'https://demolegalagenda.tecnologiainnovacion.com/index.php?page=designation';
	})
   $('.empleados').dblclick(function(){
		window.location.href = 'https://demolegalagenda.tecnologiainnovacion.com/index.php?page=employee_list';
	})
     $('.carpetas').dblclick(function(){
		window.location.href = 'https://demolegalagenda.tecnologiainnovacion.com/index.php?page=carpetas';
	})
</script>
<?php else: ?>
   <div class="col-12">
          <div class="card">
            <div class="card-body">
              Bienvenid@ <?php echo $_SESSION['login_name'] ?>!
            </div>
          </div>
      </div>

<?php endif; ?>

