<?php
$servername = "localhost";
$username = "u755379562_josejose";
$password = "Admin2022_$";
$dbname = "u755379562_demolegalagend";

// Obtener el nuevo nombre de usuario enviado por AJAX
$carpeta = $_POST['nombre'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Sentencia SQL para actualizar el nombre de usuario
$sql = "UPDATE carpetas SET seleccionado=0";
if ($conn->query($sql) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}

$sql3 = "UPDATE task_list SET seleccionado=0";
if ($conn->query($sql3) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}

$sql2 = "UPDATE carpetas SET seleccionado=1 WHERE nombre='$carpeta'";
if ($conn->query($sql2) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}

$sql4 = "UPDATE task_list SET seleccionado=1 WHERE carpeta='$carpeta'";
if ($conn->query($sql4) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}

?>