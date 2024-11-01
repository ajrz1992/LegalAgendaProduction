<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/dist/css/style-login.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");
      .select-transparente {
  background-color:  #f0f0f0;
  border: none; /* Elimina el borde */
  outline: none; /* Elimina el contorno al enfocar */
  padding: 5px; /* Agrega un poco de relleno para hacer clic en cualquier lugar del select */
  font-family: "Poppins", sans-serif;
  font-size: 1.1rem;
  color: #333;
}

      </style>
    <title>Legal Agenda Demo</title>
    <link rel="icon" href="assets/uploads/iconolegalAgenda.ico" type="image/x-icon">
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" id="login-form" class="sign-in-form">
            <h2 class="title">Inicia Sesión</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" class="form-control" name="email" placeholder="Correo Electrónico" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" name="password" required placeholder="Contraseña">
            </div>
            <!-- <div class="input-field">
              <i class="fas fa-users"></i>
              <select id="" name="login" class="select-transparente">
                <option selected disabled>Ingresar como</option>
                <option value="1">Empleado</option>
                <option value="2">Administrador</option>
            </select>
            </div> -->

            <input type="submit" value="Ingresar" class="btn solid" />
            <p class="social-text" style="display:none;">>Or Sign in with social platforms</p>
            <div class="social-media" style="display:none;">>
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="#" id="manage_user" class="sign-up-form">
            <h2 class="title">Ingresa tus datos</h2>
            <div class="input-field">
              <i class="fas fa-building"></i>
              <input type="text" id="empresa" name="empresa" placeholder="Nombre de la Empresa o Bufete"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user-circle"></i>
              <input type="text" id="firstname" name="firstname" placeholder="Nombres" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="lastname" name="lastname" placeholder="Apellidos" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-globe"></i>
              <select id="pais" name="pais" class="select-transparente" required>
                <option selected disabled>Seleccione su País</option>
                <?php 
                include "db_connect.php";
								$departments = $conn->query("SELECT * FROM paises WHERE pais='Honduras'");
								while($row=$departments->fetch_assoc()):
								?>
								<option value="<?php echo $row['pais'] ?>"><?php echo $row['pais'] ?></option>
								<?php endwhile; ?>
            </select>
            </div>
            <div class="input-field">
              <i class="fas fa-flag"></i>
              <select id="departamento" name="departamento" class="select-transparente" required>
                <option selected disabled>Seleccione su Departamento</option>
                <?php 
                include "db_connect.php";
								$departments = $conn->query("SELECT * FROM departamentos_lista order by departamento asc");
								while($row=$departments->fetch_assoc()):
								?>
								<option value="<?php echo $row['id'] ?>"><?php echo $row['departamento'] ?></option>
								<?php endwhile; ?>
            </select>
            </div>
            <div class="input-field">
              <i class="fas fa-hotel"></i>
              <select id="municipio" name="municipio" class="select-transparente" required>
          
              <option selected disabled>Seleccione su Municipio</option>
            </select>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email" name="email" placeholder="Correo Electrónico" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Contraseña" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-file"></i>
              <div class="custom-file">
		                      <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
		                    </div>
            </div>
            <input type="submit" class="btn" value="Crear cuenta" />
            <p class="social-text" style="display:none;">Or Sign up with social platforms</p>
            <div class="social-media" style="display:none;">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>¿Eres nuevo aquí?</h3>
            <p>
             Registra tu empresa aqui para que puedas revisar las tareas de tus empleados.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Crear Cuenta
            </button>
          </div>
          <img src="assets/uploads/img-login/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>¿Eres uno de los nuestros?</h3>
            <p>
             Si eres uno de los nuestros, ingresa aquí.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Iniciar Sesión
            </button>
          </div>
          <img src="assets/uploads/img-login/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
      	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
      $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          Swal.fire({
          position: "center",
            icon: "error",
            title: "¡Usuario y/o Contraseña incorrectos!",
          showConfirmButton: false,
          timer: 1500
        });
          end_load();
        }
      }
    })
  })
  })
        $('#departamento').on('change', function() {
            var seleccion = $(this).val();
            $.ajax({
                url: 'valorSeleccionadoDepartamentoLogin.php',
                type: 'POST',
                data: { opcion: seleccion },
                success: function(response) {
                    // Mostrar los resultados en el div de resultado
                    $('#municipio').html(response);
                },
                error: function(xhr, status, error) {
                    // Manejar errores si los hay
                    console.error(xhr.responseText);
                }
            });
        });
        
        $('#manage_user').submit(function(e){
     if ($('#empresa').val() === "") {
  $('#empresa').val("Abog. " +  $("#firstname").val() + " " +  $("#lastname").val());
}

		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		if($('[name="password"]').val() != '' && $('[name="cpass"]').val() != ''){
			if($('#pass_match').attr('data-status') != 1){
				if($("[name='password']").val() !=''){
					$('[name="password"],[name="cpass"]').addClass("border-danger")
					end_load()
					return false;
				}
			}
		}
  
		$.ajax({
			url:'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
					Swal.fire({
          position: "center",
            icon: "success",
            title: "¡Datos de la empresa guardados exitosamente!",
          showConfirmButton: false,
          timer: 1500,
        }).then(() => {
  // Recarga la página una vez que el temporizador termina
  location.reload();
});
        if(resp == 2){
          Swal.fire({
          position: "center",
            icon: "error",
            title: "¡Correo Electrónico ya esta siendo utilizado!",
          showConfirmButton: false,
          timer: 1500
        });
					end_load()
				}
			}
		})
	})
      </script>
    <script src="assets/dist/js/app-login.js"></script>
    <?php include 'footer.php' ?>
  </body>
</html>
