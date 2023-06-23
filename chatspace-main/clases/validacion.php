<?php
session_start();
require_once '_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar las credenciales del usuario
    $sql = "SELECT * FROM usuario WHERE username = '$username' and password='$password' ";
    $result = mysqli_query($conn, $sql);

    $filas=mysql_fetch_array($result); 


    if($filas['id_rol']==1){ //comprador

        header("location: comprador.html");




    }
    else
    if($filas['id_rol']==2){ //vendedor

        header("location: vendedor.html");

}
?>
