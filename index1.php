<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGEO</title>
    <link rel="stylesheet" type="text/css" href="va3.css">

    <script>
        function mostrarMensajeBienvenida() {
            alert("¡Bienvenido! Tus datos se han registrado exitosamente.");
        }
    </script>
</head>
<body>
<img class="gif-animado" src="lluvias.gif" alt="GIF animado">

<form action="index.php" method="POST">

    <p>Para registrarte ingresa tus datos personales</p>
    <input type="text" name="nom" placeholder="Nombre" id="nom" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Solo letras y espacios permitidos"><br>

    <input type="text" name="apePat" placeholder="Apellido Paterno" id="apePat" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Solo letras y espacios permitidos"><br>

    <input type="text" name="apeMat" placeholder="Apellido Materno" id="apeMat" required pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" title="Solo letras y espacios permitidos"><br>

    <input type="text" name="dir" placeholder="Dirección" id="dir" required><br>

    <input type="tel" name="tel" placeholder="Número Telefónico" id="tel" required pattern="[0-9]+" title="Solo números permitidos"><br>

    <input type="email" name="diremail" placeholder="Ejemplo: micorreo@gmail.com" required><br>


    <input type="submit" value="Enviar Datos"><br>
    <input type="reset" value="Resetear Datos"><br>

    <div class="todoList"><h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $apePat = isset($_POST['apePat']) ? $_POST['apePat'] : '';
            $apeMat = isset($_POST['apeMat']) ? $_POST['apeMat'] : '';
            $dir = isset($_POST['dir']) ? $_POST['dir'] : '';
            $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
            $email = isset($_POST['diremail']) ? $_POST['diremail'] : '';
            $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

            
            $servidor = "localhost";
            $nombreusuario = "root"; 
            $password = "";
            $db = "logeo"; 
            
            $conexion = new mysqli($servidor, $nombreusuario, $password, $db);
            
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }
            
            $sql = "INSERT INTO logeo (Nombre, apePat, apeMat, Direccion, Telefono, Email, contraseña) 
                    VALUES ('$nom','$apePat','$apeMat','$dir','$tel','$email','$pass')";
            
            if ($conexion->query($sql) === true) {
                echo "<br>";
                echo "Bienvenido, " . $nom . " " . $apePat . " " . $apeMat . ", Tus datos se han registrado exitosamente en el servidor , presione el boton acceder para continuar";
            
            } else {
                die("Error fatal al intentar registrarse: " . $conexion->error);
            }
            
            $conexion->close();
        }
        ?></h1>
    </div>
    <h1><a href="index2.html">Acceder</a></h1>

</form>


</body>
</html>
