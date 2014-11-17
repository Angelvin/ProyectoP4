<?php
include("../include/conexion.php");
$valor=$_POST['codigo'];
$sqleliminar="delete  from problema where idproblema=$valor ";
$query=mysql_query($sqleliminar) or die(mysql_error());
 header("Location: problema.php");

?>