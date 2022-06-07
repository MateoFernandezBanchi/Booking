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

if (mysqli_num_rows($query_vac) != 0) {
    $fechas = mysqli_fetch_array($query_vac);
}

$sql_dias   = ("SELECT dia_trabajo FROM dias_trabajo WHERE empleado = '$empleado'");
$query_dias = mysqli_query($conn, $sql_dias);
$i                 = 0;
while ($dias = mysqli_fetch_array($query_dias)){
    $dia[$i] = $dias['dia_trabajo'];
    $i++;
}
$dia1 = $dia[0];
$dia2 = $dia[1];
$dia3 = $dia[2];
$dia4 = $dia[3];
$dia5 = $dia[4];
$dia6 = $dia[5];
$dia7 = $dia[6];
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
    <link rel="stylesheet" href="./css/styles2.min.css">
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
        <nav class="navbar navbar-expand-lg navbar-dark navContainer">
            <div class="container px-5">
                <a class="navbar-brand" href="/booking-main">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="link-nav dropdown-toggle" id="navbarDropdownBlog" href="#" role="button"
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
                

            <div class="row gx-5">

                <!-- <div class="col-lg-6"><img class="img-fluid rounded-3 mb-5" src="assets/<?php echo $contenido['imagen2'];?>" alt="..." /></div> -->
            </div>
            <?php }?>
            <div class="row  mt-5 calendarContainer" >
                <div class="col-lg-12 text-center ">
                    <h1 id="turnos">Turnos</h1>
                    <h4 class="mb-4 mt-4">Selecciona un dia en el calendario para reservar tu turno</h4>
                    <div id="calendar" class="col-centered calendar">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-horizontal" method="POST" action="select_horario.php">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Estas a punto de pedir un Turno:</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group" style="display: none;">
                                    <div class="col-sm-10">
                                        <input type="text" name="empleado" class="form-control" id="title"
                                            placeholder="Titulo" value="<?php echo $empleado?>">
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <div class="col-sm-10">
                                        <input type="text" name="servicio" class="form-control" id="title"
                                            placeholder="Titulo" value="<?php echo $servicio?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="start" class="col-sm-2 control-label">Para el dia:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="start" class="form-control" id="start"
                                            format='YYYY-MM-DD' readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Siguiente</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    <script src='js/fullcalendar/fullcalendar.min.js'></script>
    <script src='js/fullcalendar/fullcalendar.js'></script>
    <script src='js/fullcalendar/locale/es.js'></script>
    <script>
        var a = <?php echo $dia1;?>;
        var b = <?php echo $dia2;?>;
        var c = <?php echo $dia3;?>;
        var d = <?php echo $dia4;?>;
        var e = <?php echo $dia5;?>;
        var f = <?php echo $dia6;?>;
        var g = <?php echo $dia7;?>;
    $(document).ready(function() {
        var date = new Date();
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date
            .getMonth() + 1).toString();
        var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate())
            .toString();
        $('#calendar').fullCalendar({
            header: {
                language: 'es',
                left: 'title',
                center: '',
                right: 'prev,next,today'
            },
            defaultView: 'month',
            defaultDate: yyyy + "-" + mm + "-" + dd,
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: false,
            slotEventOverlap: true,
            minTime: '08:00:00',
            maxTime: '19:00:00',
            Boolean,
            default: true,
            hiddenDays: [a,b,c,d,e,f,g],
            select: (start, end) => {
                var fecha1 = '<?php echo $fechas['start']; ?>';
                var fecha2 = '<?php echo $fechas['end']; ?>';
                var today = moment().format('YYYY-MM-DD');
                var check = moment(start).format('YYYY-MM-DD');
                var primeraFecha = moment(fecha1).format('YYYY-MM-DD');
                var segundaFecha = moment(fecha2).format('YYYY-MM-DD');
                if (check > segundaFecha) {
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');
                } else if (check > primeraFecha) {} else if (today > check) {} else {
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');
                }
            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit #empleado').val(event.empleado);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position
                edit(event);
            },
            eventResize: function(event, dayDelta, minuteDelta,
            revertFunc) { // si changement de longueur
                edit(event);
            },
            events: [
                <?php while($event = mysqli_fetch_array($events)){
            $start = explode(" ", $event['start']);
            $end = explode(" ", $event['end']);
            if($start[1] == '00:00:00'){
                $start = $start[0];
            }else{
                $start = $event['start'];
            }
            if($end[1] == '00:00:00'){
                $end = $end[0];
            }else{
                $end = $event['end'];
            }
            ?>

                <?php } ?>
            ]
        });

        function edit(event) {
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if (event.end) {
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            } else {
                end = start;
            }
            id = event.id;
            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;
            $.ajax({
                url: 'editEventDate.php',
                type: "POST",
                data: {
                    Event: Event
                },
                success: function(rep) {
                    if (rep == 'OK') {
                        alert('Evento se ha guardado correctamente');
                    } else {
                        alert('No se pudo guardar. Inténtalo de nuevo.');
                    }
                }
            });
        }

    });
    </script>
</body>

</html>