<?php

class Reserva
{
    function __construct($id, $id_cliente, $id_transporte, $id_alojamiento, $id_tour, $fecha_reserva, $total, $fecha_salida, $id_actividad)
    {
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->id_transporte = $id_transporte;
        $this->id_alojamiento = $id_alojamiento;
        $this->id_tour = $id_tour;
        $this->fecha_reserva = $fecha_reserva;
        $this->total = $total;
        $this->fecha_salida = $fecha_salida;
        $this->id_actividad = $id_actividad;
    }

    public static function insertar($id_cliente, $id_transporte, $id_alojamiento, $id_tour, $fecha_reserva, $total, $fecha_salida, $id_actividad)
    {
        include '../conexion/conexion.php';

        // Si son null, deben ir como NULL sin comillas
        $id_tour_sql = is_null($id_tour) ? "NULL" : "'$id_tour'";
        $id_actividad_sql = is_null($id_actividad) ? "NULL" : "'$id_actividad'";

        $sentenciaSQL = mysqli_query($conexion, "
        INSERT INTO reserva 
        (id_cliente, id_transporte, id_alojamiento, id_tour, fecha_reserva, total, fecha_salida, id_actividad) 
        VALUES 
        ('$id_cliente', '$id_transporte', '$id_alojamiento', $id_tour_sql, '$fecha_reserva', '$total', '$fecha_salida', $id_actividad_sql)
    ");
        if ($sentenciaSQL) {
            echo "<script>window.location.href='../vista/principal.php?registro=registrar';</script>";
        } else {
            echo "<script>alert('Error al registrar la reserva. Intente nuevamente.'); history.back();</script>";
        }
    }


    public static function insertarpp($id_cliente, $id_transporte, $id_alojamiento, $id_tour, $fecha_reserva, $total, $fecha_salida, $id_actividad)
    {
        include '../conexion/conexion.php';

        // Si son null, deben ir como NULL sin comillas
        $id_tour_sql = is_null($id_tour) ? "NULL" : "'$id_tour'";
        $id_actividad_sql = is_null($id_actividad) ? "NULL" : "'$id_actividad'";

        $sentenciaSQL = mysqli_query($conexion, "
        INSERT INTO reserva 
        (id_cliente, id_transporte, id_alojamiento, id_tour, fecha_reserva, total, fecha_salida, id_actividad) 
        VALUES 
        ('$id_cliente', '$id_transporte', '$id_alojamiento', $id_tour_sql, '$fecha_reserva', '$total', '$fecha_salida', $id_actividad_sql)
    ");
        if ($sentenciaSQL) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=23&registro=resgistrar';</script>";
        } else {
            echo "<script>alert('Error al registrar la reserva. Intente nuevamente.'); history.back();</script>";
        }
    }


    public static function listar($opcion, $valor)
    {
        include "../conexion/conexion.php";
        $arreglo = array();

        if ($opcion == 23) {
            $sentenciaSQL = mysqli_query($conexion, "SELECT * FROM reserva");
        } else if ($opcion == 21) {
            $sentenciaSQL = mysqli_query($conexion, "SELECT * FROM reserva WHERE id = '$valor'");
        }

        $totalFilas = mysqli_num_rows($sentenciaSQL);
        for ($i = 0; $i < $totalFilas; $i++) {
            $datos = mysqli_fetch_array($sentenciaSQL);
            array_push($arreglo, Reserva::mostrar($datos));
        }

        return $arreglo;
    }

    public static function mostrar($datos)
    {
        return new Reserva(
            $datos["id"],
            $datos["id_cliente"],
            $datos["id_transporte"],
            $datos["id_alojamiento"],
            $datos["id_tour"],
            $datos["fecha_reserva"],
            $datos["total"],
            $datos["fecha_salida"],
            $datos["id_actividad"]
        );
    }

    public static function modificar($id, $id_cliente, $id_transporte, $id_alojamiento, $id_tour, $fecha_reserva, $total, $fecha_salida, $id_actividad)
    {
        include "../conexion/conexion.php";

        // Validar valores NULL correctamente para campos opcionales
        $id_alojamiento_sql = $id_alojamiento !== null && $id_alojamiento !== '' ? "'$id_alojamiento'" : "NULL";
        $id_tour_sql = $id_tour !== null && $id_tour !== '' ? "'$id_tour'" : "NULL";
        $id_actividad_sql = $id_actividad !== null && $id_actividad !== '' ? "'$id_actividad'" : "NULL";

        $sql = "UPDATE reserva SET 
                id_cliente = '$id_cliente',
                id_transporte = '$id_transporte',
                id_alojamiento = $id_alojamiento_sql,
                id_tour = $id_tour_sql,
                fecha_reserva = '$fecha_reserva',
                total = '$total',
                fecha_salida = '$fecha_salida',
                id_actividad = $id_actividad_sql
            WHERE id = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=23&registro=actualizado';</script>";
        } else {
            echo "<script>alert('No se pudo actualizar la reserva. Error: " . mysqli_error($conexion) . "'); history.back();</script>";
        }
    }

    public static function eliminar($id)
    {
        include "../conexion/conexion.php";

        $sentenciaSQL = mysqli_query($conexion, "DELETE FROM reserva WHERE id = '$id'");

        if (mysqli_affected_rows($conexion) > 0) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=23&registro=eliminado';</script>";
        } else {
            echo "<script>alert('No se eliminó el registro. ID = $id'); history.back();</script>";
        }
    }

    public static function eliminarpp($id)
    {
        include "../conexion/conexion.php";

        $sentenciaSQL = mysqli_query($conexion, "DELETE FROM reserva WHERE id = '$id'");

        if (mysqli_affected_rows($conexion) > 0) {
            echo "<script>window.location.href='../vista/principal.php?registro=eliminado';</script>";
        } else {
            echo "<script>alert('No se eliminó el registro. ID = $id'); history.back();</script>";
        }
    }
}
?>