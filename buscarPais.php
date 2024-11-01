<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "u755379562_josejose";
$password = "Admin2022_$";
$dbname = "u755379562_demolegalagend";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el término de búsqueda desde la solicitud AJAX
$searchTerm = $_GET['term'];

// Consulta para buscar países que coincidan con el término de búsqueda
$sql = "SELECT pais FROM paises WHERE pais LIKE '%" . $searchTerm . "%'";
$result = $conn->query($sql);

// Almacenar los resultados en un array
$results = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results[] = $row['pais'];
    }
}

// Enviar los resultados en formato JSON
echo json_encode($results);

// Cerrar conexión
$conn->close();
?>
