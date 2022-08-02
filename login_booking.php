<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once('conection.php');
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $consulta="SELECT * FROM empleados WHERE correo='$email' AND pass='$pass'";
    $resultado=mysqli_query($conn, $consulta);
    $row = mysqli_fetch_array($resultado);
    $client_id = $row['id'];
    $nombre   = $row['nombre'];
    $apellido  = $row['apellido'];
    $nombre_cliente   = $nombre." ".$apellido;
    $telefono         = $row['phone'];
    $correo           = $row['correo'];
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
    $sql              = "INSERT INTO events(id_type,client_id , title, nombre_cliente, start, end, start_fecha, start_horas, end_horas, correo_cliente, numero_telefono, empleado, servicio, estado , confirm, token_confirm) 
                                    values (1,'$client_id' , 'Ocupado', '$nombre_cliente', '$horario_inicio', '$horario_final', '$new_start[0]', '$horarios[0]', '$horarios[1]', '$correo', '$telefono', '$empleado', '$servicio', 'Pendiente', '0', '$hash')";
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
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('pruebasterrens@gmail.com', 'Booking System');
        $mail->addAddress($correo);     //Add a recipient 
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Comfirmar Turno';
        $mail->Body    = 'http://localhost/booking-main/confirmar_turno.php?email='.$correo.'&hash='.$hash.'';
        $mail->send();
    } catch (Exception $e) {
        echo "error: {$mail->ErrorInfo}";
    }
header('Location: confirm.php');
?>
