<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Mi Tienda Web </h1>
  <p style="text-align:center;">Aqui puedes buscar información sobre las tiendas de Mi Tienda Web</p>

  <br>

  <h3 align="center"> Aprete este botón para ver todas las tiendas y las comunas a las que despachan</h3>

  <form align="center" action="consultas/consulta_tiendas.php" method="post">
    <input type="submit" value="Ver tiendas">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Ingrese una comuna para ver todos los jefes de las tiendas ubicadas en dicha comuna</h3>

  <form align="center" action="consultas/consulta_jefes.php" method="post">
    Ingrese comuna:
    <input type="text" name="comuna">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Eliga un tipo de producto para ver las tienda que venden al menos un producto de dicho tipo</h3>

  <form align="center" action="consultas/consulta_tipo_producto.php" method="post">
    Seleccione tipo de producto 
    <select name="tipo_producto">
      <option value="comestible">Comestibles</option> 
      <option value="no_comestible">No comestibles</option> 
    </select>
    <br><br>
    <imput type="submit" value="tipo_producto">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center"> Todos los usuarios que compraron productos con una descripción</h3>

  <form align="center" action="consultas/consulta_descripcion.php" method="post">
    Ingrese descripción
    <input type="text" name="descripcion">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center"> Edad promedio de trabajadores de tienda que estan en una comuna</h3>

  <form align="center" action="consultas/consulta_edad.php" method="post">
    Ingrese comuna
    <input type="text" name="edad">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">Top 5 tiendas que mas vendieron de un tipo de producto</h3>

  <form align="center" action="consultas/consulta_top_tipo.php" method="post">
    Seleccione tipo de producto 
    <select name="tipo_producto">
      <option value="comestible">Comestibles</option> 
      <option value="no_comestible">No comestibles</option> 
    </select>
    <br><br>
    <imput type="submit" value="tipo_producto">

  <br>
  <br>
  <br>
  <br>
</body>
</html>
