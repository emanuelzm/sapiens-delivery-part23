<?php
session_start();

include "includes/config.php";
include "includes/funciones.php";

if(!isset($_SESSION['usuario'])) {
	header("Location: login.php");
}

ini_set('error_reporting',0);

if($_SESSION['id'] != $_GET['id']) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Profile - Plataforma | Sapiens delivery</title>
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
                    <h2 class="text-info">Edit Profile</h2>
                </div>
                <br>
                <div class="clean-block">
                    <div class="container">
                        <div class="row" style="margin: 10px;">
                            <div class="col-sm-12 col-lg-8">
<?php 
if(isset($_GET['id'])) {
	
	$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = '".$_GET['id']."'");
	
	while($row=mysqli_fetch_array($query)) { 
?>


<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>
    <label for="textfield2">Usuario</label>
    <input type="text" name="usuario" id="textfield2" value="<?php echo $row['usuario']; ?>" />
  </p>
  <p>
    Contraseña: 
    <input type="text" name="contrasena" id="textfield" />
  </p>
  <p>Avatar</p>
  <p><img src="<?php echo $row['avatar']; ?>" height="100" width="100" />
    
  </p>
  <p>
    <label for="fileField"></label>
    <input type="file" name="avatar" id="fileField" />
  </p>
  <p>
    <input type="submit" name="editar" id="button" value="Editar Perfil" />
  </p>
</form>

<?php if(isset($_POST['editar'])) {
	
	$usuario = $_POST['usuario'];
	if($_POST['contrasena'] != '') { $contrasena = md5($_POST['contrasena']); } else { $contrasena = $row['contrasena']; }

	$tips = 'jpg';
	$type = array('image/jpeg' => 'jpg');
	$id = $row['id'];
				  
	$nombrefoto1=$_FILES['avatar']['name'];
	$ruta1=$_FILES['avatar']['tmp_name'];
	$name = $id.'.'.$tips;
	if(is_uploaded_file($ruta1))
	{ 
	$destino1 =  "perfiles/".$name;
	copy($ruta1,$destino1);
	}
	else
	{
		$destino1 = $row['avatar'];
	}

	$sql = mysqli_query($conn, "UPDATE usuarios SET usuario = '".$usuario."', contrasena = '".$contrasena."', avatar = '".$destino1."' WHERE id = '".$_GET['id']."'");
	
	if($sql) { echo "Se han actualizado los datos"; }
	
}
?>


<?php
	}
}
?>
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