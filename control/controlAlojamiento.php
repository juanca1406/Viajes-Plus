<?php
class Alojamiento
{

    function __construct($id, $nombre, $calificacion, $costo_noche, $servicio, $img, $zona, $categoria)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->calificacion = $calificacion;
        $this->costo_noche = $costo_noche;
        $this->servicio = $servicio;
        $this->img = $img;
        $this->zona = $zona;
        $this->categoria = $categoria;
    }

    public static function insertar($nombre, $calificacion, $costo_noche, $servicio, $img, $zona, $categoria)
    {
        include "../conexion/conexion.php";

        $verificarSQL = mysqli_query($conexion, "SELECT id FROM alojamiento WHERE nombre = '$nombre'");
        $totalFilas = mysqli_num_rows($verificarSQL);

        if ($totalFilas == 0) {
            $numero = date(format: "s");
            $ruta = "../img/" . $numero . $img;
            copy($_FILES["img"]["tmp_name"], $ruta);

            $insertarSQL = mysqli_query($conexion, "INSERT INTO alojamiento 
            (nombre, calificacion, costo_noche, servicio, img, zona, categoria)
            VALUES ('$nombre','$calificacion','$costo_noche','$servicio','$ruta','$zona','$categoria')");
            echo "<script>window.location.href='../modelo/modelo.php?opcion=6&registro=registrar';</script>";
        } else {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=6&registro=usuario';</script>";
        }
    }


    public static function listar($opcion, $valor)
    {
        include "../conexion/conexion.php";
        $arreglo = array();
        if ($opcion == 6) {
            $sentenciaSQL = mysqli_query($conexion, "select id,nombre,calificacion,costo_noche,servicio,img,zona,categoria from alojamiento");
        } else if ($opcion == 4) {
            $sentenciaSQL = mysqli_query($conexion, "select 
            id,nombre,calificacion,costo_noche,servicio,img,zona,categoria from alojamiento WHERE id = '$valor' ");
        }
        $totalfilas = mysqli_num_rows($sentenciaSQL);
        for ($i = 0; $i < $totalfilas; $i++) {
            $datos = mysqli_fetch_array($sentenciaSQL);
            array_push($arreglo, Alojamiento::mostrar($datos));
        }
        return $arreglo;
    }

    public static function mostrar($datos)
    {
        $id = $datos["id"];
        $nombre = $datos["nombre"];
        $calificacion = $datos["calificacion"];
        $costo_noche = $datos["costo_noche"];
        $servicio = $datos["servicio"];
        $img = $datos["img"];
        $zona = $datos["zona"];
        $categoria = $datos["categoria"];

        $alojamiento = new Alojamiento($id, $nombre, $calificacion, $costo_noche, $servicio, $img, $zona, $categoria);
        return $alojamiento;
    }

    public static function modificar($id, $nombre, $calificacion, $costo_noche, $servicio, $img, $zona, $categoria)
    {
        include "../conexion/conexion.php";

        // Ruta por defecto (vacía o la misma anterior)
        $ruta = "";

        // Verificamos si se subió una imagen nueva
        if (!empty($_FILES["img"]["tmp_name"])) {
            $numero = date("s"); // Solo el segundo actual para que cambie el nombre
            $ruta = "../img/" . $numero . basename($_FILES["img"]["name"]);
            copy($_FILES["img"]["tmp_name"], $ruta);
        } else {
            // Obtener la imagen actual desde la base de datos si no se subió una nueva
            $consulta = mysqli_query($conexion, "SELECT img FROM alojamiento WHERE id = '$id'");
            $fila = mysqli_fetch_assoc($consulta);
            $ruta = $fila['img'];
        }

        $sentenciaSQL = mysqli_query(
            $conexion,
            "UPDATE alojamiento SET 
            nombre = '$nombre',
            calificacion = '$calificacion',
            costo_noche = '$costo_noche',
            servicio = '$servicio',
            img = '$ruta',
            zona = '$zona',
            categoria = '$categoria'
        WHERE id = '$id'"
        );
        $totalfilas = mysqli_affected_rows($conexion);

        if ($totalfilas == 0) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=6&registro=actualizado';</script>";
        } else {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=6&registro=actualizado';</script>";
        }
    }

    public static function eliminar($id)
    {
        include "../conexion/conexion.php";

        $sentenciaSQL = mysqli_query(
            $conexion,
            "DELETE FROM alojamiento WHERE id = '$id'"
        );

        $totalFilas = mysqli_affected_rows($conexion);
        if ($totalFilas == 0) {
            echo "<script>alert('No se eliminó el registro. ID = $id'); history.back();</script>";
        } else {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=6&registro=eliminado';</script>";
            exit();
        }
    }

}
?>