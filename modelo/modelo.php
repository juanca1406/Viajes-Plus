<?php session_start(); ?>

<?php

include $_SERVER['DOCUMENT_ROOT'] . '/ViajesPlus/control/control.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ViajesPlus/control/controlAlojamiento.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ViajesPlus/control/controlCliente.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ViajesPlus/control/controlActividad.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ViajesPlus/control/controlReserva.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ViajesPlus/control/controlTour.php';
include $_SERVER['DOCUMENT_ROOT'] . '/ViajesPlus/control/controlTransporte.php';

switch ($_REQUEST['opcion']) {
    case 1:
        $nombre_usuario = $_POST['nombre_usuario'];
        $contra = $_POST['contra'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $tipo_documento = $_POST['tipo_documento'];
        $numero_documento = $_POST['numero_documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $celular = $_POST['celular'];

        Registro::insertar($nombre_usuario, $contra, $fecha_nacimiento, $tipo_documento, $numero_documento, $nombre, $apellido, $correo, $celular);
        break;

    case 2:
        $correo = $_POST["correo"];
        $contra = $_POST["contra"];
        Registro::acceso($correo, $contra);
        break;

    case 3:
        $arreglo = Alojamiento::listar(6, 0);

        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
            include "../vista/alojamiento.php";
        } else {
            include "../vista/usuario/reservas/alojamiento.php";
        }
        break;

    case 4:
        $arreglo = Alojamiento::listar(4, $_REQUEST["id"]);
        $arreglo2 = Actividad::listar(13, 0);
        $arreglo3 = Transporte::listar(27, 0);
        $arregl4 = Tour::listar(17, 0);
        $arreglo5 = Cliente::listar(60, $_REQUEST["id"]);
        include "../vista/usuario/reservas/reserva.php";
        break;

    #administrador
    case 6:
        $arreglo = Alojamiento::listar(6, 0);
        include "../vista/alojamiento.php";
        break;

    case 7:
        $nombre = $_POST["nombre"];
        $calificacion = $_POST["calificacion"];
        $costo_noche = $_POST["costo_noche"];
        $servicio = $_POST["servicio"];
        $img = $_FILES["img"]["name"];
        $zona = $_POST["zona"];
        $categoria = $_POST["categoria"];

        Alojamiento::insertar($nombre, $calificacion, $costo_noche, $servicio, $img, $zona, $categoria);
        break;

    case 8:
        $id = $_POST['id'];
        $nombre = $_POST["nombre"];
        $calificacion = $_POST["calificacion"];
        $costo_noche = $_POST["costo_noche"];
        $servicio = $_POST["servicio"];
        $img = $_FILES["img"]["name"];
        $zona = $_POST["zona"];
        $categoria = $_POST["categoria"];
        Alojamiento::modificar($id, $nombre, $calificacion, $costo_noche, $servicio, $img, $zona, $categoria);
        break;

    case 31:
        $id = $_REQUEST["id"];
        Alojamiento::eliminar($id);
        break;

    case 9:
        $arreglo = Cliente::listar(9, 0);
        include "../vista/cliente.php";
        break;

    case 10:
        $nombre_usuario = $_POST['nombre_usuario'];
        $contra = $_POST['contra'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $tipo_documento = $_POST['tipo_documento'];
        $numero_documento = $_POST['numero_documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $celular = $_POST['celular'];
        $rol = $_POST['rol'];
        $estado = $_POST['estado'];

        Cliente::insertar($nombre_usuario, $contra, $fecha_nacimiento, $tipo_documento, $numero_documento, $nombre, $apellido, $correo, $celular, $rol, $estado);
        break;

    case 11:
        $id = $_POST['id'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $tipo_documento = $_POST['tipo_documento'];
        $numero_documento = $_POST['numero_documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $celular = $_POST['celular'];
        $rol = $_POST['rol'];
        $estado = $_POST['estado'];
        Cliente::modificar($id, $nombre_usuario, $fecha_nacimiento, $tipo_documento, $numero_documento, $nombre, $apellido, $correo, $celular, $rol, $estado);
        break;

    case 12: // Eliminar cliente (soft delete)
        $id = $_REQUEST["id"];
        Cliente::eliminar($id);
        break;

    //actividad crud
    case 13:
        $arreglo = Actividad::listar(13, 0);
        include "../vista/actividad.php";
        break;

    case 14:
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $costo = $_POST['costo'];
        $disponibilidad = $_POST['disponibilidad'];
        Actividad::insertar($nombre, $descripcion, $costo, $disponibilidad);
        break;

    case 15:
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $costo = $_POST['costo'];
        $disponibilidad = $_POST['disponibilidad'];
        Actividad::modificar($id, $nombre, $descripcion, $costo, $disponibilidad);
        break;

    case 16:
        $id = $_REQUEST["id"];
        Actividad::eliminar($id);
        break;

    //tour crud
    case 17:
        $arreglo = Tour::listar(17, 0);
        include "../vista/tour.php";
        break;

    case 18:
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $costo = $_POST['costo'];
        $guia_turistico = $_POST['guia_turistico'];
        Tour::insertar($nombre, $descripcion, $costo, $guia_turistico);
        break;

    case 19:
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $costo = $_POST['costo'];
        $guia_turistico = $_POST['guia_turistico'];
        Tour::modificar($id, $nombre, $descripcion, $costo, $guia_turistico);
        break;

    case 22:
        $id = $_REQUEST["id"];
        Tour::eliminar($id);
        break;

    // reservas crud
    case 23:
        $arreglo = Reserva::listar(23, 0);
        $arreglo2 = Cliente::listar(9, 0);
        $arreglo3 = Transporte::listar(27, 0);
        $arreglo4 = Alojamiento::listar(6, 0);
        $arreglo5 = Tour::listar(17, 0);
        $arreglo6 = Actividad::listar(13, 0);
        include "../vista/reserva.php";
        break;

    case 24:
        $id_cliente = $_POST['id_cliente'];
        $id_transporte = $_POST['id_transporte'];
        $id_alojamiento = $_POST['id_alojamiento'];
        $id_tour = isset($_POST['id_tour']) && !empty($_POST['id_tour']) ? $_POST['id_tour'][0] : null;
        $fecha_reserva = $_POST['fecha_reserva'];
        $total = $_POST['total'];
        $fecha_salida = $_POST['fecha_salida'];
        $id_actividad = isset($_POST['id_actividad']) && !empty($_POST['id_actividad']) ? $_POST['id_actividad'][0] : null;
        Reserva::insertar($id_cliente, $id_transporte, $id_alojamiento, $id_tour, $fecha_reserva, $total, $fecha_salida, $id_actividad);
        break;

    case 32:
        $id_cliente = $_POST['id_cliente'];
        $id_transporte = $_POST['id_transporte'];
        $id_alojamiento = $_POST['id_alojamiento'];
        $id_tour = isset($_POST['id_tour']) && !empty($_POST['id_tour']) ? $_POST['id_tour'][0] : null;
        $fecha_reserva = $_POST['fecha_reserva'];
        $total = $_POST['total'];
        $fecha_salida = $_POST['fecha_salida'];
        $id_actividad = isset($_POST['id_actividad']) && !empty($_POST['id_actividad']) ? $_POST['id_actividad'][0] : null;
        Reserva::insertarpp($id_cliente, $id_transporte, $id_alojamiento, $id_tour, $fecha_reserva, $total, $fecha_salida, $id_actividad);
        break;

    case 33:
        $id = $_POST['id'];
        $id_cliente = $_POST['id_cliente'];
        $id_transporte = $_POST['id_transporte'];
        $id_alojamiento = $_POST['id_alojamiento'];
        $id_tour = isset($_POST['id_tour']) && !empty($_POST['id_tour']) ? $_POST['id_tour'][0] : null;
        $fecha_reserva = $_POST['fecha_reserva'];
        $total = $_POST['total'];
        $fecha_salida = $_POST['fecha_salida'];
        $id_actividad = isset($_POST['id_actividad']) && !empty($_POST['id_actividad']) ? $_POST['id_actividad'][0] : null;
        Reserva::modificar($id, $id_cliente, $id_transporte, $id_alojamiento, $id_tour, $fecha_reserva, $total, $fecha_salida, $id_actividad);
        break;

    case 34:
        $id = $_REQUEST["id"];
        Reserva::eliminar($id);
        break;

    case 35:
        $id = $_REQUEST["id"];
        Reserva::eliminarpp($id);
        break;

    // transporte crud
    case 27:
        $arreglo = Transporte::listar(27, 0);
        include "../vista/transporte.php";
        break;

    case 28:
        $transporte = $_POST['transporte'];
        $costo_transporte = $_POST['costo_transporte'];
        Transporte::insertar($transporte, $costo_transporte);
        break;

    case 29:
        $id = $_POST['id'];
        $transporte = $_POST['transporte'];
        $costo_transporte = $_POST['costo_transporte'];
        Transporte::modificar($id, $transporte, $costo_transporte);
        break;

    case 30:
        $id = $_REQUEST["id"];
        Transporte::eliminar($id);
        break;

    case 20:
        $correo = $_POST['correo'];
        Cliente::enviarTokenRecuperacion($correo);
        break;

    case 21: // Para actualizar la contraseña
        $token = $_POST['token'];
        $nueva_contra = $_POST['nueva_contra'];
        Cliente::actualizarContrasena($token, $nueva_contra);
        break;

}

?>