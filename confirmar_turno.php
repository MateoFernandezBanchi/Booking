<?php
include 'conection.php';
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verificar datos
    $email = ($_GET['email']); // Asignar el correo electrónico a una variable
    $hash = ($_GET['hash']); // Asignar el hash a una variable

    $consulta="SELECT correo_cliente, token_confirm, confirm FROM events WHERE correo_cliente='".$email."' AND token_confirm='".$hash."' AND confirm='0'";
    $resultado=mysqli_query($conn,$consulta);
    $match = mysqli_num_rows($resultado);
                 
    if($match > 0){
        // Hay una coincidencia, activar la cuenta
        $update = "UPDATE events SET confirm='1' WHERE correo_cliente ='".$email."' AND token_confirm ='".$hash."' AND confirm ='0'";
        $update_ex = mysqli_query($conn, $update);
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Modern Business - Start Bootstrap Template</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
            <!-- Bootstrap icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="css/styles.css" rel="stylesheet" />
            <link href="css/fullcalendar.css" rel="stylesheet" />
            <link rel="stylesheet" href="./css/styles2.css">
            <style>
            body {
                padding-top: 70px;
            }
            #calendar {
                max-width: 800px;
            }
            .col-centered {
                float: none;
                margin: 0 auto;
            }
            </style>
        </head>
        <body class="d-flex flex-column h-100" style="padding-top: 0px;">
            <main class="flex-shrink-0">
                <section class="py-5">
                    <div class="container px-5 my-5 containerConfirmacion">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Confirmacion</h5>
                                <p class="card-text">¡Turno confirmado!</p>
                                <p class="card-text">Por favor revisa tu email.</p>
                                <a href="/booking" class="btn btn-primary btnConfirm">Volver al inicio</a>
                            </div>
                        </div>
                    </div>
                </section>
                </footer>
                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    crossorigin="anonymous"></script>
                <script src="js/scripts.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                <script src="js/jquery.js"></script>
                <script src="js/bootstrap.min.js"></script>
        </body>
        </html>';
    }else{
        // No hay coincidencias
        echo '<div class="statusmsg">La URL es inválida  o ya has activado tu cuenta.</div>';
    }
}else{
    // Intento nó válido (ya sea porque se ingresa sin tener el hash o porque la cuenta ya ha sido registrada)
    echo '<div class="statusmsg">Intento inválido, por favor revisa el mensaje que enviamos correo electrónico</div>';
}
?>