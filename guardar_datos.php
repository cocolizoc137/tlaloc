<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $nombreusuario = "root";
    $password = ""; 
    $db = "logeo";

    // Conexión a la base de datos
    $conexion = new mysqli($servidor, $nombreusuario, $password, $db);

    // Verificación de conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Recuperación de los datos del formulario
    $texto = $_POST['texto'];
    $pass = $_POST['pass'];
    $nom = $_POST['nom'];
    $ape = $_POST['apePat'];
    $apeM = $_POST['apeMat'];
    $dir = $_POST['dir'];
    $tel = $_POST['tel'];
    $email = $_POST['diremail'];

    // Preparación de la consulta SQL
    $sql = "INSERT INTO usuarios(usuario, contraseña, nombre, Apellidopat, Apellidomat, Direccion, Telefono, email) VALUES ('$texto', '$pass', '$nom', '$ape', '$apeM', '$dir', '$tel', '$email')";

    // Ejecución de la consulta y manejo de errores
    if ($conexion->query($sql) === true) {
        // Redireccionar de vuelta al formulario con un mensaje de éxito
        header("Location: formulario.html?exito=true");
        exit();
    } else {
        // Redireccionar de vuelta al formulario con un mensaje de error
        header("Location: formulario.html?exito=false");
        exit();
    }

    $conexion->close();
}
?>
