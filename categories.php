<?php
$servicio = $_GET['servicio'];
$empleado = $_GET['empleado'];
$_SESSION['empleado'] = $empleado;
$_SESSION['servicio'] = $servicio;

require_once('conection.php');
$sql    = "SELECT id, title, start, end, color FROM events WHERE servicio = '$servicio' AND empleado = '$empleado' AND end >= now() - INTERVAL 1 DAY";
$events = mysqli_query($conn, $sql);

$consulta_cont = "SELECT * FROM contenido_paginas WHERE servicio = '$servicio'";
$cont          = mysqli_query($conn, $consulta_cont);

$sql_vac   = ("SELECT start, end FROM events WHERE vacations = 1 AND empleado = '$empleado'");
$query_vac = mysqli_query($conn, $sql_vac);
?>
<!DOCTYPE html>
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
    <link href='css/fullcalendar.css' rel='stylesheet' />
    <link rel="stylesheet" href="./css/styles2.css">
    <style>
    body {
        padding-top: 70px;
    }

    #calendar {
        max-width: 1000px;
        margin-bottom: 50px;
    }

    .col-centered {
        float: none;
        margin: 0 auto;
    }
    </style>
</head>

<body class="d-flex flex-column h-100" style="padding-top: 0px;">
    <input type="text" style="display: none;" data-from-1="<?php echo $array_dias[0]?>"
        data-from-2="<?php echo $array_dias[1]?>" data-from-3="<?php echo $array_dias[2]?>" id="dias_laborales">
    <input type="text" style="display: none;" data-from="<?php echo $fechas['start']?>"
        data-to="<?php echo $fechas['end']?>" id="fecha_vac">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="/booking-main">Centro Odontologico</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/booking-main">Home</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                     <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                     <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                     <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="blog-home.html">Extraccion</a></li>
                                <li><a class="dropdown-item" href="blog-post.html">Ortodoncia</a></li>
                                <li><a class="dropdown-item" href="blog-post.html">Blanqueamiento</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <?php while($contenido = mysqli_fetch_array($cont)){ ?>
        <section class="py-5">
            <div class="container px-5">
                <div id="descripcionServicio" class="row gx-5 justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-5">
                            <h1 class="fw-bolder"><?php echo $contenido['titulo'];?></h1>
                            <p class="lead fw-normal text-muted mb-0"><?php echo $contenido['descripcion'];?></p>
                            <button class="btn btn-primary btnPersonal mt-5"> <a
                                href="#turnos">Pedir turno</a> 
                        </button>
                        </div>
                        
                    </div>
                    <div class="col-lg-6"><img class="img-fluid rounded-3 mb-5"
                        src="assets/<?php echo $contenido['imagen1'];?>" alt="..." /></div>
                        </div>
                </div>
            <?php }?>
           
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class=" py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2022</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
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
    </body>
    </html>
