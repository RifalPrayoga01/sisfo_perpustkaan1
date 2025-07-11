<!DOCTYPE html>
<html class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="./addon/bootstrap/css/bootstrap.min.css">
        <script src="./addon/jquery.js"></script>
        <script src="./addon/bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="h-100">
        <div class="container h-100">
            <div class="row h-100 d-flex justify-content-center align-items-center">
                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="mb-3 py-3 border-bottom">Login</h4>
                            <?php
                            if(isset($_SESSION["ERROR_SISTEM"])){
                                echo '<div class="alert alert-danger" role="alert">'.$_SESSION["ERROR_SISTEM"].'</div>';
                                unset($_SESSION["ERROR_SISTEM"]);
                            }
                            ?>
                            <div class="fst-italic mb-3">Silahkan login untuk masuk ke dalam sistem</div>
                            <form action="index.php?modul=auth&proses=vlogin" method="post">
                                <div class="form-group mb-3">
                                    <label>Username :</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password :</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <hr/>
                                <input type="submit" value="Login" class="btn btn-primary w-100">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>