<?php include("./includes/config.php") ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registro en la Plataforma - Sapiens delivery</title>
    <?php include("./admin/headSeo.php"); ?>
</head>

<body>
    <?php include("./includes/nav.php"); ?>
    <main class="page">
       <div class="Fondo img-fluid"></div>
        <section class="site clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h1>Plataforma Sapiens Delivery<h1>
                    <h2 class="text-info">Crear una cuenta</h2>
                </div>
                <br>
                <div class="clean-block">
                    <div class="container">
                        <div class="row" style="margin: 10px;">
                            <div class="col-sm-12 col-lg-8">
                                <form name="form1" method="post" action="">
                                    <div class="form-group">
                                        <label for="usuario">Username</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="newAccount" required>
                                        <small id="newAccount" class="form-text text-muted">Si ya tienes una cuenta puedes ingresar <a href="./login.php">Aquí</a></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="correo">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contrasena">Password</label>
                                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                                    </div>
                                    <input type="submit" id="button" class="btn btn-primary btn-lg btn-block" name="guardar" value="Crear Cuenta"/>
                                </form>
<?php
    if($_POST['guardar']) {
        $usuario = $_POST['usuario'];
        $correo = $_POST['email'];
        $contrasena = md5($_POST['contrasena']);                       
                        
        $c1 = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '" . $usuario . "'");
        $c = mysqli_num_rows($c1);

        if ($c == 1) { 
            echo "El nombre de usuario esta en uso, por favor escoge otro gracias"; 
        } else {
            $r = mysqli_query($conn, "INSERT INTO usuarios (id, usuario, contrasena, avatar, rango, email) values ('', '" . $usuario . "','" . $contrasena . "', 'perfiles/example.png', '2', '" . $correo . "')");
        }

        if ($r) { 
            echo "Felicidades " . $usuario . ", te haz registrado con éxito";
            echo "Ingresa a tu Cuenta " . "<a class='btn btn-primary btn-lg btn-block' href='./login.php' role='button'>" . "Aquí" . "</a>";
        } else {
            echo "<br>" . "Valla eso no ha funcionado, Intentalo nuevamente mas tarde.";
        }
    }
?>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <img loading="lazy" class="img-thumbnail" src="../assets/img/scenery/TerritorioColombiano.png" style="margin-top: 20px;"><br>
                                <a class="btn btn-primary btn-lg btn-block" href="./login.php" role="button" style="margin-top: 20px;">Ingresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include("./admin/jsFooter.php"); ?>
</body>

</html>