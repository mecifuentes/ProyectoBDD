<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  $comuna = $_POST["comuna"];
  $comuna_b = strtolower($comuna);
  if (strlen($comuna_b)==0) {
    echo '<p style="text-align:center;">No ingresaste una comuna, te mostramos todas los jefes de todas las tiendas en todas las comunas</p>';
  }
 	$query = "select distinct personal.id,personal.nombre,personal.rut,personal.edad,personal.sexo,tienda.nombre from tienda,personal,despacha,comuna where tienda.jefe=personal.id and tienda.id=despacha.id_tienda and despacha.id_comuna=comuna.id and comuna.nombre like '%$comuna_b%';";
	$result = $db -> prepare($query);
	$result -> execute();
	$jefes = $result -> fetchAll();
  ?>
	<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Rut</th>
      <th>Edad</th>
      <th>Sexo</th>
      <th>Tienda</th>
    </tr>
  <?php
	foreach ($jefes as $jefe) {
  		echo "<tr><td>$jefe[0]</td><td>$jefe[1]</td><td>$jefe[2]</td><td>$jefe[3]</td><td>$jefe[4]</td><td>$jefe[5]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
