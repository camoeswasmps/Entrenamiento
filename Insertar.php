<html>

<body>

<?php
include ("conectar.php");
//Conectarse y seleccionar base de datos

// Tomar los campos provenientes del Formulario
$noticias = $_POST['noticias'];
$datepicker = $_POST['fecha'];
$activo = $_POST['activo'];
// Insertar campos en la Base de Datos
$que = "INSERT INTO ejemplo (noticias, fecha, activo) ";
$que .= "VALUES ('" . $noticias . "', '" . $datepicker . "', '" . $activo . "') ";
$res = mysql_query($que, $link) or die(mysql_error());

// Cerrar conexión a la Base de Datos
mysql_close($link);
?>
</body>

</html>