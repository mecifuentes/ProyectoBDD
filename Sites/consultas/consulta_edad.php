<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna= $_POST["comuna"];
  if (strlen($comuna)==0) {
    echo '<p style="text-align:center;">No ingresaste una comuna, te mostramos el promedio de edad de todos los trabajadores</p>';
  }
  $query = "select avg(personal.edad) from personal,tienda,direccion,comuna where personal.tienda=tienda.id and tienda.dirección=direccion.id and direccion.comuna=comuna.id and comuna.nombre like '%$comuna%';";
  $result = $db -> prepare($query);
  $result -> execute();
  $edad = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>Edad</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($edad as $edad) {
          echo "<tr><td>$edad[0]</th></td>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>