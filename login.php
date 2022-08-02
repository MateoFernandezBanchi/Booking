<?php
$servicio = $_GET['servicio'];
$empleado = $_GET['empleado'];
$horario = $_GET['horario'];
$start = $_GET['start'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="../admin-main/css/styles.css" rel="stylesheet" />
        <link href="../admin-main/css/styles2.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <h1 class='mt-5 text-center'>Dashboard</h1>
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class=" formLoginContainer card shadow-lg rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="login_booking.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email"/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pass"/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                                <input style="display: none;" type="text" name="servicio" value="<?php echo $servicio?>"/>
                                                <input style="display: none;" type="text" name="empleado" value="<?php echo $empleado?>"/>
                                                <input style="display: none;" type="text" name="horario" value="<?php echo $horario?>"/>
                                                <input style="display: none;" type="text" name="start" value="<?php echo $start?>"/>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-footer mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
