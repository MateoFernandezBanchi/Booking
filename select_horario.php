<?php
require_once('conection.php');
   $horario           = $_POST['start'];
   $empleado          = $_POST['empleado'];
   $servicio          = $_POST['servicio'];
   $fecha             = explode(" ", $horario);

   $sql               = "SELECT id, start, start_fecha, start_horas, end_horas FROM events WHERE start_fecha = '$fecha[0]'";
   $events            = mysqli_query($conn, $sql);
   $i                 = 0;
   if(mysqli_num_rows($events)>0){
   while ($data = mysqli_fetch_array($events)) {
   $test_start[$i] = $data['start_horas'];
   $test_end[$i]   = $data['end_horas'];
   $i++;
   }

   $sql_h    = "SELECT id, hora_inicio, hora_final FROM horarios_turnos";
   $events_h = mysqli_query($conn, $sql_h);
   $h        = 0;
   while ($data_h = mysqli_fetch_array($events_h)) {
   $test_h_ini[$h] = $data_h['hora_inicio'];
   $test_h_end[$h] = $data_h['hora_final'];
   $h++;
   }

   if(mysqli_num_rows($events_h)>0)
   {
      while ($data_h = mysqli_fetch_array($events_h)) 
      {
      $test_h_ini[$h] = $data_h['hora_inicio'];
      $test_h_end[$h] = $data_h['hora_final'];
      
      $h++;
      }
   
         $resultado_inicio  = array_diff($test_h_ini, $test_start);   
         $resultado_final   = array_diff($test_h_end, $test_end);
         $cantidad_horarios = count($test_h_ini);
   }
  
   $cantHor = sizeof($test_start); 
   $mensajeCalendario = "";

    if(mysqli_num_rows($events_h) != NULL)
   {
      if($resultado_inicio == NULL)
      {
      header("location:portfolio-item.php?turno_n=no_disponible&servicio=extraccion&empleado=Kelly");
        echo "no hay turnos disponibles primer if";
      }
            
   } 
   else
   {
     if($cantHor == 10)
     {
      // header("portfolio-item.php?turno_n=no_disponible");
      echo "no hay turnos disponibles segundoif";
     }
     
   }
}
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
         max-width: 800px;
         }
         .col-centered{
         float: none;
         margin: 0 auto;
         }
      </style>
   </head>
   <body class="d-flex flex-column h-100" style="padding-top: 0px;">
      <nav class="navbar navbar-expand-lg navbar-dark navContainer">
         <div class="container px-5">
            <a class="navbar-brand" href="index.php">HOME</a>
         </div>
      </nav>
      <!-- Page Content-->
      <main class="flex-shrink-0 mainHorario">
         <section class="py-5">
            <div class="container px-5 my-5">
               <form class="form-horizontal formHorarios calendar" method="POST" action="insert_personal_info.php">
                  <div class="modal-header flex-direction-column headerPersonal">
                     <?php $show_fecha = explode(" ", $horario); ?>
                     <h4>Day <?php echo $show_fecha[0]?></h4>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <h3 class="modal-title" id="myModalLabel">Select the hour:</h3>
                        <label for="color" class="col-sm-2 control-label">Hour</label>
                        <div class="col-sm-10">
                           <select name="horario" class="form-control" id="empleado">
                           <?php
                              $sql_f   = "SELECT id, hora_inicio, hora_final FROM horarios_turnos";
                              $events_f = mysqli_query($conn, $sql_f);
                              if(mysqli_num_rows($events_f) != NULL)
                              {
                                 if(mysqli_num_rows($events)>0)
                                  {
                                     for($j = 0; $j <= $cantidad_horarios; $j++ )
                                      {
                                          echo "<option style='color:#000;'value=".$resultado_inicio[$j]."-".$resultado_final[$j].">".$resultado_inicio[$j]."-".$resultado_final[$j]."</option>";
                                      }
                                  }
                                  else 
                                  {                                    
                                     while ($data_f = mysqli_fetch_array($events_f)) 
                                       {                                 
                                           echo "<option style='color:#000;'value=".$data_f['hora_inicio']."-".$data_f['hora_final'].">".$data_f['hora_inicio']."-".$data_f['hora_final']."</option>";
                                       } 
                                  }    
                              }                                     
                              else
                              {
                                 if(mysqli_num_rows($events)>0)
                                   {
                                      sort($test_start);
                                      $aux = array();
                                      $f = 0;
                                      for($l = 0; $l <= $cantHor; $l++ )
                                       { 
                                          list($n, $z1, $z2) = explode(':', $test_start[$l]);
                                        
                                          while($f <= $n)
                                            {
                                             array_push($aux, $n);
                                             $f++;
                                            } 
                                          
                                       }
                                          for($k = 0; $k < 10; $k++)
                                            { 
                                              $t = $k + 8;
                                              $v = $t + 1;
                                             
                                               if($aux[$t] != $t)
                                                 {   
                                                   echo "<option style='color:#000;'value=".$t.":00:00-".$v.":00:00>".$t.":00:00-".$v.":00:00</option>";
                                                 } 
                                             }
                                   }
                                   else
                                   {
                                    for($k = 0; $k < 10; $k++)
                                    {
                                       $t = $k + 8;
                                       $v = $t + 1;
                                       echo "<option style='color:#000;'value=".$t.":00:00-".$v.":00:00>".$t.":00:00-".$v.":00:00</option>";
                                    }  
                                   }
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group" >
                        <!-- <label for="start" class="col-sm-2 control-label">Para el dia:</label> -->
                        <div class="col-sm-10">
                           <input style="display: none;" type="text" name="start" class="form-control" id="start" value="<?php echo $horario;?>" readonly>
                        </div>
                     </div>
                     <div class="form-group" style="display: none;">
                        <div class="col-sm-10">
                           <input type="text" name="empleado" class="form-control" id="title" placeholder="Titulo" value="<?php echo $empleado?>">
                        </div>
                     </div>
                     <div class="form-group" style="display: none;">
                        <div class="col-sm-10">
                           <input type="text" name="servicio" class="form-control" id="title" placeholder="Titulo" value="<?php echo $servicio?>">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button class="btn btn-primary btnPersonal"> <a href="portfolio-item.php?servicio=<?php echo $servicio?>&empleado=<?php echo $empleado?>">Previous</a> </button>
                     <button type="submit" class="btn btn-primary btnPersonal">Next</button>
                  </div>
               </form>
            </div>
            </div>
         </section>
      </main>
      <!-- Footer-->
      <footer class="py-4 mt-auto">
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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
   </body>
</html>





