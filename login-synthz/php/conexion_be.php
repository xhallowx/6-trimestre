<?php

    $conexion = mysqli_connect("localhost", "root", "", "login_synthz");
    
// Crear tabla si no existe
$query = "
    CREATE TABLE IF NOT EXISTS usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL UNIQUE,
    usuario VARCHAR(255) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    imagen_tmp VARCHAR(255) NOT NULL
)";

if (mysqli_query($conexion, $query)) {
    echo " Tabla 'usuarios' creada o ya existe.";
} else {
    echo "Error al crear la tabla: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>