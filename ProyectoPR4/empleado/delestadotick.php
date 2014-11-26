<?php
include("../include/conexion.php");

$valor=$_POST['codigo'];
$sqleliminar="delete  from estadoticket where idestadoTicket=$valor ";
$query=mysql_query($sqleliminar) or die(mysql_error());
 header("Location: estadoticket.php");

?>