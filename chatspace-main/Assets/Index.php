<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil Tinder</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <style>
    .profile-card {
      width: 300px;
      border: 1px solid #ddd;
      border-radius: 10px;
      margin: 20px;
      padding: 20px;
      background-color: #fff;
    }
    .profile-image {
      width: 100%;
      height: 300px;
      border-radius: 10px;
      object-fit: cover;
      margin-bottom: 20px;
    }
    .profile-info {
      font-size: 20px;
      margin-bottom: 10px;
      color: #333;
    }
    .profile-description {
      font-size: 16px;
      color: #777;
      margin-bottom: 20px;
    }
    .profile-buttons {
      display: flex;
      justify-content: space-between;
    }
    .profile-buttons button {
      width: 45%;
    }
    .btn-like {
      background-color: #fd297b;
      border-color: #fd297b;
    }
    .btn-dislike {
      background-color: #ff5353;
      border-color: #ff5353;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="profile-card">
          <?php
            // Establecer la conexión a la base de datos
            $servername = "nombre_servidor";
            $username = "nombre_usuario";
            $password = "contraseña";
            $database = "nombre_base_de_datos";
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar la conexión
            if ($conn->connect_error) {
              die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener los datos del perfil del usuario desde la base de datos
            $sql = "SELECT * FROM perfil WHERE id = 1"; // Cambiar "perfil" por el nombre de la tabla de perfiles y 1 por el ID del perfil deseado
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $nombreUsuario = $row["nombre_usuario"];
              $descripcion = $row["descripcion"];
              $imagenPerfil = $row["imagen_perfil"];

              // Mostrar los datos en la vista
              echo "<img class='profile-image' src='$imagenPerfil' alt='Profile Image'>";
              echo "<h2 class='profile-info'>$nombreUsuario</h2>";
              echo "<p class='profile-description'>$descripcion</p>";
            } else {
              echo "No se encontraron datos de perfil";
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
          ?>
          <div class="profile-buttons">
            <button class="btn btn-like">Me gusta</button>
            <button class="btn btn-dislike">No me gusta</button>
          </div>
        </div>
