<?php
session_start();
include "../includes/config.php";
include "../includes/funciones.php";

if(!isset($_SESSION['usuario'])) {
	header("Location: ../login.php");
}

if($_SESSION['rango'] == '1') {

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
                    <td>Nombre</td>
                    <td>Subject</td>
                    <td>Email</td>
                    <td>Mensaje</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysql_query("SELECT * FROM emails");
                    while($row=mysql_fetch_array($query)) { 
                ?>
                <tr>
                    <td width="4"><?php echo $row['id']; ?></td>
                    <td width="4"><?php echo $row['name']; ?></td>
                    <td width="4"><?php echo $row['subjet']; ?></td>
                    <td width="4"><?php echo $row['email']; ?></td>
                    <td width="10"><?php echo $row['message']; ?></td>
                    <!-- <td width="4" style="color:<?php echo $row['color']; ?>"><?php echo $row['color']; ?></td> -->
                    <td width="90">En prueva: <a href="vistos.php?id=<?php echo $row['id']; ?>">Visto</a> | Funcionaa: <a href="veremails.php?borrar=<?php echo $row['id']; ?>" onclick="return Confirmar (this.form)">Borrar</a></td>
                </tr>
                <?php		
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php } ?>