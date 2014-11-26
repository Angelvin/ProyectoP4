<?php
include("../include/conexion.php");

$valor=$_POST['codigo'];
$sqleliminar="delete  from departamento where iddepartamento=$valor ";
$query=mysql_query($sqleliminar) or die(mysql_error());
 header("Location: departamento.php");

?>