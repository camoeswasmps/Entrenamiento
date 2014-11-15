<?php
$link = mysql_connect('localhost', 'root', '**');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';

$db_selected = mysql_select_db('pruebas', $link);
if (!$db_selected) {
	die('Cant use pruebas : ' . mysql_error());
?>
