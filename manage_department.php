<?php
include 'db_connect.php';
session_start();
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM department_list where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<form action="" id="manage-department">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div id="msg" class="form-group"></div>
		<div class="form-group">
			<label for="department" class="control-label">Departmento</label>
			<input type="text" class="form-control form-control-sm" name="department" id="department" value="<?php echo isset($department) ? $department : '' ?>">
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Descripción</label>
			<textarea name="description" id="description" cols="30" rows="4" class="form-control"><?php echo isset($description) ? $description : '' ?></textarea>
		</div>
		<div class="form-group" style="display:none;">
							<label class="control-label">Empresa</label>
							<input type="text" class="form-control form-control-sm" name="empresa" required value="<?php echo isset($_SESSION['login_empresa']) ? $_SESSION['login_empresa'] : '' ?>">
							<small id="#msg"></small>
						</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#manage-department').submit(function(e){
			e.preventDefault();
			start_load()
			$('#msg').html('')
			$.ajax({
				url:'ajax.php?action=save_department',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Datos guardados correctamente.","success");
						setTimeout(function(){
							location.reload()	
						},1750)
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Department already exist.</div>')
						end_load()
					}
				}
			})
		})
	})

</script>