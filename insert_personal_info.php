<?php
require_once('conection.php');
$horario_seleccionado = $_POST['horario'];
$fecha_seleccionada   = $_POST['start'];
$empleado             = $_POST['empleado'];
$servicio             = $_POST['servicio'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Booking System</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href='css/fullcalendar.css' rel='stylesheet' />
    <!-- <link rel="stylesheet" href="./css/styles2.min.css"> -->
    <link rel="stylesheet" href="css/test.php">
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
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navContainer">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
        </nav>
        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 containerPersonal">
                <form class="form-horizontal formPersonal calendar" method="POST" action="addEvent.php" id="formPersonal">
                    <div class="modal-header headerPersonal">
                        <h4 class="modal-title" id="myModalLabel">Complete this fields to confirm:</h4>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                            <label for="start" class="col-sm-2 control-label">For the day:</label>
                            <div class="col-sm-10">
                                <?php $show_fecha = explode(" ", $fecha_seleccionada); ?>
                                <input type="text" class="form-control" placeholder="<?php echo $show_fecha[0]?>"
                                    readonly>
                                <input style="display: none;" type="text" name="start" class="form-control" id="start"
                                    value="<?php echo $fecha_seleccionada;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-2 control-label">Hour:</label>
                            <div class="col-sm-10">
                                <input type="text" name="horario" class="form-control" id="start"
                                    value="<?php echo $horario_seleccionado;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nombre_cliente" class="form-control" id="nombre"
                                    placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" value="Ocupado">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" name="correo" class="form-control" id="correo"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Phone number:</label>
                            <div class="col-sm-10">
                                <input type="tel" name="telefono" class="form-control" id="telefono"
                                    placeholder="Phone number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Comments</label>
                            <div class="col-sm-10">
                                <input type="text" name="comentario" class="form-control" id="comentario"
                                    placeholder="Comments">
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <div class="col-sm-10">
                                <input type="text" name="empleado" class="form-control" id="title" placeholder="Titulo"
                                    value="<?php echo $empleado?>">
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <div class="col-sm-10">
                                <input type="text" name="servicio" class="form-control" id="title" placeholder="Titulo"
                                    value="<?php echo $servicio?>">
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btnPersonal"> <a
                                href="portfolio-item.php?servicio=<?php echo $servicio?>&empleado=<?php echo $empleado?>#turnos">Previous</a>
                        </button>
                        <button type="submit" class="btn btn-primary btnPersonal" id='btnSubmit'>Confirm</button>
                    </div>
                </form>
                <button class="btn btn-primary btnPersonal"><a href="login.php?servicio=<?php echo $servicio?>&empleado=<?php echo $empleado?>&horario=<?php echo $horario_seleccionado?>&start=<?php echo $fecha_seleccionada?>">Login</a></button>
            </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy;Webii 2022</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- FullCalendar -->
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar/fullcalendar.min.js'></script>
    <script src='js/fullcalendar/fullcalendar.js'></script>
    <script src='js/fullcalendar/locale/es.js'></script>
    <!-- Validacion Formulario -->
    <script src="js/validationForm.js"></script>
</body>

</html>
