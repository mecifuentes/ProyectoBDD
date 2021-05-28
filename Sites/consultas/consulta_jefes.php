<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna = $_POST["comuna"];
  $comuna_b = strtolower($comuna);
 	$query = "select distinct personal.id,personal.nombre,personal.rut,personal.edad,personal.sexo from tienda,personal,despacha,comuna where tienda.jefe=personal.id and tienda.id=despacha.id_tienda and despacha.id_comuna=comuna.id and comuna.nombre like '%$comuna_b%';";
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
    </tr>
  <?php
	foreach ($jefes as $jefe) {
  		echo "<tr><td>$jefe[0]</td><td>$jefe[1]</td><td>$jefe[2]</td><td>$jefe[3]</td><td>$jefe[4]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
