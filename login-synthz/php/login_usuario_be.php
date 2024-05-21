<?php
session_start();
include 'conexion_be.php';

$correo = $_POST['correo'];
$clave = $_POST['clave'];

// Consulta para obtener el hash de la contraseña almacenada en la base de datos
$query = "SELECT * FROM usuarios WHERE correo='$correo'";
$resultado = mysqli_query($conexion, $query);

if(mysqli_num_rows($resultado) > 0){
    $usuario = mysqli_fetch_assoc($resultado);

    // Verifica la contraseña usando password_verify
    if(password_verify($clave, $usuario['clave'])){
        $_SESSION['usuario'] = $correo;
        $_SESSION['imagen'] = $usuario['imagen']; // Guarda la ruta de la imagen en la sesión
        header("location: ../SYNTHZ.php");
        exit;
    } else {
        echo '
        <script>
            alert("Contraseña incorrecta, por favor verifique los datos introducidos");
            window.location = "../index.php";
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("Este usuario no existe, por favor verifique los datos introducidos");
        window.location = "../index.php";
    </script>
    ';
}

mysqli_close($conexion);
?>
