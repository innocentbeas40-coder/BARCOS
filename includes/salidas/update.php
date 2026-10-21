<?php

require '../../db/proteger.php';
require __DIR__ . '/../../db/conexion.php';
require '../../includes/funciones/salidas/actualizar_salidas.php';

$salida = actualizar_salida();

$IdSalida = $_GET['IdSalida'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../build/css/app.css">

    <title>Actualizar salida</title>

</head>

<body>

    <form method="post">

        <?php

        if ($errores) {

            foreach ($errores as $error) {

                echo "<p>$error</p>";

            }

        }

        ?>

        <fieldset>

            <h3>Actualiza tu salida</h3>

            <div class="contenedor_campos">

                <div class="campos">

                    <input
                        type="date"
                        name="Fecha"
                        value="<?php echo $salida['Fecha']; ?>"
                    >

                </div>


                <div class="campos">

                    <input
                        type="time"
                        name="Hora"
                        value="<?php echo $salida['Hora']; ?>"
                    >

                </div>


                <div class="campos">

                    <input
                        type="text"
                        name="Destino"
                        placeholder="Destino"
                        value="<?php echo $salida['Destino']; ?>"
                    >

                </div>


                <div class="campos">

                    <input
                        type="text"
                        name="Barcos_Matricula"
                        placeholder="Matrícula del barco"
                        value="<?php echo $salida['Barcos_Matricula']; ?>"
                    >

                </div>

            </div>


            <div class="contenedor_boton">

                <input
                    class="boton"
                    type="submit"
                    name="actualizar"
                    value="Actualizar"
                >

            </div>

        </fieldset>


        <div class="contenedor_boton">

            <a class="boton" href="../../pag/salidas.php">
                Volver atrás
            </a>

        </div>

    </form>

</body>

</html>
