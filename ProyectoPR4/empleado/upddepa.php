<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<LINK rel="stylesheet" HREF="../../ProyectoPR4/css/bootstrap-3.2.0-dist/css/bootstrap.css"  >
	<title>Document</title>
</head>
<body>
<?php

include_once '../include/conexion.php';
include("../include/menu.php");
?>
<div class="row">
 <div class="col-md-2">
   <?php
include("../include/menulateral.php");

    ?>
<?php
if (isset($_GET['envi'])) {

$VVALOR=$_GET['idclie'];
 $NOMBRE=$_GET['nombre'];


  $sql="UPDATE departamento SET nombreDepa='$NOMBRE'  where  iddepartamento=$VVALOR";
  $query=mysql_query($sql) or die(mysql_error());
 header("Location: departamento.php");
  }else{
   
  }
$valor=$_GET['codigo'];




$result= mysql_query("select iddepartamento,nombreDepa from departamento where iddepartamento=$valor");
while ($row=mysql_fetch_array($result)) {
 $idprio=$row['iddepartamento'];
 $nombre=$row['nombreDepa'];

}


?>

 </div>
  <div class="col-md-8">
  	<div class="panel panel-default">
  <div class="panel-heading">Panel heading without title</div>
  
  <div class="panel-body">
<form action=" " method="GET">
  
<div class="row">
  <div class="col-xs-6"><label>Nombre Departamento</label></div>
  <div class="col-xs-6"><input type="text" name="nombre"  value="<?=$nombre?>" class="form-control" ></div>
   <input type='hidden' value='1' name='envi' />
   <input  name="idclie" type='hidden' value="<?=$idprio?>">
  <input type='submit' class="btn btn-primary btn-lg" value='Guardar' />
</div>
</form>
  
  </div>
  
</div>
  </div>
</div>

</body>
</html>