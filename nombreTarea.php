<?php
// Recibir la variable enviada por AJAX
$servername = "localhost";
$username = "u755379562_josejose";
$password = "Admin2022_$";
$dbname = "u755379562_demolegalagend";

// Obtener el nuevo nombre de usuario enviado por AJAX
$miVariable = $_POST['variable'];

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Sentencia SQL para actualizar el nombre de usuario
$sql = "UPDATE buscador SET buscador=$miVariable";
if ($conn->query($sql) === TRUE) {
    echo "Nombre de usuario actualizado correctamente";
} else {
    echo "Error al actualizar el nombre de usuario: " . $conn->error;
}
?>