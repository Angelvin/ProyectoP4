<?php
include("../include/conexion.php");

$valor=$_POST['codigo'];
$sqleliminar="delete  from priorida where idpriorida=$valor ";
$query=mysql_query($sqleliminar) or die(mysql_error());
 header("Location: priorida.php");

?>