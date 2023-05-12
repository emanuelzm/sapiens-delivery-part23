<?php
session_start();

if(isset($_SESSION['usuario'])) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ingreso a la Plataforma - Sapiens delivery</title>
    <?php include("./includes/config.php"); include("./admin/headSeo.php"); ?>
</head>

<body>
    <?php include("./includes/nav.php"); ?>
    <main class="page">
       <div class="Fondo img-fluid"></div>
        <section class="site clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h1>Plataforma Sapiens Delivery<h1>
                    <h2 class="text-info">Ingresa a tu cuenta</h2>
                </div>
                <br>
                <div class="clean-block">
                    <div class="container">
                        <div class="row" style="margin: 10px;">
                            <div class="col-sm-12 col-lg-8">
                                <form name="form1" method="post" action="">
                                    <div class="form-group">
                                        <label for="usuario">Username</label>
                                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="newAccount">
                                        <small id="newAccount" class="form-text text-muted">Si no tienes una cuenta puedes registrarte <a href="./registro.php">Aquí</a></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="contrasena">Password</label>
                                        <input type="password" class="form-control" id="contrasena" name="contrasena">
                                    </div>
                                    <input type="submit" id="button" class="btn btn-primary btn-lg btn-block" name="guardar" value="Ingresar"/>
                                </form>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <img loading="lazy" class="img-thumbnail" src="../assets/img/scenery/TerritorioColombiano.png" style="margin-top: 20px;"><br>
                                <a class="btn btn-primary btn-lg btn-block" href="./registro.php" role="button" style="margin-top: 20px;">Registrate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
    if($_POST['guardar']) {

        $usuario = $_POST['usuario'];
        $contrasena = md5($_POST['contrasena']);
        
        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '" . $usuario . "' AND contrasena = '" . $contrasena . "'");
        
        $contar = mysqli_num_rows($query);
        
        if ($contar != 0) {
            while($row = mysqli_fetch_array($query)) {
                if($usuario == $row['usuario'] && $contrasena == $row['contrasena']) {
                    $_SESSION['usuario'] = $usuario; $_SESSION['id'] = $row['id']; $_SESSION['rango'] = $row['rango'];	
                    echo "<script type='text/javascript'>location.reload();</script>";
                }
            } 		
        } else { 
            echo "El nombre de usuario y/o contrasena no coinciden"; 
        }
        
    }
?>

    <?php include("./admin/jsFooter.php"); ?>
</body>

</html>