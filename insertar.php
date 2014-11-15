<html>

<body>

<?php
//Conectarse y seleccionar base de datos
$link = mysql_connect('localhost', 'root');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$db_selected = mysql_select_db('tarea', $link);
if (!$db_selected) {
	die('Cant use tarea : ' . mysql_error());
}
// Tomar los campos provenientes del Formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$ocupacion = $_POST['ocupacion'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
// Insertar campos en la Base de Datos
$que = "INSERT INTO datos (nombre, apellido, ocupacion, edad, sexo) ";
$que .= "VALUES ('" . $nombre . "', '" . $apellido . "', '" . $ocupacion . "','" . $edad . "','" . $sexo . "') ";
$res = mysql_query($que, $link) or die(mysql_error());

// Cerrar conexión a la Base de Datos
mysql_close($link);
?>
</body>

</html>