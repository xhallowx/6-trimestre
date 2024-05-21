<?php
    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT); // Encripta la contraseña

    // Manejo de la carga de la imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_tmp = $_FILES['imagen']['tmp_name'];
    $ruta_imagen = '../uploads/' . $imagen;

    // Mueve la imagen cargada al directorio de destino
    if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
    // Inserta los datos del usuario en la base de datos
    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, clave, imagen) 
    VALUES('$nombre_completo','$correo','$usuario','$clave','$ruta_imagen')";
    }  
    // Verifica que los datos no se repitan
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo ='$correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
        <script>
            alert("Este correo ya está registrado, intenta con otro diferente");
            window.location = "../index.php";
        </script>
        ';
        exit();


    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario ='$usuario' ");
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
        <script>
            alert("Este usuario ya está registrado, intenta con otro diferente");
            window.location = "../index.php";
        </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo ' 
            <script>
                alert("Usuario no almacenado, inténtelo nuevamente");
                window.location = "../index.php";
            </script>
        ';
    }
} else {
    echo ' 
        <script>
            alert("Hubo un problema al subir la imagen");
            window.location = "../index.php";
        </script>
    ';
}

mysqli_close($conexion);
?>
