<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna= $_POST["comuna"];
 	$query = "select avg(personal.edad) from personal,tienda,direccion,comuna where personal.tienda=tienda.id and tienda.dirección=direccion.id and direccion.comuna=comuna.id and comuna.nombre='%$comuna%';";
	$result = $db -> prepare($query);
	$result -> execute();
	$edad = $result -> fetchAll();
  ?>

<h3 align="center"><?php$edad[0]?></h3>

<?php include('../templates/footer.html'); ?>