<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna= $_POST["comuna"];
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
          echo "<tr>$edad[0]</tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>