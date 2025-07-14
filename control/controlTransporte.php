<?php

class Transporte
{
    function __construct($id, $transporte, $costo_transporte)
    {
        $this->id = $id;
        $this->transporte = $transporte;
        $this->costo_transporte = $costo_transporte;
    }

    public static function insertar($transporte, $costo_transporte)
    {
        include '../conexion/conexion.php';

        // Normalizar el nombre del transporte
        $transporte = trim($transporte);
        $transporteMinuscula = strtolower($transporte);

        // Verificar si ya existe un transporte con ese nombre (insensible a mayúsculas)
        $verificar = mysqli_query($conexion, "
        SELECT transporte FROM transporte WHERE LOWER(transporte) = '$transporteMinuscula'
    ");

        $totalFilas = mysqli_num_rows($verificar);

        if ($totalFilas == 0) {
            $sentenciaSQL = mysqli_query($conexion, "
            INSERT INTO transporte 
            (transporte, costo_transporte) 
            VALUES 
            ('$transporte', '$costo_transporte')
        ");

            if ($sentenciaSQL) {
                echo "<script>window.location.href='../modelo/modelo.php?opcion=27&registro=registrar';</script>";
            } else {
                echo "<script>alert('Error al registrar el transporte. Intente nuevamente.'); history.back();</script>";
            }
        } else {
            // Si el nombre ya existe
            echo "<script>window.location.href='../modelo/modelo.php?opcion=27&registro=repetido&modal=abrir';</script>";
        }
    }


    public static function listar($opcion, $valor)
    {
        include "../conexion/conexion.php";
        $arreglo = array();

        if ($opcion == 27) {
            $sentenciaSQL = mysqli_query($conexion, "SELECT * FROM transporte");
        } else if ($opcion == 21) {
            $sentenciaSQL = mysqli_query($conexion, "SELECT * FROM transporte WHERE id = '$valor'");
        }

        $totalFilas = mysqli_num_rows($sentenciaSQL);
        for ($i = 0; $i < $totalFilas; $i++) {
            $datos = mysqli_fetch_array($sentenciaSQL);
            array_push($arreglo, Transporte::mostrar($datos));
        }

        return $arreglo;
    }

    public static function mostrar($datos)
    {
        return new Transporte(
            $datos["id"],
            $datos["transporte"],
            $datos["costo_transporte"]
        );
    }

    public static function modificar($id, $transporte, $costo_transporte)
    {
        include "../conexion/conexion.php";

        $sql = "UPDATE transporte SET 
                    transporte = '$transporte',
                    costo_transporte = '$costo_transporte'
                WHERE id = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=27&registro=actualizado';</script>";
        } else {
            echo "<script>alert('No se pudo actualizar el transporte.'); history.back();</script>";
        }
    }

    public static function eliminar($id)
    {
        include "../conexion/conexion.php";

        $sentenciaSQL = mysqli_query($conexion, "DELETE FROM transporte WHERE id = '$id'");

        if (mysqli_affected_rows($conexion) > 0) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=27&registro=eliminado';</script>";
        } else {
            echo "<script>alert('No se eliminó el registro. ID = $id'); history.back();</script>";
        }
    }
}
?>