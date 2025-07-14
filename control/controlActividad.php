<?php

class Actividad
{
    function __construct($id, $nombre, $descripcion, $costo, $disponibilidad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->costo = $costo;
        $this->disponibilidad = $disponibilidad;
    }

    public static function insertar($nombre, $descripcion, $costo, $disponibilidad)
    {
        include '../conexion/conexion.php';

        $nombre = trim($nombre);
        $nombreMinuscula = strtolower($nombre);

        $sentenciaSQL = mysqli_query($conexion, "SELECT nombre FROM actividades WHERE LOWER(nombre) = '$nombreMinuscula'");
        $totalFilas = mysqli_num_rows($sentenciaSQL);

        if ($totalFilas == 0) {
            $sentenciaSQL = mysqli_query($conexion, "
                INSERT INTO actividades 
                (nombre, descripcion, costo, disponibilidad) 
                VALUES 
                ('$nombre', '$descripcion', '$costo', '$disponibilidad')
            ");
            if ($sentenciaSQL) {
                echo "<script>window.location.href='../modelo/modelo.php?opcion=13&registro=registrar';</script>";

            } else {
                echo "<script> alert('Error al registrar el producto. Intente nuevamente.'); history.back(); </script>";
            }
        } else {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=13&registro=repetido&modal=abrir';</script>";
        }
    }

    public static function listar($opcion, $valor)
    {
        include "../conexion/conexion.php";
        $arreglo = array();
        if ($opcion == 13) {
            $sentenciaSQL = mysqli_query($conexion, "SELECT id, nombre, descripcion, costo, disponibilidad FROM actividades");
        } else if ($opcion == 4) {
            $sentenciaSQL = mysqli_query($conexion, "SELECT id, nombre, descripcion, costo, disponibilidad FROM actividades WHERE id = '$valor'");
        }
        $totalfilas = mysqli_num_rows($sentenciaSQL);
        for ($i = 0; $i < $totalfilas; $i++) {
            $datos = mysqli_fetch_array($sentenciaSQL);
            array_push($arreglo, Actividad::mostrar($datos));
        }
        return $arreglo;
    }

    public static function mostrar($datos)
    {
        $id = $datos["id"];
        $nombre = $datos["nombre"];
        $descripcion = $datos["descripcion"];
        $costo = $datos["costo"];
        $disponibilidad = $datos["disponibilidad"];

        $producto = new Actividad($id, $nombre, $descripcion, $costo, $disponibilidad);
        return $producto;
    }

    public static function modificar($id, $nombre, $descripcion, $costo, $disponibilidad)
    {
        include "../conexion/conexion.php";

        $nombre = trim($nombre);
        $nombreMinuscula = strtolower($nombre);

        // Verificar si ya existe otra actividad con ese nombre (excluyendo la actual por ID)
        $verificar = mysqli_query(
            $conexion,
            "SELECT id FROM actividades 
         WHERE LOWER(nombre) = '$nombreMinuscula' AND id != '$id'"
        );

        if (mysqli_num_rows($verificar) > 0) {
            // Ya existe otro con ese nombre → Redirigir con error
            echo "<script>window.location.href='../modelo/modelo.php?opcion=13&registro=repetido&modalEditar=abrir&id=$id';</script>";
            exit();
        }

        // Proceder con la actualización
        $sql = "UPDATE actividades SET 
            nombre = '$nombre',
            descripcion = '$descripcion',
            costo = '$costo',
            disponibilidad = '$disponibilidad'
            WHERE id = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            // Redirige aunque no haya cambios reales
            echo "<script>window.location.href='../modelo/modelo.php?opcion=13&registro=actualizado';</script>";
        } else {
            echo "<script>alert('No se pudo actualizar el producto.'); history.back();</script>";
        }
    }

    public static function eliminar($id)
    {
        include "../conexion/conexion.php";

        $sentenciaSQL = mysqli_query(
            $conexion,
            "DELETE FROM actividades WHERE id = '$id'"
        );

        $totalFilas = mysqli_affected_rows($conexion);
        if ($totalFilas == 0) {
            echo "<script>alert('No se eliminó el registro. ID = $id'); history.back();</script>";
        } else {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=13&registro=eliminado';</script>";
            exit();
        }
    }

}
?>