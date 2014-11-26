<?php
include("../include/conexion.php");
if (isset($_POST['Enviar'])) {
 
  $sql="INSERT INTO departamento(nombreDepa) values ('{$_POST['nombre']}')";
 
  
$query=mysql_query($sql) or die(mysql_error());
 
header("Location: ../empleado/departamento.php");
} else {
  # code...
 // echo "No registrado";
}
 header("Location: departamento.php");

?>