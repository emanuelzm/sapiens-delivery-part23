<?php
session_start();
include "includes/config.php";
include "includes/funciones.php";

if(!isset($_SESSION['usuario'])) {
	header("Location: login.php");
}

ini_set('error_reporting',0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard de la Plataforma - Sapiens delivery</title>
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
                    <h2 class="text-info">Dashboard</h2>
                </div>
                <br>
<?php
	$query = mysql_query("SELECT * FROM usuarios WHERE id = '".$_SESSION['id']."'");
	$row = mysql_fetch_array($query);
	$rango = mysql_query("SELECT * FROM rango WHERE id = '".$row['rango']."'");
	$ran = mysql_fetch_array($rango);
?>
                <?php include "barra_navegador.php"; ?>
                <p><strong>Bienvenido</strong> <i style="color:<?php echo $ran['color']; ?>"><?php echo $_SESSION['usuario']; ?></i> (<?php echo $_SESSION['rango']; ?>)</p>
                <div class="clean-block">
                    <div class="container">
                        <div class="row" style="margin: 10px;">
                            <div class="col-sm-12 col-lg-8">
<?php
	$noticia = mysql_query("SELECT * FROM noticias ORDER BY id DESC");
	while($not=mysql_fetch_array($noticia)){

	$usuarios = mysql_query("SELECT * FROM usuarios WHERE id = '".$not['reportero']."'");		
	$user = mysql_fetch_array($usuarios);
	
	$cont = mysql_query("SELECT * FROM comentarios WHERE not_id = '".$not['id']."'");
	$contar = mysql_num_rows($cont);
?>
                                <a href="noticia.php?id=<?php echo $not['id']; ?>"><?php echo $not['titulo']; ?></a>
                                <br />
                                <?php echo $not['noticia']; ?>
                                <br />
                                <?php echo $user['usuario']; ?>
                                <br />
                                <?php echo $not['fecha']; ?>
                                <br />
                                Comentarios (<?php echo $contar; ?>)
                                <br />
                                <br />
<?php } ?>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <img loading="lazy" class="img-thumbnail" src="../assets/img/scenery/PaisajeColombiano.png" style="margin-top: 20px;">
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