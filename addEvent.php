<?php
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
    is_string($start);
    $horarios         = explode("-", $variable_horario);
    $new_start        = explode(" ", $start);
    is_string($horarios);
    $horario_inicio   = $new_start[0] . " " . $horarios[0];
    $horario_final    = $new_start[0] . " " . $horarios[1];
    $sql              = "INSERT INTO events(title, nombre_cliente, start, end, start_fecha, start_horas, end_horas, color, correo_cliente, numero_telefono, comentario, empleado, servicio, estado) values ('$title', '$nombre_cliente', '$horario_inicio', '$horario_final', '$new_start[0]', '$horarios[0]', '$horarios[1]', '$color', '$correo', '$telefono', '$cometario', '$empleado', '$servicio', 'pendiente')";
    mysqli_query($conn, $sql);
}

header('Location: confirm.php');
?> 