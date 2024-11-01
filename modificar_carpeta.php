<?php
$servername = "localhost";
$username = "u755379562_josejose";
$password = "Admin2022_$";
$dbname = "u755379562_demolegalagend";

// Obtener el nuevo nombre de usuario enviado por AJAX

$nombreCarpeta = $_POST['nombreCarpeta'];
$valor = $_POST['valor'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$sql4 = "UPDATE carpetas set nombre='$valor' WHERE nombre='$nombreCarpeta'";
if ($conn->query($sql4) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}


$sql5 = "UPDATE task_list set carpeta='$valor' WHERE carpeta='$nombreCarpeta'";
if ($conn->query($sql5) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}




?>