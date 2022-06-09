<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once('conection.php');
if (isset($_POST['title']) && isset($_POST['start'])) {
    $nombre_cliente   = $_POST['nombre_cliente'];
    $title            = $_POST['title'];
    $telefono         = $_POST['telefono'];
    $correo           = $_POST['correo'];
    $cometario        = $_POST['comentario'];
    $empleado         = $_POST['empleado'];
    $servicio         = $_POST['servicio'];
    $start            = $_POST['start'];
    $variable_horario = $_POST['horario'];
    $hash = md5( rand(0,1000) );
    is_string($start);
    $horarios         = explode("-", $variable_horario);
    $new_start        = explode(" ", $start);
    is_string($horarios);
    $horario_inicio   = $new_start[0] . " " . $horarios[0];
    $horario_final    = $new_start[0] . " " . $horarios[1];
    $sql              = "INSERT INTO events(title, nombre_cliente, start, end, start_fecha, start_horas, end_horas, correo_cliente, numero_telefono, comentario, empleado, servicio , confirm, token_confirm) 
                                    values ('$title', '$nombre_cliente', '$horario_inicio', '$horario_final', '$new_start[0]', '$horarios[0]', '$horarios[1]', '$correo', '$telefono', '$cometario', '$empleado', '$servicio', '0', '$hash')";
    mysqli_query($conn, $sql);
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'confirmarturno@gmail.com';                     //SMTP username
        $mail->Password   = 'ouzdggknolwjphzi';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 443;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('pruebasterrens@gmail.com', 'Booking System');
        $mail->addAddress($correo);     //Add a recipient 
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Comfirmar Turno';
        $mail->Body    = 'http://localhost/booking-main2/confirmar_turno.php?email='.$correo.'&hash='.$hash.'';
        $mail->send();
    } catch (Exception $e) {
        echo "error: {$mail->ErrorInfo}";
    }
}
exit;
header('Location: confirm.php');
?>