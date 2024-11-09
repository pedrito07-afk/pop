<?php
$host = "localhost";
$user = "root";     
$password = " "; 
$database = "base_imc"; 

$conexion = new mysqli("localhost", "root", "", "base_imc");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id = $_POST['consulta'];


$query = "SELECT * FROM plan_salud WHERE id = $id";
$resultado = $conexion->query($query);

if ($resultado->num_rows > 0) {
    echo "<h2>Datos del Plan de Salud</h2>";
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
        echo "ID: " . $fila['id'] . "<br>";
        echo "Dieta: " . $fila['dieta'] . "<br>";
        echo "Recomendación: " . $fila['recomendaciones'] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión
$conexion->close();
?>