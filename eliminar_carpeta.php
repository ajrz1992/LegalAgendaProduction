<?php
// Obtener el ID del registro a eliminar
$variable = $_POST['nombreCarpeta'];

// Conectar a la base de datos y ejecutar la consulta para eliminar el registro
// Reemplaza las variables de conexión y consulta con tus propios valores
include 'db_connect.php';

// Consulta SQL para eliminar el registro
$sql = "DELETE FROM carpetas WHERE nombre='$variable'";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

$sql2 = "DELETE FROM task_list WHERE carpeta='$variable'";

if ($conn->query($sql2) === TRUE) {
    echo "Registro eliminado correctamente";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
