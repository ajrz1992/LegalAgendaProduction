  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
   	<a href="./" class="brand-link">
        <?php if($_SESSION['login_type'] == 2): ?>
          <p class="card-text"><b>¡Bienvenido </b><?php echo $_SESSION['login_name'] ?>!</p>
        <?php elseif($_SESSION['login_type'] == 1): ?>
        <h3 class="text-center p-0 m-0"><b>Evaluador</b></h3>
         <?php else: ?>
        <h3 class="text-center p-0 m-0"><b>Empleado</b></h3>
        <?php endif; ?>

    </a>
    </div>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de Control
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link nav-tareas">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Tareas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="./index.php?page=carpetas" class="nav-link nav-carpetaRaiz">
                  <i class="fas fa-folder-minus"></i>
                  <p> Carpeta Raiz</p>
                </a>
         </li>
              <li class="nav-item">
                <a class="nav-link nav-carpetas">
                  <i class="fas fa-folder"></i>
                  <p> Carpetas</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <?php
                  $i = 1;
                  $where = " where empresa='{$_SESSION['login_empresa']}'";
                  if($_SESSION['login_type'] == 0)
                    $where = " where id_usuario = '{$_SESSION['login_id']}' and empresa='{$_SESSION['login_empresa']}'";
                    $qry = $conn->query("SELECT * FROM carpetas $where");
                    while($row= $qry->fetch_assoc()):
                      ?>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a class="<?php echo "nav-link nav-" .str_replace(' ', '', $row['nombre'])." tree item" ?> carpetaSide" id="<?php echo ucwords($row['nombre']) ?>" href="./index.php?page=task_list">
                            <i class="fas fa-folder-open"></i>
                            <p> <?php echo ucwords($row['nombre']) ?></p>
                          </a>
                        </li>
                        </ul>
                      <?php endwhile; ?>
                </li>
            </ul>
          </li>
          <?php if($_SESSION['login_type'] != 0): ?>
          <li class="nav-item dropdown">
            <a href="./index.php?page=evaluation" class="nav-link nav-evaluation">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Evaluación
              </p>
            </a>
          </li>
        <?php endif; ?>
          <?php if($_SESSION['login_type'] == 2): ?>
          <li class="nav-item dropdown">
            <a href="./index.php?page=department" class="nav-link nav-department">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Departmentos
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=designation" class="nav-link nav-designation">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Cargos
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_employee">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Empleados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_employee" class="nav-link nav-new_employee tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Agregar Nuevo Empleado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=employee_list" class="nav-link nav-employee_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Lista de Empleados</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_evaluator">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>
                Evaluador
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_evaluator" class="nav-link nav-new_evaluator tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Agregar Nuevo Evaluador</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=evaluator_list" class="nav-link nav-evaluator_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Lista de Evaluadores</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="./index.php?page=calendario" class="nav-link nav-calendario">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Calendario
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="./index.php?page=configuracion" class="nav-link nav-estadistica">
              <i class="nav-icon far fa-chart-bar"></i>
              <p>
                Estadística
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="./index.php?page=configuracion" class="nav-link nav-informes">
              <i class="nav-icon 	fa fa-book"></i>
              <p>
                Informes
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Agregar Nuevo Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Lista de Usuarios</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="./index.php?page=configuracion" class="nav-link nav-configuracion">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Configuración
              </p>
            </a>
          </li> 
        <?php endif; ?>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      $('.carpetaSide').click(function(){
        var dato=$(this).attr('id').toString();
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
            });
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>