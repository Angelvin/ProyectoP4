<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<LINK rel="stylesheet" HREF="../../ProyectoPR4/css/bootstrap-3.2.0-dist/css/bootstrap.css"  >
	<title>Document</title>
</head>
<body>
<?php
include("../include/menu.php");
?>
<div class="row">
 <div class="col-md-2">
   <?php
include("../include/menulateral.php")
    ?>

 </div>
  <div class="col-md-8">
  	<div class="panel panel-default">
  <div class="panel-heading">Consola</div>
  <div class="panel-body">
  <table class="table">
  <tr>
  <td>Descripcion</td>
  <td>Detalle</td>
  <td>Regresar</td>
</tr>
  <?php 
$valor=$_GET['codigo'];
$result= mysql_query("select descripcio,descripciondetallada from detalleticket where iddetalleTicket=$valor") ;
while ($row=mysql_fetch_array($result)) {

?>

<tr>

  <td><?php echo$row["descripcio"]  ?></td>
  <td><?php echo$row["descripciondetallada"]  ?></td>
  <td><a href="../empleado/console.php">Regresar</a></td>
  
</tr>
<?php
} 
?>
</table>
  
  </div>
  
</div>
  </div>
</div>
 
</body>
</html>