<?php
session_start();
ini_set('display_errors', 1);
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
					use PHPMailer\PHPMailer\SMTP;
					use PHPMailer\PHPMailer\Exception;
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$type = array("employee_list","evaluator_list","users");
		// $qry = $this->db->query("SELECT *,concat(firstname,' ',lastname) as name FROM {$type[$login]} where email = '".$email."' and password = '".md5($password)."'  ");
			$qry = $this->db->query("SELECT *,concat(firstname,' ') as name FROM {$type[$login]} where email = '".$email."' and password = '".md5($password)."'  ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
					$_SESSION['login_type'] = $login;
				return 1;
		}else{
			return 2;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function login2(){
		extract($_POST);
			$qry = $this->db->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM students where student_code = '".$student_code."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['rs_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function save_user(){
		extract($_POST);
		$data = "";
	
		// Construir los datos de la consulta SQL
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','password')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
	
		if(!empty($password)){
			$data .= ", password=md5('$password') ";
		}
	
		// Validar que el email no esté repetido
		$check = $this->db->query("SELECT * FROM users WHERE email ='$email' ".(!empty($id) ? " AND id != {$id} " : ''))->num_rows;
		if($check > 0){
			return array('status' => 'failure', 'message' => 'Correo Electrónico ya Registrado!');
			exit;
		}
	
		// Manejo del avatar si se sube una imagen
		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$data .= ", avatar = '$fname' ";
		} else {
			// Si no hay imagen subida, asignar imagen por defecto
			if(empty($data)){
				$data = "avatar = 'no-image-available.png'";
			} else {
				$data .= ", avatar = 'no-image-available.png'";
			}
		}
	
		// Si el ID está vacío, es una inserción
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users SET $data");
	
			// Configuración y envío de correo para nuevo usuario
			$mail = new PHPMailer(true);
			try {
				$mail->isSMTP();
				$mail->Host = 'smtp.hostinger.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'soporte.legalagenda@tecnologiainnovacion.com';
				$mail->Password = 'Admin2024_$';
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;
	
				$mail->setFrom('soporte.legalagenda@tecnologiainnovacion.com', 'Soporte-LegalAgenda');
				$mail->addAddress($email, 'Usuario Creado');
	
				$mail->isHTML(true);
				$mail->Subject = 'Bienvenido';
				$mail->Body = 'Bienvenido a Legal Agenda';
	
				$mail->send();
				return array('status' => 'success', 'message' => 'Usuario creado exitosamente');
			} catch (Exception $e) {
				echo 'Error al enviar el correo: ', $mail->ErrorInfo;
				return array('status' => 'failure', 'message' => 'Error al enviar el correo');
			}
		} else {
			// Si el ID está presente, es una actualización
			$save = $this->db->query("UPDATE users SET $data WHERE id = $id");
	
			// Configuración y envío de correo para usuario modificado
			$mail = new PHPMailer(true);
			try {
				$mail->isSMTP();
				$mail->Host = 'smtp.hostinger.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'soporte.legalagenda@tecnologiainnovacion.com';
				$mail->Password = 'Admin2024_$';
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;
	
				$mail->setFrom('soporte.legalagenda@tecnologiainnovacion.com', 'Soporte-LegalAgenda');
				$mail->addAddress($email, 'Usuario Modificado');
	
				$mail->isHTML(true);
				$mail->Subject = 'Usuario Modificado';
				$mail->Body = 'Sus datos de usuario han sido modificados.';
	
				$mail->send();
				return array('status' => 'success', 'message' => 'Usuario actualizado correctamente');
			} catch (Exception $e) {
				echo 'Error al enviar el correo: ', $mail->ErrorInfo;
				return array('status' => 'failure', 'message' => 'Error al enviar el correo');
			}
		}
		if($save){
			echo json_encode(['status' => 'success', 'message' => 'Usuario creado exitosamente']);
			return 1;
		}
	}
	function signup(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass')) && !is_numeric($k)){
				if($k =='password'){
					if(empty($v))
						continue;
					$v = md5($v);

				}
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}

		$check = $this->db->query("SELECT * FROM users where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$data .= ", avatar = '$fname' ";

		}
		if(empty($id)){
			if(!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')){	
			$data .= ", avatar = 'no-image-available.png' ";
		}
			$save = $this->db->query("INSERT INTO users set $data");

		}else{
			$save = $this->db->query("UPDATE users set $data where id = $id");
		}

		if($save){
			if(empty($id))
				$id = $this->db->insert_id;
			foreach ($_POST as $key => $value) {
				if(!in_array($key, array('id','cpass','password')) && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
					$_SESSION['login_id'] = $id;
				if(isset($_FILES['img']) && !empty($_FILES['img']['tmp_name']))
					$_SESSION['login_avatar'] = $fname;
			return 1;
		}
	}

	function update_user(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass','table','password')) && !is_numeric($k)){
				
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$type = array("employee_list","evaluator_list","users");
		$check = $this->db->query("SELECT * FROM {$type[$_SESSION['login_type']]} where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$data .= ", avatar = '$fname' ";

		}
		if(!empty($password))
			$data .= " ,password=md5('$password') ";
		if(empty($id)){
			if(!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')){	
				$data .= ", avatar = 'no-image-available.png' ";
			}
			$save = $this->db->query("INSERT INTO {$type[$_SESSION['login_type']]} set $data");
		}else{
			$save = $this->db->query("UPDATE {$type[$_SESSION['login_type']]} set $data where id = $id");
		}

		if($save){
			foreach ($_POST as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			if(isset($_FILES['img']) && !empty($_FILES['img']['tmp_name']))
					$_SESSION['login_avatar'] = $fname;
			return 1;
		}
	}
	function delete_user(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$id);
		if($delete)
			return 1;
	}
	function save_system_settings(){
		extract($_POST);
		$data = '';
		foreach($_POST as $k => $v){
			if(!is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if($_FILES['cover']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['cover']['name'];
			$move = move_uploaded_file($_FILES['cover']['tmp_name'],'../assets/uploads/'. $fname);
			$data .= ", cover_img = '$fname' ";

		}
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set $data where id =".$chk->fetch_array()['id']);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set $data");
		}
		if($save){
			foreach($_POST as $k => $v){
				if(!is_numeric($k)){
					$_SESSION['system'][$k] = $v;
				}
			}
			if($_FILES['cover']['tmp_name'] != ''){
				$_SESSION['system']['cover_img'] = $fname;
			}
			return 1;
		}
	}
	function save_image(){
		extract($_FILES['file']);
		if(!empty($tmp_name)){
			$fname = strtotime(date("Y-m-d H:i"))."_".(str_replace(" ","-",$name));
			$move = move_uploaded_file($tmp_name,'assets/uploads/'. $fname);
			$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
			$hostName = $_SERVER['HTTP_HOST'];
			$path =explode('/',$_SERVER['PHP_SELF']);
			$currentPath = '/'.$path[1]; 
			if($move){
				return $protocol.'://'.$hostName.$currentPath.'/assets/uploads/'.$fname;
			}
		}
	}
	function save_department(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','user_ids')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM department_list where department = '$department' and id != '{$id}' ")->num_rows;
		if($chk > 0){
			return 2;
		}
		if(isset($user_ids)){
			$data .= ", user_ids='".implode(',',$user_ids)."' ";
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO department_list set $data");
		}else{
			$save = $this->db->query("UPDATE department_list set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_department(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM department_list where id = $id");
		if($delete){
			return 1;
		}
	}
	function save_designation(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','user_ids')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$chk = $this->db->query("SELECT * FROM designation_list where designation = '$designation' and id != '{$id}' ")->num_rows;
		if($chk > 0){
			return 2;
		}
		if(isset($user_ids)){
			$data .= ", user_ids='".implode(',',$user_ids)."' ";
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO designation_list set $data");
		}else{
			$save = $this->db->query("UPDATE designation_list set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_designation(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM designation_list where id = $id");
		if($delete){
			return 1;
		}
	}
	function save_employee(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass','password')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(!empty($password)){
					$data .= ", password=md5('$password') ";

		}
		$check = $this->db->query("SELECT * FROM employee_list where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$data .= ", avatar = '$fname' ";

		}
		if(empty($id)){
			if(!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')){	
				$data .= ", avatar = 'no-image-available.png' ";
			}
			$save = $this->db->query("INSERT INTO employee_list set $data");
		}else{
			$save = $this->db->query("UPDATE employee_list set $data where id = $id");
		}

		if($save){
			return 1;
		}
	}
	function delete_employee(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM employee_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_evaluator(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','cpass','password')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(!empty($password)){
					$data .= ", password=md5('$password') ";

		}
		$check = $this->db->query("SELECT * FROM evaluator_list where email ='$email' ".(!empty($id) ? " and id != {$id} " : ''))->num_rows;
		if($check > 0){
			return 2;
			exit;
		}
		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$data .= ", avatar = '$fname' ";

		}
		if(empty($id)){
			if(!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')){	
				$data .= ", avatar = 'no-image-available.png' ";
			}
			$save = $this->db->query("INSERT INTO evaluator_list set $data");
		}else{
			$save = $this->db->query("UPDATE evaluator_list set $data where id = $id");
		}

		if($save){
			return 1;
		}
	}
	function delete_evaluator(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM evaluator_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_task(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if($k == 'description')
					$v = trim(htmlentities(str_replace("'","&#x2019;",$v)));
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
			$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
			$data .= ", avatar = '$fname' ";

		}
		if(empty($id)){
			if(!isset($_FILES['img']) || (isset($_FILES['img']) && $_FILES['img']['tmp_name'] == '')){	
				$data .= ", avatar = 'no-image-available.png' ";
			}
			$save = $this->db->query("INSERT INTO task_list set $data");
		}else{
			$save = $this->db->query("UPDATE task_list set $data where id = $id");
		}

		if($save){
			return 1;
		}
	}
	function save_carpeta(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if($k == 'description')
					$v = htmlentities(str_replace("'","&#x2019;",$v));
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO carpetas set $data");
		}else{
			$save = $this->db->query("UPDATE carpetas set $data where id = $id");
		}
		if($save){
			return 1;
		}
	}
	function delete_task(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM task_list where id = $id");
		if($delete){
			return 1;
		}
	}
	function save_progress(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if($k == 'progress')
					$v = htmlentities(str_replace("'","&#x2019;",$v));
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		if(!isset($is_complete))
			$data .= ", is_complete=0 ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO task_progress set $data");
			return array('status' => 'success', 'message' => 'Tarea creada satisfactoriamente');
			
		}else{
			$save = $this->db->query("UPDATE task_progress set $data where id = $id");
		}
		if($save){
		if(!isset($is_complete))
			$this->db->query("UPDATE task_list set status = 1 where id = $task_id ");
		else
			$this->db->query("UPDATE task_list set status = 2 where id = $task_id ");
			return 1;
		}
	}
	function delete_progress(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM task_progress where id = $id");
		if($delete){
			return 1;
		}
	}
	function save_evaluation(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id')) && !is_numeric($k)){
				if(empty($data)){
					$data .= " $k='$v' ";
				}else{
					$data .= ", $k='$v' ";
				}
			}
		}
		$data .= ", evaluator_id = {$_SESSION['login_id']} ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO ratings set $data");
		}else{
			$save = $this->db->query("UPDATE ratings set $data where id = $id");
		}
		if($save){
		if(!isset($is_complete))
			return 1;
		}
	}
	function delete_evaluation(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM ratings where id = $id");
		if($delete){
			return 1;
		}
	}
	function get_emp_tasks(){
		extract($_POST);
		$empresa=$_SESSION['login_empresa'];
		if(!isset($task_id))
		
		$get = $this->db->query("SELECT * FROM task_list where empresa='$empresa' and employee_id = $employee_id and status = 2 and id not in (SELECT task_id FROM ratings) ");
		else
		$get = $this->db->query("SELECT * FROM task_list where empresa='$empresa' and employee_id = $employee_id and status = 2 and id not in (SELECT task_id FROM ratings where task_id !='$task_id') ");
		$data = array();
		while($row=$get->fetch_assoc()){
			$data[] = $row;
		}
		return json_encode($data);
	}
	#function get_progress(){
	#	extract($_POST);
	#	$get = $this->db->query("SELECT p.*,concat(u.firstname,' ',u.lastname) as uname,u.avatar FROM task_progress p inner join task_list t on t.id = p.task_id inner join employee_list u on u.id = t.employee_id where p.task_id = $task_id order by unix_timestamp(p.date_created) desc ");
	#	$data = array();
	#	while($row=$get->fetch_assoc()){
	#		$row['uname'] = ucwords($row['uname']);
	#		$row['progress'] = html_entity_decode($row['progress']);
	#		$row['date_created'] = date("M d, Y",strtotime($row['date_created']));
	#		$data[] = $row;
	#	}
	#	return json_encode($data);
	#}

	#Josue
	#function get_progress($task_id) {
	#	
	#	$task_id = isset($_POST['id']) ? $_POST['id'] : null;
	#	$get = $this->db->query("SELECT p.*,  t.task AS task_title, CONCAT(u.firstname, ' ', u.lastname) AS uname, u.avatar, DATE_FORMAT(p.date_created, '%Y-%m-%d') AS calendar_date FROM task_progress p INNER JOIN task_list t ON t.id = p.task_id INNER JOIN employee_list u ON u.id = t.employee_id WHERE p.task_id = '$task_id' ORDER BY p.date_created ASC ");
	#	$data = array();
	#
	#	// Itera sobre los resultados de la consulta
	#	while ($row = $get->fetch_assoc()) {
	#		// Procesa los datos de cada fila
	#		$row['action'] = ucwords($row['action']); // Capitaliza el nombre del usuario
	#		$row['FechaCalendario'] = date("M d, Y", strtotime($row['FechaCalendario'])); // Formatea la fecha
	#		$data[] = $row; // Añade la fila al array de resultados
	#	}
	#	// Devuelve los datos en formato JSON
	#	return json_encode($data);
	#}

	public function get_progress($taskIDs) {
		$data = array();
		try {
			// Asegúrate de que $taskIDs esté correctamente formateado como una cadena separada por comas
			$taskIDs = $this->db->real_escape_string($taskIDs); // Protege contra inyecciones SQL
			
			// Construye la consulta SQL
			$query = "SELECT 
						  p.action,
						  p.FechaCalendario
					  FROM 
						  task_progress p 
					  INNER JOIN 
						  task_list t ON t.id = p.task_id 
					  INNER JOIN 
						  employee_list u ON u.id = t.employee_id 
					  WHERE  
						  p.task_id IN ($taskIDs) 
					  ORDER BY 
						  p.date_created ASC";
			
			// Ejecuta la consulta
			$qry = $this->db->query($query);
	
			// Verifica si la consulta fue exitosa
			if (!$qry) {
				throw new Exception('Query failed: ' . $this->db->error);
			}
	
			// Procesa los resultados
			while ($row = $qry->fetch_assoc()) {
				$row['action'] = ucwords($row['action']); // Capitaliza el nombre del usuario
				$row['FechaCalendario'] = date("M d, Y", strtotime($row['FechaCalendario'])); // Formatea la fecha
				$data[] = $row;
			}
		} catch (Exception $e) {
			// Captura el error y lo guarda en el log de errores
			error_log('Error: ' . $e->getMessage()); // Guarda el error en el log de errores de PHP
			$data = ['error' => 'An error occurred: ' . $e->getMessage()];
		}
	
		// Retorna el resultado en formato JSON
		return json_encode($data);
	}
	
	
	

	function get_report($task_id){
		extract($_POST);
		$data = array();
		$get = $this->db->query("SELECT t.*,p.name as ticket_for FROM ticket_list t inner join pricing p on p.id = t.pricing_id where date(t.date_created) between '$date_from' and '$date_to' order by unix_timestamp(t.date_created) desc ");
		while($row= $get->fetch_assoc()){
			$row['date_created'] = date("M d, Y",strtotime($row['date_created']));
			$row['name'] = ucwords($row['name']);
			$row['adult_price'] = number_format($row['adult_price'],2);
			$row['child_price'] = number_format($row['child_price'],2);
			$row['amount'] = number_format($row['amount'],2);
			$data[]=$row;
		}
		return json_encode($data);

		

	}
}