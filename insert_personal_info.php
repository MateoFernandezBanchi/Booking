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
      <main class="flex-shrink-0">
         <!-- Navigation-->
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
               <a class="navbar-brand" href="index.html">Centro Odontologico</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                     <li class="nav-item"><a class="nav-link" href="/booking-main">Home</a></li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                           <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                           <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                        </ul>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                           <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                           <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
         <!-- Page Content-->
         <section class="py-5">
            <div class="container px-5 my-5 containerPersonal">
                        <form class="form-horizontal formPersonal calendar" method="POST" action="addEvent.php">
                           <div class="modal-header headerPersonal">
                              <h4 class="modal-title" id="myModalLabel">Estas a punto de pedir un Turno:</h4>
                           </div>
                           <div class="modal-body">
                              <div class="form-group">
                                 <label for="title" class="col-sm-2 control-label">Nombre</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="nombre_cliente" class="form-control" id="title" placeholder="Titulo">
                                 </div>
                              </div>
                              <div class="form-group" style="display: none;" >
                                 <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" value="Ocupado">
                                 </div>
                              </div>

                              <div class="form-group" >
                                 <label for="title" class="col-sm-2 control-label">Correo Electronico</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="correo" class="form-control" id="title" placeholder="Correo Electronico">
                                 </div>
                              </div>
                              <div class="form-group" >
                                 <label for="title" class="col-sm-2 control-label">Telefono</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="telefono" class="form-control" id="title" placeholder="Telefono">
                                 </div>
                              </div>
                              <div class="form-group" >
                                 <label for="title" class="col-sm-2 control-label">Comentario</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="comentario" class="form-control" id="title" placeholder="Comentario">
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
                              <div class="form-group">
                                 <label for="start" class="col-sm-2 control-label">Para el dia:</label>
                                 <div class="col-sm-10">
                                 <?php $show_fecha = explode(" ", $fecha_seleccionada); ?>
                                    <input type="text" class="form-control" placeholder="<?php echo $show_fecha[0]?>" readonly>
                                    <input style="display: none;" type="text" name="start" class="form-control" id="start" value="<?php echo $fecha_seleccionada;?>" readonly>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="end" class="col-sm-2 control-label">En el Horario:</label>
                                 <div class="col-sm-10">
                                    <input type="text" name="horario" class="form-control" id="start" value="<?php echo $horario_seleccionado;?>" readonly>
                                 </div>
                                 </div>
                              </div>
                           <div class="modal-footer">
                           <!-- <button class="btn btn-primary btnPersonal"> <a href="select_horario.php">Volver</a> </button> -->
                              <button type="submit" class="btn btn-primary btnPersonal">Guardar</button>
                           </div>
                        </form>
                     </div>
            </div>
         </section>
      </main>
      <!-- Footer-->
      <footer class="bg-dark py-4 mt-auto">
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

