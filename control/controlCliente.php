<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Cliente
{
    function __construct($id, $nombre_usuario, $contra, $fecha_nacimiento, $tipo_documento, $numero_documento, $nombre, $apellido, $correo, $celular, $rol, $estado)
    {
        $this->id = $id;
        $this->nombre_usuario = $nombre_usuario;
        $this->contra = $contra;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->tipo_documento = $tipo_documento;
        $this->numero_documento = $numero_documento;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->celular = $celular;
        $this->rol = $rol;
        $this->estado = $estado;
    }

    public static function insertar($nombre_usuario, $contra, $fecha_nacimiento, $tipo_documento, $numero_documento, $nombre, $apellido, $correo, $celular, $rol, $estado)
    {
        include '../conexion/conexion.php';

        $correo = trim(strtolower($correo));
        $numero_documento = trim($numero_documento);

        $correoExistente = mysqli_query($conexion, "SELECT id FROM clientes WHERE LOWER(correo) = '$correo'");
        $documentoExistente = mysqli_query($conexion, "SELECT id FROM clientes WHERE numero_documento = '$numero_documento'");

        $correoDuplicado = mysqli_num_rows($correoExistente) > 0;
        $documentoDuplicado = mysqli_num_rows($documentoExistente) > 0;

        if ($correoDuplicado) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=9&registro=correo';</script>";
            exit();
        } elseif ($documentoDuplicado) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=9&registro=documento';</script>";
            exit();
        }

        $contraHash = sha1(trim($contra)); // Mejor usar password_hash() en producción

        $sentenciaSQL = mysqli_query($conexion, "
        INSERT INTO clientes 
        (nombre_usuario, contra, fecha_nacimiento, tipo_documento, numero_documento, nombre, apellido, correo, celular, rol, estado) 
        VALUES 
        ('$nombre_usuario', '$contraHash', '$fecha_nacimiento', '$tipo_documento', '$numero_documento', '$nombre', '$apellido', '$correo', '$celular', '$rol', '$estado')
    ");

        if ($sentenciaSQL) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=9&registro=registrar';</script>";
        } else {
            echo "<script>alert('Error al registrar el usuario. Intente nuevamente.'); history.back();</script>";
        }
    }


    public static function listar($opcion, $valor)
    {
        include "../conexion/conexion.php";
        $arreglo = array();
        if ($opcion == 9) {
            $sentenciaSQL = mysqli_query($conexion, "select id, nombre_usuario, contra, fecha_nacimiento, tipo_documento, numero_documento, nombre, apellido, correo, celular, estado, rol from clientes");
        } else if ($opcion == 60) {
            $sentenciaSQL = mysqli_query($conexion, "select id, nombre_usuario, contra, fecha_nacimiento, tipo_documento, numero_documento, nombre, apellido, correo, celular, estado, rol from clientes WHERE id = '$valor'");
        }
        $totalfilas = mysqli_num_rows($sentenciaSQL);
        for ($i = 0; $i < $totalfilas; $i++) {
            $datos = mysqli_fetch_array($sentenciaSQL);
            array_push($arreglo, Cliente::mostrar($datos));
        }
        return $arreglo;
    }

    public static function mostrar($datos)
    {
        $id = $datos["id"];
        $nombre_usuario = $datos["nombre_usuario"];
        $contra = $datos["contra"];
        $fecha_nacimiento = $datos["fecha_nacimiento"];
        $tipo_documento = $datos["tipo_documento"];
        $numero_documento = $datos["numero_documento"];
        $nombre = $datos["nombre"];
        $apellido = $datos["apellido"];
        $correo = $datos["correo"];
        $celular = $datos["celular"];
        $rol = $datos["rol"];
        $estado = $datos["estado"];

        $cliente = new Cliente($id, $nombre_usuario, $contra, $fecha_nacimiento, $tipo_documento, $numero_documento, $nombre, $apellido, $correo, $celular, $rol, $estado);
        return $cliente;
    }

    public static function modificar($id, $nombre_usuario, $fecha_nacimiento, $tipo_documento, $numero_documento, $nombre, $apellido, $correo, $celular, $rol, $estado)
    {
        include "../conexion/conexion.php";

        $correo = trim(strtolower($correo));
        $numero_documento = trim($numero_documento);

        // Verificar si el correo ya lo tiene otro cliente (excluyendo este ID)
        $correoExiste = mysqli_query($conexion, "
        SELECT id FROM clientes 
        WHERE LOWER(correo) = '$correo' AND id != '$id'
    ");

        if (mysqli_num_rows($correoExiste) > 0) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=9&registro=correo&id=$id&modalEditar=abrir';</script>";
            exit();
        }

        // Verificar si el número de documento ya lo tiene otro cliente
        $documentoExiste = mysqli_query($conexion, "
        SELECT id FROM clientes 
        WHERE numero_documento = '$numero_documento' AND id != '$id'
    ");

        if (mysqli_num_rows($documentoExiste) > 0) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=9&registro=documento&id=$id&modalEditar=abrir';</script>";
            exit();
        }

        $sql = "UPDATE clientes SET 
            nombre_usuario = '$nombre_usuario',
            fecha_nacimiento = '$fecha_nacimiento',
            tipo_documento = '$tipo_documento',
            numero_documento = '$numero_documento',
            nombre = '$nombre',
            apellido = '$apellido',
            correo = '$correo',
            celular = '$celular',
            estado = '$estado',
            rol = '$rol'
            WHERE id = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=9&registro=actualizado';</script>";
        } else {
            echo "<script>alert('No se pudo actualizar el cliente.'); history.back();</script>";
        }
    }


    public static function enviarTokenRecuperacion($correo)
    {
        include '../conexion/conexion.php';
        require '../vendor/autoload.php'; // asegúrate de tener bien la ruta

        $token = bin2hex(random_bytes(32));
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $verificar = mysqli_query($conexion, "SELECT id FROM clientes WHERE correo = '$correo'");
        if (mysqli_num_rows($verificar) > 0) {
            // Guardar token y expiración
            mysqli_query($conexion, "UPDATE clientes SET token_recuperacion='$token', token_expira='$expira' WHERE correo='$correo'");

            // Enlace de recuperación
            $enlace = "http://localhost/ViajesPlus/vista/restablecer.php?token=$token";

            // Configurar y enviar correo al usuario (NO al admin)
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'yersonhenao45@gmail.com';        // ESTE ES TU CORREO EMISOR
                $mail->Password = 'oqjn pvap djan vogo';           // Contraseña de aplicación
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('tucorreo@gmail.com', 'Viajes Plus');
                $mail->addAddress($correo);                    // Aquí se envía al usuario que lo escribió

                $mail->isHTML(true);
                $mail->Subject = 'Recuperación de contraseña';
                $mail->Body = "
                <p>Hola,</p>
                <p>Haz clic en el siguiente enlace para restablecer tu contraseña:</p>
                <a href='$enlace'>$enlace</a>
                <p>Este enlace expirará en 1 hora.</p>
            ";

                $mail->send();
                echo "<script>window.location.href='../vista/login.php?registro=exito';</script>";
            } catch (Exception $e) {
                echo "<script>alert('Error al enviar el correo: {$mail->ErrorInfo}'); history.back();</script>";
            }
        } else {
            echo "<script>alert('Correo no registrado en la base de datos'); history.back();</script>";
        }
    }

    public static function actualizarContrasena($token, $nueva_contra)
    {
        include '../conexion/conexion.php';
        $hash = sha1($nueva_contra); // o usa password_hash()

        $query = "UPDATE clientes SET contra='$hash', token_recuperacion=NULL, token_expira=NULL 
              WHERE token_recuperacion='$token' AND token_expira > NOW()";

        if (mysqli_query($conexion, $query)) {
            echo "<script>window.location.href='../vista/login.php?registro=actualizar';</script>";
        } else {
            echo "<script>alert('Error'); history.back();</script>";
        }
    }

    public static function eliminar($id)
    {
        include "../conexion/conexion.php";

        if (empty($id)) {
            echo "<script>alert('ID vacío. No se puede eliminar.'); history.back();</script>";
            return;
        }

        $sentenciaSQL = mysqli_query(
            $conexion,
            "UPDATE clientes SET estado = 'I' WHERE id = '$id'"
        );

        $totalFilas = mysqli_affected_rows($conexion);
        if ($totalFilas == 0) {
            echo "<script>alert('No se eliminó el registro. ID = $id');
        history.back();</script>";
        } else {
            echo "<script>window.location.href='../modelo/modelo.php?opcion=9&eliminado=1';</script>";
            exit();
        }
    }
}
?>