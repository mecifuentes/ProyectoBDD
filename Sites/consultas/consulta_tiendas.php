<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
 	$query = "select tienda.nombre,comuna.nombre from tienda,despacha,comuna where tienda.id=despacha.id_tienda and despacha.id_comuna=comuna.id order by tienda.id;";
	$result = $db -> prepare($query);
	$result -> execute();
	$tiendas = $result -> fetchAll();
  ?>
	<table>
    <tr>
      <th>Tienda</th>
      <th>Comuna</th>
    </tr>
  <?php
	foreach ($tiendas as $tienda) {
  		echo "<tr> <td>$tienda[0]</td> <td>$tienda[1] </td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>