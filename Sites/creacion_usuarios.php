<?php include('templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");
  if (isset($_POST["nombre"], $_POST["rut"], $_POST["edad"], $_POST["sexo"], $_POST["direccion"], 
  $_POST["contraseña"], $_POST["contraseña_2"]) and $_POST["nombre"] !="" 
  and $_POST["rut"]!="" and $_POST["edad"]!="" and $_POST["sexo"]!="" and $_POST["direccion"]!="" 
  and $_POST["contraseña"]!="" and $_POST["contraseña_2"]!="" ){
    $nombre = $_POST["nombre"];
    $rut = $_POST["rut"];
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    $direccion = $_POST["direccion"];
    $contraseña = $_POST["contraseña"];
    $contraseña_2 = $_POST["contraseña_2"];
    #falta el id que hay que agregarlo (manualmente, para asi usar el mismo id para asociarlo a la direccion)
    #como lo suponiste leyendo lo anterior, falta insertar la direccion
    $query = "select id from usuario order by id desc limit 1;";
    $result = $db -> prepare($query);
    $result -> execute();
    $resultado = $result -> fetch(1);
    $wena = $resultado[0]
    echo "<p>$wena</p>";
    $id_usuario = $resultado[0];
    $query2 = "select id from direccion order by id desc limit 1;";
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $resultado2 = $result2 -> fetch(1);
    $id_direccion = $resultado[0];
    $query3 = "INSERT INTO usuario (id, nombre, rut, edad, sexo) VALUES ('$id_usuario', '$nombre','$rut','$edad', '$sexo');";
    $query4 = "INSERT INTO direccion (id, nombre) VALUES ('$id_direccion','$direccion');";
    $query5 = "INSERT INTO residencia (id_usuario, id_direccion) VALUES ('$id_usuario','$id_direccion');";
    $result3 = $db -> prepare($query3);
    if ($result3 -> execute()){
      $result4 = $db -> prepare($query4);
      if ($result4 -> execute()){
        $result5 = $db -> prepare($query5);
        if ($result5 -> execute()){
          echo "<p>Registro agregado.</p>";
        } else {
        echo "<p>Fallo1</p>";
        }
      } else {
        echo "<p>Fallo2</p>";
      }
    } else {
      echo "<p>Fallo3</p>";
    }
  }
  ?>
<?php include('templates/footer.html'); ?>