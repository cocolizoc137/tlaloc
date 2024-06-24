<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ticket de Compra</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stilot.css">
</head>
<body>
    <center>
        <header id="h_1">
            <img src="tlaloc.png" width="200px" height="100">
            <img src="calendario.jpg" width="900px" height="200">
            <nav><h1>
                <a href="principio.html">INICIO</a>
            </nav></h1>
        </header>
        <section id="s_1">
            <h2>Ticket de Compra</h2>
            <?php
                $producto = $_GET['producto'];
                $precio = 0;

                switch ($producto) {
                    case 'carga_completa_arena':
                        $precio = 3500;
                        break;
                    case 'bloque_tabimax_24x12x12':
                        $precio = 5;
                        break;
                    case 'block_doble_hueco_liso_10x20x40':
                        $precio = 11.50;
                        break;
                    case 'cemento_gris_cruz_azul_50k':
                        $precio = 150;
                        break;
                    default:
                        echo "<p>Producto no encontrado</p>";
                        exit();
                }

                echo "<p>Producto: $producto</p>";
                echo "<p>Precio: $$precio</p>";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $tarjeta = $_POST['tarjeta'];
                    echo "<p>Número de Tarjeta: $tarjeta</p>";
                    echo "<p>Su compra ha sido exitosa.</p>";
                    echo "<p>¡Gracias por su compra!</p>";
                } else {
                    echo "<form method='post' action='comprar.php?producto=$producto'>";
                    echo "<label for='tarjeta'>Ingrese su número de tarjeta:</label>";
                    echo "<input type='text' id='tarjeta' name='tarjeta' pattern='\d{16}' maxlength='16' required>";
                    echo "<input type='submit' value='Pagar'>";
                    echo "</form>";
                }
            ?>
        </section>
    </center>
</body>
</html>
