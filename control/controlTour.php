<?php

class Tour
{
    function __construct($id, $nombre, $descripcion, $costo, $guia_turistico)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->costo = $costo;
        $this->guia_turistico = $guia_turistico;
    }

    public static function insertar($nombre, $descripcion, $costo, $guia_turistico)
    {
        include '../conexion/conexion.php';

        $nombre = trim($nombre);
        $nombreMinuscula = strtolower($nombre);

        $sentenciaSQL = mysqli_query($conexion, "SELECT nombre FROM tour WHERE LOWER(nombre) = '$nombreMinuscula'");
        $totalFilas = mysqli_num_rows($sentenciaSQL);

        if ($totalFilas == 0) {
            $sentenciaSQL = mysqli_query($conexion, "
                INSERT INTO tour 
                (nombre, descripcion, costo, guia_turistico) 
                VALUES 
                ('$nombre', '$descripcion', '$costo', '$guia_turistico')
            ");
            if ($sentenciaSQL) {
                echo "<script>window.location.href='../modelo/modelo.php?opcion=17&registro=registrar';</script>";
            } else {
                echo "<script>alert('Error al registrar el tour. Intente nuevamente.'); history.back();</script>";
            }
        } else {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=17&registro=repetido&modal=abrir';</script>";
        }
    }

    public static function listar($opcion, $valor)
    {
        include "../conexion/conexion.php";
        $arreglo = array();
        if ($opcion == 17) {
            $sentenciaSQL = mysqli_query($conexion, "SELECT id, nombre, descripcion, costo, guia_turistico FROM tour");
        } else if ($opcion == 19) {
            $sentenciaSQL = mysqli_query($conexion, "SELECT id, nombre, descripcion, costo, guia_turistico FROM tour WHERE id = '$valor'");
        }
        $totalfilas = mysqli_num_rows($sentenciaSQL);
        for ($i = 0; $i < $totalfilas; $i++) {
            $datos = mysqli_fetch_array($sentenciaSQL);
            array_push($arreglo, Tour::mostrar($datos));
        }
        return $arreglo;
    }

    public static function mostrar($datos)
    {
        $id = $datos["id"];
        $nombre = $datos["nombre"];
        $descripcion = $datos["descripcion"];
        $costo = $datos["costo"];
        $guia_turistico = $datos["guia_turistico"];

        return new Tour($id, $nombre, $descripcion, $costo, $guia_turistico);
    }

    public static function modificar($id, $nombre, $descripcion, $costo, $guia_turistico)
    {
        include "../conexion/conexion.php";

        $nombre = trim($nombre);
        $nombreMinuscula = strtolower($nombre);

        $verificar = mysqli_query(
            $conexion,
            "SELECT id FROM tour 
             WHERE LOWER(nombre) = '$nombreMinuscula' AND id != '$id'"
        );

        $sql = "UPDATE tour SET 
                nombre = '$nombre',
                descripcion = '$descripcion',
                costo = '$costo',
                guia_turistico = '$guia_turistico'
                WHERE id = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=17&registro=actualizado';</script>";
        } else {
            echo "<script>alert('No se pudo actualizar el tour.'); history.back();</script>";
        }
    }

    public static function eliminar($id)
    {
        include "../conexion/conexion.php";

        $sentenciaSQL = mysqli_query(
            $conexion,
            "DELETE FROM tour WHERE id = '$id'"
        );

        $totalFilas = mysqli_affected_rows($conexion);
        if ($totalFilas == 0) {
            echo "<script>alert('No se eliminó el registro. ID = $id'); history.back();</script>";
        } else {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=17&registro=eliminado';</script>";
            exit();
        }
    }
}
?>