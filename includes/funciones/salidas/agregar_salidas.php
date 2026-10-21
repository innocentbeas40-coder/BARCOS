<?php

function agregar_salidas()
{
    require __DIR__ . '/../../../db/conexion.php';

    $errores = [];

    $Fecha = mysqli_real_escape_string($conex, $_POST['Fecha']);
    $Hora = mysqli_real_escape_string($conex, $_POST['Hora']);
    $Destino = mysqli_real_escape_string($conex, $_POST['Destino']);
    $Barcos_Matricula = mysqli_real_escape_string($conex, $_POST['Barcos_Matricula']);


    // VALIDAR FECHA

    if (!$Fecha) {
        $errores[] = "Ingrese la fecha";
    }


    // VALIDAR HORA

    if (!$Hora) {
        $errores[] = "Ingrese la hora";
    }


    // VALIDAR DESTINO

    if (!$Destino) {
        $errores[] = "Ingrese el destino";
    } elseif (!preg_match("/^[\p{L}0-9 ]+$/u", $Destino)) {
        $errores[] = "El destino solo debe contener letras, números y espacios";
    }


    // VALIDAR MATRÍCULA

    if (!$Barcos_Matricula) {
        $errores[] = "Ingrese la matrícula del barco";
    }


    // VERIFICAR QUE EL BARCO EXISTA

    if (!$errores) {

        $query = "SELECT * FROM barco WHERE matricula = '$Barcos_Matricula'";

        $resultado = mysqli_query($conex, $query);

        if (!$resultado) {

            $errores[] = "Error al consultar la base de datos";

        } elseif (mysqli_num_rows($resultado) == 0) {

            $errores[] = "El barco no existe";
        }
    }


    // AGREGAR SALIDA

    if (!$errores) {

        $query = "INSERT INTO salidas
                  (Fecha, Hora, Destino, Barcos_Matricula)
                  VALUES
                  ('$Fecha', '$Hora', '$Destino', '$Barcos_Matricula')";

        $resultado = mysqli_query($conex, $query);

        if ($resultado) {

            echo "Salida agregado con éxito";
        }else{
            echo "Error al agregar Salida" . mysqli_error($conex);
        }
    }

    return $errores;
}
