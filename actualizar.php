
<?
include "conexion.php";

if (!isset($accion)){
  $result=mysql_query("SELECT * FROM usuarios WHERE id=$id",
    $conexion);
  $row=mysql_fetch_row($result);
  echo"<html>
  <head><title>Actualizar datos de la base</title></head>
  <body>
  <form action="actualizar.php?accion=guardar" method="POST">
  Nombre:<br>
  <input type="text" value="$row[1]" name="nombre"><br>
  Apellido:<br>
  <input type="text" value="$row[2]" name="apellido"><br>
  DNI:<br>
  <input type="text" value="$row[3]" name="dni"><br>
  <input type="hidden" name="id" value="$row[0]">
  <input type="submit" value="Guardar">
  </form>
  </body>
  </html>";
}elseif($accion==guardar){
  $result=mysql_query("UPDATE usuarios SET nombre=$nombre,
    apellido=$apellido, dni=$dni WHERE id = $id",$conexion);
  echo"
  <html>
  <body>
  <h3>Los registros han sido actualizados</h3>
  </body>
  </html>";
}
include "cerrar_conexion.php";
?>