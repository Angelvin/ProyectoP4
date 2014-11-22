<?php
session_start();
 include ("../include/conexion.php");
$VVALOR=$_GET['codigo'];
$valor=$_SESSION['iduse'];
  $sql="UPDATE ticket SET idempleado=$valor, estado='revisado'  where idticket=$VVALOR";
  $query=mysql_query($sql) or die(mysql_error());
 header("Location: console.php");
?>