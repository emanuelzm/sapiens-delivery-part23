<?php
session_start();
include "../includes/config.php";
include "../includes/funciones.php";

if(!isset($_SESSION['usuario'])) {
	header("Location: ../login.php");
}

if($_SESSION['rango'] == '1' or $_SESSION['rango'] == '3') {

ini_set('error_reporting',0);
?>
<html>
    <head>
        <meta name="robots" content="noindex, nofollow">
        <title></title>
        <script language="JavaScript" type="text/javascript"> 
            <!-- 
            function Confirmar(frm) { 
            
            var borrar = confirm("¿Seguro que desea eliminar este usuario?"); 
            
            return borrar; //true o false 
            
            } 
            //--> 
        </script> 
    </head>
    <body>
        <?php include "barra_navegador.php"; ?>

        <table width="200" border="1">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Departamento</td>
                    <td>Ciudad</td>
                    <td>Nombre</td>
                    <td>Ubicacion</td>
                    <td>Vistas</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysql_query("SELECT * FROM mapeter");
                    while($row=mysql_fetch_array($query)) { 
                ?>
                <tr>
                    <td width="4"><?php echo $row['id']; ?></td>
                    <td width="4"><?php echo $row['depater']; ?></td>
                    <td width="4"><?php echo $row['numberap']; ?></td>
                    <td width="4"><?php echo $row['descript']; ?></td>
                    <td width="4"><?php echo $row['rediter']; ?></td>
                    <td width="4"><?php echo $row['clerm']; ?></td>
                    <!-- <td width="4" style="color:<?php echo $row['color']; ?>"><?php echo $row['color']; ?></td> -->
                    <td width="90">En prueva: <a href="vistos.php?id=<?php echo $row['id']; ?>">Visto</a> | Funcionaa: <a href="verUbicaciones.php?borrar=<?php echo $row['id']; ?>" onclick="return Confirmar (this.form)">Borrar</a></td>
                </tr>
                <?php		
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php } ?>