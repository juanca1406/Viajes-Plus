<?php
class Registro
{

    public static function insertar($nombre_usuario, $contra, $fecha_nacimiento, $tipo_documento, $numero_documento, $nombre, $apellido, $correo, $celular)
    {
        include '../conexion/conexion.php';

        $sentenciaSQL = mysqli_query($conexion, "SELECT correo FROM clientes WHERE correo = '$correo'");
        $totalFilas = mysqli_num_rows($sentenciaSQL);

        if ($totalFilas == 0) {
            $sentenciaSQL = mysqli_query($conexion, "
            INSERT INTO clientes 
            (nombre_usuario, contra, fecha_nacimiento, tipo_documento, numero_documento, nombre, apellido, correo, celular, estado, rol) 
            VALUES 
            ('$nombre_usuario', SHA1('$contra'), '$fecha_nacimiento', '$tipo_documento', '$numero_documento', '$nombre', '$apellido', '$correo', '$celular', 'A', 'usuario')
        ");
            if ($sentenciaSQL) {
                header("Location: ../vista/login.php?registro=usuario");
                exit();
            }
        }
    }

    public static function acceso($correo, $contra)
    {
        include '../conexion/conexion.php';
        $sentenciaSQL = mysqli_query($conexion, "select id, correo, contra, rol, nombre, apellido from clientes 
        where correo = '$correo' and contra = sha1('$contra') and estado = 'A'");


        if (mysqli_num_rows($sentenciaSQL) == 0) {
            echo "<h3>DEBUG: No se encontró el usuario</h3>";
            echo "<script> window.location.href='../vista/login.php?registro=error'; </script>";
            exit;

        } else {
            $user = mysqli_fetch_assoc($sentenciaSQL);

            $_SESSION["apellido"] = $user["apellido"];
            $_SESSION["nombre"] = $user["nombre"];
            $_SESSION["user"] = $correo;
            $_SESSION["rol"] = $user["rol"];
            $_SESSION["id"] = $user["id"];

            // Redirige según el rol
            if ($user["rol"] === 'admin') {
                echo "<script> window.location.href='../vista/dashboard.php'; </script>";
            } else {
                echo "<script> window.location.href='../vista/principal.php'; </script>";
            }
        }
        mysqli_close($conexion);
    }
}
?>