<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "_bd";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Establecer el juego de caracteres a UTF-8
if (!$conn->set_charset("utf8")) {
    die("Error al establecer el juego de caracteres UTF-8: " . $conn->error);
}

echo "Conectado a la base de datos correctamente.";

// Aquí puedes realizar operaciones con la base de datos...


?>
