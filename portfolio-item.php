<?php 
require_once('conection.php');
if (!isset($_GET['turno_n'])) {
    null;
} else {
    $no_disponible=$_GET['turno_n'];
    echo "
    <div class='mensajeturnoContainer'>
    <div class='card'>
        <div class='card-body mensajeTurno'>
            <h5 class='card-title'>No appointments available</h5>
            <p class='card-text'>Please search another day or professional</p>
            <button class='btn btn-primary btnConfirm' id='btnDenied'>Accept</button>
        </div>
    </div>
    </div>";
}
if (isset($_POST['empleado'])){ 
$datos             = $_POST['empleado'];
$general = explode("-",$datos);
$serv             = $general[1];
$emp = $general[0];
$_SESSION['servicio'] = $serv;
$_SESSION['empleado'] = $emp;
}
if(empty($emp)){
    $servicio = $_GET['servicio'];
    $consulta_cont = "SELECT * FROM contenido_paginas WHERE servicio = '$servicio'";
    $cont          = mysqli_query($conn, $consulta_cont);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Booking System</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href='css/fullcalendar.css' rel='stylesheet' />
    <link rel="stylesheet" href="./css/test.php">
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
        <nav class="navbar navbar-expand-lg navbar-dark navContainer">
            <div class="container px-5">
                <a class="navbar-brand" href="/booking-main2">HOME</a>
            </div>
        </nav>
        <?php while($contenido = mysqli_fetch_array($cont)){ ?>
        <section class="">
            <div class="container px-5 servicioHero">
                <div id="descripcionServicio" class="row gx-5 justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-5">
                            <h1 class="fw-bolder"><?php echo $contenido['titulo'];?></h1>
                            <p class="lead fw-normal mb-0"><?php echo $contenido['descripcion'];?></p>
                        </div>
                    </div>
                    <?php }?>
                    <div class="col-lg-6">
                        <div class="modal-dialog modalDoctor" role="document">
                            <div class="modal-content">
                                <form class="form-horizontal" method="POST" action="portfolio-item.php#turnos">
                                    <div class="modal-header header_SelectDoctor">
                                        <h4 class="modal-title" id="myModalLabel">Select Profesional</h4>
                                    </div>
                                    <div class="modal-body">
                                    <div class="col-sm-10">
                                    <?php   
                                        $sql_serv = "SELECT * FROM contenido_paginas WHERE tipo_contenido = 'seccion'";
                                        $query_serv = mysqli_query($conn, $sql_serv);
                                        $z = 0;
                                        while ($row_serv = mysqli_fetch_array($query_serv)) {
                                            $serv[$z] = $row_serv['servicio'];
                                            $z++;
                                        }
                                        $count_serv = count($serv);
                                        for($s = 0; $s < $count_serv; $s++){ 
                                        if ($servicio == $serv[$s]){
                                        $sql_se = "SELECT * FROM servicios WHERE servicio = '$servicio'";
                                        $query_se = mysqli_query($conn, $sql_se);
                                    ?>
                                    <select name="empleado" class="form-control" id="empleado">
                                        <?php while($datos_se = mysqli_fetch_array($query_se)){ ?>
                                            <option value="<?php echo $datos_se['empleado']?>-<?php echo $datos_se['servicio']?>"><?php echo $datos_se['empleado']?></option>
                                        <?php } ?>
                                    </select>
                                    <?php } 
                                    } ?>
                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn button1">Next</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <footer class="py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto">
                    <div class="small m-0 text-white"><p>Copyright &copy;Webii <script>document.write(new Date().getFullYear())</script></p></div>
                    </div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                 </div>
        
                 <script>
        const btnDenied = document.getElementById('btnDenied');
        btnDenied.addEventListener('click', toggle);

        function toggle() {
            btnDenied.parentElement.parentElement.parentElement.classList.add('toggle');
        }
        </script>
<?php }else{
$empleado = $_SESSION['empleado'];
$servicio = $_SESSION['servicio'];
$sql    = "SELECT id, title, start, end, color FROM events WHERE empleado = '$empleado' AND vacations = 1 AND end >= now() - INTERVAL 1 DAY";
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
$i          = 0;
while ($dias = mysqli_fetch_array($query_dias)) {
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
            <title>Booking System</title>
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
                <nav class="navbar navbar-expand-lg navbar-dark navContainer">
                    <div class="container px-5">
                        <a class="navbar-brand" href="/booking-main2">HOME</a>
                    </div>
                </nav>
                <?php while($contenido = mysqli_fetch_array($cont)){ ?>
                <section>
                    <div class="container px-5 servicioHero">
                        <div id="descripcionServicio" class="row gx-5 justify-content-center align-items-center">
                            <div class="col-lg-6">
                                <div class="text-center mb-5">
                                    <h1 class="fw-bolder"><?php echo $contenido['titulo'];?></h1>
                                    <p class="lead fw-normal b-0"><?php echo $contenido['descripcion'];?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="form-horizontal" method="POST" action="portfolio-item.php#turnos">
                                            <div class="modal-header header_SelectDoctor">
                                                <h4 class="modal-title" id="myModalLabel">Seleccione un Doctor:</h4>
                                            </div>
                                                <div class="modal-body">
                                                    <div class="col-sm-10">
                                                    <?php   
                                                        $sql_serv_2 = "SELECT * FROM contenido_paginas WHERE tipo_contenido = 'seccion'";
                                                        $query_serv_2 = mysqli_query($conn, $sql_serv_2);
                                                        $n = 0;
                                                        while ($row_serv_2 = mysqli_fetch_array($query_serv_2)) {
                                                            $serv_2[$n] = $row_serv_2['servicio'];
                                                            $n++;
                                                        }
                                                        $count_serv_2= count($serv_2);
                                                        for($ñ = 0; $ñ < $count_serv_2; $ñ++){ 
                                                        if ($servicio == $serv_2[$ñ]){

                                                        $sql_se = "SELECT * FROM servicios WHERE servicio = '$servicio'";
                                                        $query_se = mysqli_query($conn, $sql_se);
                                                    ?>
                                                    <select name="empleado" class="form-control" id="empleado">
                                                        <?php while($datos_se = mysqli_fetch_array($query_se)){ ?>
                                                            <option value="<?php echo $datos_se['empleado']?>-<?php echo $datos_se['servicio']?>"><?php echo $datos_se['empleado']?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?php } 
                                                    } ?>
                                                    </div>
                                                </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn button1">Next</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                    </div>
                    <?php }?>
                    <div class="row  mt-5 calendarContainer">
                        <div class="col-lg-12 text-center ">
                            <h1 id="turnos">Appoinments</h1>
                            <h4 class="mb-4 mt-4">
                                Select a day on the calendar to book your appoinment with
                                <?php echo $empleado?></h4>
                            <div id="calendar" class="col-centered calendar">
                            </div>
                        </div>
                    </div>
                        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form class="form-horizontal" method="POST" action="select_horario.php">
                                        <div class="modal-header headerPersonal">
                                            <h4 class="modal-title" id="myModalLabel">
                                                You will request an appoinment:</h4>
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
                                                <label for="start" class="col-sm-2 control-label">For the day:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="start" class="form-control" id="start"
                                                        format='YYYY-MM-DD' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn button1">Next</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <footer class=" py-4 mt-auto">
                <div class="container px-5">
                    <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                        <div class="col-auto">
                        <div class="small m-0 text-white"><p>Copyright &copy;Webii <script>document.write(new Date().getFullYear())</script></p></div>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="js/datatables-simple-demo.js"></script>
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src='js/moment.min.js'></script>
            <script src='js/fullcalendar/fullcalendar.min.js'></script>
            <script src='js/fullcalendar/fullcalendar.js'></script>
            <script src='js/fullcalendar/locale/es.js'></script>
            <script src="jquery.ui.touch.js"></script>
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
                var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() :
                    (date
                        .getMonth() + 1).toString();
                var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date
                        .getDate())
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
                    eventLimit: true, 
                    selectable: true,
                    selectHelper: false,
                    slotEventOverlap: true,
                    selectLongPressDelay: .1,
                    minTime: '08:00:00',
                    maxTime: '19:00:00',
                    Boolean,
                    default: true,
                    hiddenDays: [a, b, c, d, e, f, g],
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
            {
                id: '<?php echo $event['id']; ?>',
                title: '<?php echo $event['title']; ?>',
                start: '<?php echo $start; ?>',
                end: '<?php echo $end; ?>',
                color: '<?php echo $event['color']; ?>'
            },
            <?php } ?>    
            ]
            });
            });
            const btnDenied = document.getElementById('btnDenied');
            btnDenied.addEventListener('click', toggle);
            function toggle() {
                btnDenied.classList.add('toggle');
            }
        </script>
    </body>
</html>
<?php } ?>