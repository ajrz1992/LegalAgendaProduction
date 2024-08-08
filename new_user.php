<?php
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_user">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Nombre</label>
							<input type="text" name="firstname" class="form-control form-control-sm" required value="<?php echo isset($firstname) ? $firstname : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Apellido</label>
							<input type="text" name="lastname" class="form-control form-control-sm" required value="<?php echo isset($lastname) ? $lastname : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Avatar</label>
							<div class="custom-file">
		                      <input type="file" class="custom-file-input" id="customFile" name="img" onchange="displayImg(this,$(this))">
		                      <label class="custom-file-label" for="customFile">Escoge archivo</label>
		                    </div>
						</div>
						<div class="form-group d-flex justify-content-center align-items-center">
							<img src="<?php echo isset($avatar) ? 'assets/uploads/'.$avatar :'' ?>" alt="Avatar" id="cimg" class="img-fluid img-thumbnail ">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Correo Electrónico</label>
							<input type="email" class="form-control form-control-sm" name="email" required value="<?php echo isset($email) ? $email : '' ?>">
							<small id="#msg"></small>
						</div>
						<div class="form-group">
							<label class="control-label">Contraseña</label>
							<input type="password" id="passwordInput"class="form-control form-control-sm" name="password" <?php echo !isset($id) ? "required":'' ?>>
							<small><i><?php echo isset($id) ? "Deje esto en blanco si no desea cambiar su contraseña":'' ?></i></small>
						</div>
						<div class="form-group">
							<label class="label control-label">Confirmar Contraseña</label>
							<input type="password" id="passwordInput2" class="form-control form-control-sm" name="cpass" <?php echo !isset($id) ? 'required' : '' ?>>
					
							<br></br><small id="pass_match" data-status=''></small><button class="btn btn-outline-secondary" type="button" id="togglePassword" style="display:none;">
      							<i id="eyeIcon" class="fa fa-eye"></i>
						</div>
						<div class="form-group" style="display:none;">
							<label class="control-label">Empresa</label>
							<input type="text" class="form-control form-control-sm" name="empresa" required value="<?php echo isset($_SESSION['login_empresa']) ? $_SESSION['login_empresa'] : '' ?>">
							<small id="#msg"></small>
						</div>
						<div class="form-group" style="display:none;">
							<label class="control-label">Pais</label>
							<input type="text" class="form-control form-control-sm" name="pais" required value="<?php echo isset($_SESSION['login_pais']) ? $_SESSION['login_pais'] : '' ?>" >
							<small id="#msg"></small>
						</div>
						<div class="form-group" style="display:none;">
							<label class="control-label">Departamento</label>
							<input type="text" class="form-control form-control-sm" name="departamento" required value="<?php echo isset($_SESSION['login_departamento']) ? $_SESSION['login_departamento'] : '' ?>">
							<small id="#msg"></small>
						</div>
						<div class="form-group" style="display:none;">
							<label class="control-label">Municipio</label>
							<input type="text" class="form-control form-control-sm" name="municipio" required value="<?php echo isset($_SESSION['login_municipio']) ? $_SESSION['login_municipio'] : '' ?>">
							<small id="#msg"></small>
						</div>
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Guardar</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=user_list'">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
		const passwordInput = document.getElementById("passwordInput");
	const passwordInput2 = document.getElementById("passwordInput2");
const togglePasswordButton = document.getElementById("togglePassword");
const eyeIcon = document.getElementById("eyeIcon");

togglePasswordButton.addEventListener("click", function() {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
		 passwordInput2.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
		 passwordInput2.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
});

	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' ||pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Contraseñas Coinciden.</i>')
				$("#togglePassword").hide();
			}else{
				$("#togglePassword").show();
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Contraseñas no Coinciden.</i>')
			}
		}
	})
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage_user').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Datos guardados',"proceso exitoso");
					setTimeout(function(){
						location.replace('index.php?page=user_list')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>Correo electrónico existe actualmente.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>