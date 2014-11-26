<?php
include("../include/conexion.php");

if (isset($_POST['Enviar'])) {
 
  $sql="INSERT INTO priorida(nombreprio) values ('{$_POST['nombre']}')";
 
  
$query=mysql_query($sql) or die(mysql_error());
 

} else {
  # code...
 // echo "No registrado";
}
 header("Location: priorida.php");

?>