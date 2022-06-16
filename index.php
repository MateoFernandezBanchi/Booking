<?php

require_once('conection.php');
$consulta_cont = "SELECT * FROM contenido_paginas WHERE tipo_contenido = 'categoria'";
$cont          = mysqli_query($conn, $consulta_cont);


$consulta_img_cat = "SELECT imagen1 FROM contenido_paginas WHERE tipo_contenido = 'categoria'";
$cont_img_cat          = mysqli_query($conn, $consulta_img_cat);
$images_cat = mysqli_fetch_array($cont_img_cat);

$consulta_img_serv = "SELECT imagen1 FROM contenido_paginas WHERE tipo_contenido = 'seccion'";
$cont_img_serv          = mysqli_query($conn, $consulta_img_serv);
$images_serv = mysqli_fetch_array($cont_img_serv);
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
    <!-- <link rel="stylesheet" href="./css/styles2.min.css"> -->
    <link rel="stylesheet" href="./css/test.php">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navContainer">
            <div class="container px-5">
                <a class="navbar-brand test" href="index.php">HOME</a>
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5 headerIndex">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-6 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2 test">Main Title</h1>
                            <p class="lead fw-normal text-white-50 mb-4">Subtitle</p>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio dolore harum deserunt veniam odit nemo autem qui earum inventore non maxime soluta assumenda, nobis exercitationem perferendis aliquam, sit possimus error?

                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="button1 btn-lg px-4 me-sm-3" href="#servicios">Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 d-none d-xl-block text-center imgIndex"><img
                            class="img-fluid rounded-3 my-5" src="http://localhost/admin/images/<?php echo $images_cat['imagen1']?>" alt="..." /></div>
                  </div>
            </div>
        </header>
        <!-- Features section-->
        <!-- Testimonial section-->
        <!-- <div class="py-5 bg-light">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"Cada diente en la cabeza de un hombre es más valioso que
                                un diamante."</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                    alt="..." />
                                <div class="fw-bold">
                                    Miguel de Cervantes
                                    <span class="fw-bold text-primary mx-1">/</span>
                                    Dentista
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Blog preview section-->
        <section class="py-5" id="servicios">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">Categories</h2>
                            <p class="lead fw-normal text-muted mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                <?php while ($row = mysqli_fetch_array($cont)){ ?>
                    <div class="col-lg-4 mb-5 cardServicio">
                    <a href="categories.php?servicio=seccion&tipo=<?php echo $row['tipo_servicio']?>">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="http://localhost/admin/images/<?php echo $images_serv['imagen1']?>" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2"></div>
                                    <h5 class="card-title mb-3"><?php echo $row['titulo']?></h5>
                                    <p class="card-text mb-0"><?php echo $row['descripcion']?></p>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0">
                                    <div class="d-flex justify-content-center mb-5">
                                        <button class="btn btnPersonal">See more</button>
                                    </div>
                                </div> 
                            </div>
                            </a>
                    </div>
            <?php } ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>