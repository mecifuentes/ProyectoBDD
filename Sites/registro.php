<?php include('templates/header.html');   ?>

<body>
  
<h3 align="center"> Registarse</h3>

<form align="center" action="creacion_usuarios.php" method="post">
    Nombre
    <input type="text" name="nombre">
    <br/><br/>
    Rut
    <input type="text" name="rut">
    <br/><br/>
    Edad
    <input type="number" name="edad">
    <br/><br/>
    Sexo
    <select name="sexo">
      <option selected disabled>...</option> 
      <option value="hombre">Hombre</option> 
      <option value="mujer">Mujer</option>
      <option value="no_binarie">No binarie</option>  
    </select>
    <br/><br/>
    Dirección
    <input type="text" name="direccion">
    <br/><br/>
    Comuna
    <select name="comuna">
    <option value='' selected disabled>...</option>
    <?php
    require("config/conexion.php");
    $query = "select nombre from comuna";
    $result = $db -> prepare($query);
    $result -> execute();
    $comunas = $result -> fetchAll();
    foreach ($comunas as $comuna) {
      echo "<option value='$comuna[0]'>$comuna[0]</option>";
    }
    ?>
    </select>
    <br/><br/>
    Contraseña
    <input type="password" name="contraseña">
    <br/><br/>
    Confirmar contraseña
    <input type="password" name="contraseña_2">
    <br/><br/>
    <input type="submit" value="Registrarme">
  </form>

<?php include('templates/footer.html');   ?>