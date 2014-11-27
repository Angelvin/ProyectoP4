<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<LINK rel="stylesheet" HREF="../../ProyectoPR4/css/bootstrap-3.2.0-dist/css/bootstrap.css"  >
	<title>Document</title>
</head>
<body>
<?php
include("../include/menuclie.php");
?>
<div class="row">
 <div class="col-md-2">
   <?php
include("../include/menulateralclien.php")
    ?>

 </div>
  <div class="col-md-8">
  	<div class="panel panel-default">
  <div class="panel-heading">Creacion ticket</div>
  <div class="panel-body">
  <?php

if (isset($_POST['Enviar'])) {

 $sql=" INSERT INTO detalleticket(descripcio,descripciondetallada ) values ('{$_POST['detalle']}','{$_POST['ddetalle']}')";
 
$query=mysql_query($sql)or die(mysql_error());
$id = mysql_insert_id($conexion); 
if ($id>0) {
  # terminar de insertar
  $fecha =date("Y-m-d");
  $valor=$_SESSION['iduse'];
$sql2="INSERT INTO ticket(ticketcol,problema_idproblema,detalleTicket_iddetalleTicket,persona_idpersona,estadoTicket_idestadoTicket,priorida_idpriorida) values( '{$_POST['Casot']}',{$_POST['problema']},'$id','$valor',{$_POST['estadotick']},{$_POST['prioridad']})";
echo "Registrado Espere Soporte";
mysql_query($sql2) or die(mysql_error());
} else {
echo "problema al registrar";
}

}else{




}

  ?>

<div>
  <form action="" method="POST">
    
<div class="row">
  <div class="col-md-6"><label>Caso</label><input type="text"  id="Casot"  name="Casot" class="form-control"   required /  ></div>
  <div class="col-md-6"><label>problema</label><select class="form-control" name="problema" required><option>-seleccione-</option><?php include_once '../include/problema.php'; ?></select> </div>
</div>
<div class="row">
  <div class="col-md-6"><label >Detalle</label><input type="text"  id="detalle"  name="detalle" class="form-control"   required /  ></div>
  <div class="col-md-6"><label >Descipcion Detallada</label><input type="text"  id="ddetalle"  name="ddetalle" class="form-control"   required /  ></div>
</div>
<div class="row">
  <div class="col-md-6"><label>Estado</label><select class="form-control" name="estadotick" required><option>-seleccione-</option><?php include_once '../include/estadotick.php'; ?></select> </div>
  <div class="col-md-6"><label>Prioridad</label><select class="form-control" name="prioridad" required><option>-seleccione-</option><?php include_once '../include/prioridad.php'; ?></select> </div>
</div>
<div>
<input type='hidden' value='1' name='Enviar' />
  <input type='submit' class="btn btn-primary btn-lg" value='Guardar' /></div>
  </form>
</div>
  </div>
  
</div>
  </div>
</div>
 
</body>
</html>