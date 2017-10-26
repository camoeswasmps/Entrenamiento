<?
include "conexion.php";
if (!isset($accion)){
        echo"
        <html>
        <head><title>Guardar datos en la base</title></head>
        <body>
<h3>Guardar datos en la base</h3>
<form name="form1" method="post"
    action="guardar.php?accion=guardar">
  <p>Nombre:<br>
    <input type="text" name="nombre">
  </p>
  <p>Apellido:<br>
    <input type="text" name="apellido">
  </p>
  <p>DNI:<br>
    <input type="text" name="dni">
  </p>
  <p>
    <input type="submit" name="Submit" value="Guardar Datos">
  </p>
</form>
</body>
</html>";
}elseif($accion=="guardar"){
  include"conexion.php";
  $result=mysql_query("INSERT INTO usuarios  (id,nombre, apellido, dni)
    VALUES ('',$nombre,$apellido,$dni) ",$conexion);
  echo" <html>
    <head></head>
    <body>
    <h3>Los datos han sido guardados</h3>
    </body>
    </html>";
}
include "cerrar_conexion.php";
?>