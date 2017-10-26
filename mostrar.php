<?php
include ("conectar.php");

$r= mysql_query(select * from ejemplo)
if (!$r) {
    die('Invalid query: ' . mysql_error());
}
echo "$r";
mysql_close()

?>
