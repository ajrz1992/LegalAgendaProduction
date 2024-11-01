<?php
$servername = "localhost";
$username = "u755379562_josejose";
$password = "Admin2022_$";
$dbname = "u755379562_demolegalagend";

// Obtener el nuevo nombre de usuario enviado por AJAX
$campo = $_POST['campo'];
$campobdd = $_POST['campobdd'];
$tipo = $_POST['tipo'];
$idtarea = $_POST['idtarea'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Sentencia SQL para actualizar el nombre de usuario
$sql = "INSERT INTO camposnuevos_tareas (campo, tipo, id_tarea, campobdd) values('$campo', '$tipo', $idtarea, '$campobdd')";
if ($conn->query($sql) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}

$nombre_tabla = "task_list";
$sql2 = "ALTER TABLE " . $nombre_tabla . " ADD COLUMN " . $campobdd . " " . $tipo;
if ($conn->query($sql2) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}

$tabla = "campos_tareas";
$sql3 = "ALTER TABLE " . $tabla . " ADD COLUMN " . $campobdd . " " . $tipo;
if ($conn->query($sql3) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}

$sql4 = "INSERT INTO campos_tareas (idtarea) values($idtarea)";
if ($conn->query($sql4) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}

?>