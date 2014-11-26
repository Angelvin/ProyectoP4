<?php
include("../include/conexion.php");


if (isset($_POST['Enviar'])) {
 
  $sql="INSERT INTO estadoticket (estado) values ('{$_POST['nombre']}')";
 
  
$query=mysql_query($sql) or die(mysql_error());
 
} else {
  # code...
 // echo "No registrado";
}

 header("Location: estadoticket.php");

?>