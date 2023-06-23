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
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Verificar que las contraseñas coincidan
    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden";
        exit;
    }

    // Verificar si el usuario ya está registrado por documento
    $sq = "SELECT * FROM usuario WHERE documento = '$documento' LIMIT 1";
    $result = $conn->query($sq);
    if ($result->num_rows > 0) {
        echo "El usuario ya está registrado";
        exit;
    }

    // Cifrar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Crear la consulta SQL para insertar el usuario
    $sql = "INSERT INTO usuario (documento, tipo_documento, nombre, username, telefono, id_rol, email, password) VALUES ('$documento', '$tipoDocumento', '$nombre', '$username', '$telefono', '$idRol', '$email', '$hashedPassword')";

    if ($conn->query($sql)) {
        echo "Usuario registrado correctamente";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}

$conn->close();
?>
http://localhost/chatspace-main/Assets/register.html



http://localhost/chatspace-main/clases/_sesion/verificar_documento.php