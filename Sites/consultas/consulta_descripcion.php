<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $descripcion = $_POST["descripcion"];
  $descripcion_b = strtolower($descripcion)
 	$query = "select distinct usuario.id,usuario.nombre,usuario.rut,usuario.edad,usuario.sexo from usuario, compras, boleta, productos where usuario.id=compras.id_usuario AND compras.id=boleta.id_compra AND boleta.id_producto=productos.id AND productos.descripcion like '$descripcion_b';";
	$result = $db -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
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
	foreach ($usuarios as $usuario) {
  		echo "<tr><td>$usuario[0]</td><td>$usuario[1]</td><td>$usuario[2]</td><td>$usuario[3]</td><td>$usuario[4]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>