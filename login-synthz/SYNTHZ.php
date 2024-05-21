<?php
session_start();

if(!isset($_SESSION['usuario'])){
    echo'
        <script>
            alert("Por favor debes iniciar sesión");
            window.location= "index.php";
        </script>
    ';
    session_destroy();
    die();
}
?>    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYNTHZ</title>
    <style>
        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
    <img src="<?php echo $_SESSION['imagen']; ?>" alt="Imagen de Perfil" class="profile-img">
    <a href="php/cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>
