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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow">
<title>Documento sin título</title>
</head>

<body>
<?php include "barra_navegador.php"; ?>

<form id="form1" name="form1" method="post" action="">
<p>

<label class="my-1 mr-2" for="select-location-departamentos">Departamentos:</label>
    <select name="ubircatDepar" class="custom-select my-1 mr-sm-2" id="select-location-departamentos" required>
            <optgroup label="       ">
        <option value="-4.19983693453, -69.9414267076">Amazonas</option> <!-- Leticia -->
        <option value="6.246715564, -75.581713332">Antioquía</option> <!-- medellin -->
        <option value="7.02698141466, -71.426751178">Arauca</option> <!-- Arauquita -->
        <option value="10.9759268186, -74.7952590482">Atlántico</option> <!-- Barranquilla -->
        <option value="10.3849855226, -75.496431028	">Bolívar</option> <!-- CARTAGENA DE INDIAS -->
            <optgroup label="       ">
        <option value="10.4604812152, 73.259389309">Boyacá</option> <!-- VALLEDUPAR -->
        <option value="5.05768819705, -75.4910489848">Caldas</option> <!-- MANIZALES -->
        <option value="1.6179229304, -75.6085604324">Caquetá</option> <!-- FLORENCIA -->
        <option value="5.3276126513, -72.396915159">Casanare</option> <!-- YOPAL -->
        <option value="7.97736233321, -75.1982903265">Cauca</option> <!-- CAUCASIA -->
            <optgroup label="       ">
        <option value="10.4604812152, -73.259389309">Cesar</option> <!-- VALLEDUPAR -->
        <option value="5.69219518726, -76.6259693555">Chocó</option> <!-- SAN FRANCISCO DE QUIBDO -->
        <option value="8.7451325909, -75.8755779091">Córdoba</option> <!-- MONTERÍA -->
        <option value="4.37531201654, -74.6692177783">Cundinamarca</option> <!-- AGUA DE DIOS -->
        <option value="3.86616161896, -67.9188368372">Guainía</option> <!-- INÍRIDA -->
            <optgroup label="       ">
        <option value="2.56642839915, -72.6389862155">Guaviare</option> <!-- SAN JOSÉ DEL GUAVIARE	 -->
        <option value="2.93560441491, -75.2777225856">Huila</option> <!-- NEIVA -->
        <option value="11.5287513839, -72.911488911">La Guajira</option> <!-- RIOHACHA, DISTRITO ESPECIAL, TURÍSTICO Y CULTURAL -->
        <option value="11.2294335041, -74.1908941206">Magdalena</option> <!-- SANTA MARTA, DISTRITO TURÍSTICO, CULTURAL E HISTÓRICO	 -->
        <option value="4.12386149961, -73.6270920374">Meta</option> <!-- VILLAVICENCIO -->
            <optgroup label="       ">
        <option value="1.21212436525, -77.2785763476">Nariño</option> <!-- SAN JUAN DE PASTO -->
        <option value="7.90530629465, -72.5082561962">Norte de Santander</option> <!-- SAN JOSÉ DE CÚCUTA -->
        <option value="1.15229611807, -76.650271415">Putumayo</option> <!-- MOCOA -->
        <option value="4.53598950231, -75.6807507586">Quindío</option> <!-- ARMENIA -->
        <option value="4.80568026503, -75.7171230555">Risaralda</option> <!-- PEREIRA -->
            <optgroup label="       ">
        <option value="12.5830136907, -81.6960629797">San Andrés y Providencia</option> <!-- ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA	 -->
        <option value="7.11626727561, -73.1325981781">Santander</option> <!-- BUCARAMANGA -->
        <option value="9.30233310439, -75.3954835627">Sucre</option> <!-- SINCELEJO -->
        <option value="4.43960899136, -75.1937147765">Tolima</option> <!-- IBAGUÉ -->
        <option value="3.41441430458, -76.5215651508">Valle del Cauca</option> <!-- SANTIAGO DE CALI, DISTRITO ESPECIAL, DEPORTIVO, CULTURAL, TURÍSTICO, EMPRESARIAL Y DE SERVICIOS -->
            <optgroup label="       ">
        <option value="1.25119056329, -70.2347505205">Vaupés</option> <!-- MITÚ -->
        <option value="6.18686418683, -67.4869969956">Vichada</option> <!-- PUERTO CARREÑO  -->
    </select>

</p>

  <p>
<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Ciudad:</label>
    <select name="ubircatCiuda" class="custom-select my-1 mr-sm-2" id="select-location-ciudades" required>
            <optgroup label="       ">
        <option value="4.65017303026, -74.1073590032">Bogotá</option> <!-- Cundinamarca -->
        <option value="6.246715564, -75.581713332">Medellín</option> <!-- Antioquia -->
        <option value="3.41441430458, -76.5215651508">Cali</option> <!-- Valle del Cauca -->
        <option value="10.9759268186, -74.7952590482">Barranquilla</option> <!-- Atlántico -->
        <option value="10.3849855226, -75.496431028">Cartagena de Indias</option> <!-- Bolívar -->
            <optgroup label="       ">
        <option value="4.58549165821, -74.2145275305">Soacha</option> <!-- Cundinamarca -->
        <option value="7.90530629465, -72.5082561962">Cúcuta</option> <!-- Norte de Santander -->
        <option value="10.9101744673, -74.784833384">Soledad</option> <!-- Atlántico -->
        <option value="7.11626727561, -73.1325981781">Bucaramanga</option> <!-- Santander -->
        <option value="6.33406883641, -75.554665073">Bello</option> <!-- Antioquia -->
            <optgroup label="       ">
        <option value="4.12386149961, -73.6270920374">Villavicencio</option> <!-- Meta -->
        <option value="4.43960899136, -75.1937147765">Ibagué</option> <!-- Tolima -->
        <option value="11.2294335041, -74.1908941206">Santa Marta</option> <!-- Magdalena -->
        <option value="10.4604812152, -73.259389309">Valledupar</option> <!-- Cesar -->
        <option value="5.05768819705, -75.4910489848">Manizales</option> <!-- Caldas -->
            <optgroup label="       ">
        <option value="4.80568026503, -75.7171230555">Pereira</option> <!-- Risaralda -->
        <option value="8.7451325909, -75.8755779091">Montería</option> <!-- Córdoba -->
        <option value="2.93560441491, -75.2777225856">Neiva</option> <!-- 	Huila -->
        <option value="1.21212436525, -77.2785763476">Pasto</option> <!-- 	Nariño -->
        <option value="6.15581872915, -75.7868378278">Armenia</option> <!-- Quindío -->
    </select>
  </p>
  <p>Nombre de la Investigacion:
    <input type="text" name="descripter" required>
  </p>
  <p>Ubicacion de la Investigacion:
    <input type="text" name="direUrl" required>
  </p>
  <p>
    <input type="submit" name="guardar" id="button" value="Agregar al Mapa" />
  </p>
</form>

<?php
	if(isset($_POST['guardar'])) {
		
			$query = mysql_query("INSERT INTO mapeter (depater,numberap,descript,rediter) values ('".$_POST['ubircatDepar']."','".$_POST['ubircatCiuda']."','".$_POST['descripter']."','".$_POST['direUrl']."')");
			
			if($query) { 
                echo "La ubicacion se agregara pronto al mapa!"; 
                echo '<meta http-equiv="refresh" content="1;url=agregaToMap.php" />';
            }
		
	}
?>
</body>
</html>

<?php } ?>