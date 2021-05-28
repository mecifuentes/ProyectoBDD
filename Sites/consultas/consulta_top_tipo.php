<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $tipo_producto = $_POST["tipo_producto"];
  if ($tipo_producto == "comestible"){
 	$query = "select tienda.nombre, sum(boleta.cantidad) from comestible, boleta, compras, tienda where comestible.id_producto=boleta.id_producto and boleta.id_compra=compras.id and compras.id_tienda=tienda.id group by tienda.id order by sum(boleta.cantidad) desc limit 5;";
	$result = $db -> prepare($query);
	$result -> execute();
	$resultado = $result -> fetchAll();
  }
  if ($tipo_producto == "no_comestible"){
    $query = "select tienda.nombre, sum(boleta.cantidad) from no_comestible, boleta, compras, tienda where no_comestible.id_producto=boleta.id_producto and boleta.id_compra=compras.id and compras.id_tienda=tienda.id group by tienda.id order by sum(boleta.cantidad) desc limit 5;";
   $result = $db -> prepare($query);
   $result -> execute();
   $resultado = $result -> fetchAll();
   }
  ?>

  <table>
    <tr>
      <th>Tienda</th>
      <th>Cantidad</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($resultado as $tienda) {
          echo "<tr><td>$tienda[0]</td><td>$tienda[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
