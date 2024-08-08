<?php
$servername = "localhost";
$username = "u755379562_josejose";
$password = "Admin2022_$";
$dbname = "u755379562_demolegalagend";
session_start();
// Obtener el nuevo nombre de usuario enviado por AJAX
$id_valor = $_POST['id_valor'];
$empresa_valor= $_POST['empresa_valor'];


// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "UPDATE task_list set carpeta='$empresa_valor', seleccionado=0 WHERE id=$id_valor";
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