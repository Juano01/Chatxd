<?php
require_once '_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $documento = $_POST["documento"];
    $tipoDocumento = $_POST["tipo_documento"];
    $nombre = $_POST["nombre"];
    $username = $_POST["username"];
    $telefono = $_POST["telefono"];
    $idRol = $_POST["id_rol"];
    $email = $_POST["email"];

    // Verificar si el usuario ya está registrado por documento
    $sql = "SELECT * FROM usuario WHERE documento = '$documento' LIMIT 1";
    $result = $conn->query($sql);

    // Verificar si ocurrió algún error durante la consulta
    if (!$result) {
        echo "Error al realizar la consulta: " . $conn->error;
        exit;
    }

    // Verificar si el usuario existe
    if ($result->num_rows === 0) {
        echo "El usuario no existe";
        exit;
    }

    // Actualizar la información del usuario
    $sql = "UPDATE usuario SET tipo_documento = '$tipoDocumento', nombre = '$nombre', username = '$username', telefono = '$telefono', id_rol = '$idRol', email = '$email' WHERE documento = '$documento'";

    if ($conn->query($sql)) {
        echo "Información del usuario actualizada correctamente";
    } else {
        echo "Error al actualizar la información del usuario: " . $conn->error;
    }

    // Cerrar la conexión después de realizar todas las operaciones necesarias
    $conn->close();
}
?>
