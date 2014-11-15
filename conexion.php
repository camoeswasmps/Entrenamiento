<?
$dbhost="localhost";  // host del MySQL (generalmente localhost)
$dbusuario="camoes"; // aqui debes ingresar el nombre de usuario
                      // para acceder a la base
$dbpassword="balmes15"; // password de acceso para el usuario de la
                      // linea anterior
$db="ejemplo2";        // Seleccionamos la base con la cual trabajar
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);
?>