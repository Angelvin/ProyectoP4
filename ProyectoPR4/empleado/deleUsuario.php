<?php
include("../include/conexion.php");
$valor=$_POST['codigo'];
$sqleliminar="delete  from persona where idpersona=$valor ";
$query=mysql_query($sqleliminar) or die(mysql_error());
 header("Location: usuario.php");

?>