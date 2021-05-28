<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $tipo_producto = $_POST["tipo_producto"];
  if ($tipo_producto == "comestible"){
 	$query = "SELECT DISTINCT tienda.nombre from comestible,productos,stock,tienda where stock.id_tienda=tienda.id and stock.id_producto=productos.id and productos.id=comestible.id_producto order by tienda.id;";
	$result = $db -> prepare($query);
	$result -> execute();
	$resultado = $result -> fetchAll();
  };
  if ($tipo_producto == "no_comestible"){
   $query = "SELECT DISTINCT(tienda.nombre) from no_comestible,productos,stock,tienda where stock.id_tienda=tienda.id and stock.id_producto=productos.id and productos.id=no_comestible.id_producto order by tienda.id;";
   $result = $db -> prepare($query);
   $result -> execute();
   $resultado = $result -> fetchAll();
   };
  ?>

  <table>
    <tr>
      <th>Tienda</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($resultado as $tienda) {
          echo "<tr><td>$tienda[0]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
