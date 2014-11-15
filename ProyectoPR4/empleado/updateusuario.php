<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<LINK rel="stylesheet" HREF="../../ProyectoPR4/css/bootstrap-3.2.0-dist/css/bootstrap.css"  >
	<title>Document</title>
</head>
<body>
<?php
include("../include/conexion.php");
include("../include/menu.php");
?>
<div class="row">
 <div class="col-md-2">
   <?php
include("../include/menulateral.php");

    ?>
<?php

$valor=$_POST['codigo'];
$result= mysql_query("select nombre,Snombre,apellido,Sapellido,telefono,documento from persona where idpersona=$valor");
while ($row=mysql_fetch_array($result)) {
 $vanombre=$row['nombre'];
 $vaSnombre=$row['Snombre'];
 $vaapellido=$row['apellido'];
 $vaSapellido=$row['Sapellido'];
 $vatelefono=$row['telefono'];
 $vadocumento=$row['documento'];
}


?>
 </div>
  <div class="col-md-8">
  	<div class="panel panel-default">
  <div class="panel-heading">Panel heading without title</div>
  <?php
if (isset($_POST['Enviar'])) {
 $valor=1;
  $sql="UPDATE persona SET values nombre='{$_POST['nombre']}', Snombre='{$_POST['Snombre']}',apellido='{$_POST['apellido']}',Sapellido='{$_POST['Sapellido']}',telefono='{$_POST['telefono']}',documento='{$_POST['documento']}' where idpersona='$valor'";
  $query=mysql_query($sql,$conexion) or die(mysql_error());
  }else{
    echo "No se logro Guardar los Datos";
  }
  ?>
  <div class="panel-body">
<form action="" method="POST">
  <div class="row">
  <div class="col-xs-6"><label>nombre</label></div>
  <div class="col-xs-6"><input type="text"  name="nombre" value="<?=$vanombre?>" class="form-control"  ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>segundo nombre</label></div>
  <div class="col-xs-6"><input type="text" name="Snombre"  value="<?=$vaSnombre?>" class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>apellido</label></div>
  <div class="col-xs-6"><input type="text" name="apellido"  value="<?=$vaapellido?>" class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>apellido segundo</label></div>
  <div class="col-xs-6"><input type="text" name="Sapellido"  value="<?=$vaSapellido?>" class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>telefono</label></div>
  <div class="col-xs-6"><input type="text" name="telefono"  value="<?=$vatelefono?>" class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>Documento</label></div>
  <div class="col-xs-6"><input type="text" name="documento"  value="<?=$vadocumento?>" class="form-control" ></div>
   <input type='hidden' value='1' name='Enviar' />
  <input type='submit' class="btn btn-primary btn-lg" value='Guardar' />
</div>
</form>
  
  </div>
  
</div>
  </div>
</div>
 
</body>
</html>