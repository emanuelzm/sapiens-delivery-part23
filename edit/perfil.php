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
    <title>Profile - Plataforma | Sapiens delivery</title>
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
                    <h2 class="text-info">Profile</h2>
                </div>
                <br>
<?php
	$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = '".$_SESSION['id']."'");
	$row = mysqli_fetch_array($query);
	$rango = mysqli_query($conn, "SELECT * FROM rango WHERE id = '".$row['rango']."'");
	$ran = mysqli_fetch_array($rango);
?>
                <div class="clean-block">
                    <div class="container">
                        <div class="row" style="margin: 10px;">
                            <div class="col-sm-12 col-lg-8">
<?php 
if(isset($_GET['id'])) {
	
	$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = '".$_GET['id']."'");
	
	while($row=mysqli_fetch_array($query)) { 
?>

<?php if($row['avatar'] != '') { ?>
<?php echo "<img src='https://www.sapiensdelivery.rf.gd/assets/img/avatars/" . $row['avatar'] . "' height='50px' width='50px' style='border-radius: 50px;' />"; ?>
<?php } ?>
<?php if($_SESSION['id'] == $_GET['id']) {?>
<a href="editarperfil.php?id=<?php echo $_SESSION['id']; ?>">Editar mi perfil</a>
<?php } } } ?>
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