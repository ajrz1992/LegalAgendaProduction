<?php
$servername = "localhost";
$username = "u755379562_josejose";
$password = "Admin2022_$";
$dbname = "u755379562_demolegalagend";
session_start();
// Obtener el nuevo nombre de usuario enviado por AJAX
$carpeta = $_POST['nombre'];
$empresa= $_SESSION['login_empresa'];


// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM carpetas WHERE empresa='$empresa'";
$resultado = $conn->query($sql);

// Array para almacenar las opciones
$opciones = array();

// Verificar si se obtuvieron resultados
if ($resultado->num_rows > 0) {
    // Recorrer los resultados y almacenarlos en el array de opciones
    while ($row = $resultado->fetch_assoc()) {
        $opciones[] = $row;
    }
}

// Devolver las opciones en formato JSON
echo json_encode($opciones);
?>