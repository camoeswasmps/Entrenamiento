
<?
$link = mysql_connect('localhost', 'root', 'balmes15');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$db_selected = mysql_select_db('pruebas', $link);
if (!$db_selected) {
	die('Cant use pruebas : ' . mysql_error());
}
$result=mysql_query("SELECT * FROM datos"),
  $conexion);
echo"<table width=300>
<tr>
<td><b>Nombre</b></td><td><b>Apellido</b></td><td><b>ocupacion</b></td><td><b>sexo</b></td>
</tr>";
while($row=mysql_fetch_row($result)){
  echo"<tr>
    <td>$row[1]</td><td>$row[2]</td><td>$row[3]
      <a href="actualizar.php?id=$row[0]">Actualizar</a></td>
    </tr>";
}
echo"</table>";
mysql_close($link);
?>