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
  <td>numero Usuario</td>
  <td>Nombre</td>
  <td>Departamento</td>
  <td>numero ticket</td>
  <td>Descripcio</td>
  <td>Estado</td>
  <td>nombre Priorida</td>
  <td>Nombre problemas</td>
 <td>ver detalle</td>
  <td>Checar de revisado</td>

</tr>
  <?php 

$result= mysql_query("select p.idpersona, concat(p.nombre,' ', p.Snombre,' ', p.apellido,' ', p.Sapellido)as nom,d.nombreDepa ,tic.idticket,
dtic.descripcio, dtic.iddetalleTicket,stic.estado,prio.nombreprio,pro.nombreProblema  
from persona as p inner join departamento as d on d.iddepartamento=p.departamento_iddepartamento
inner join ticket as tic on p.idpersona=tic.persona_idpersona 
inner join detalleticket as dtic on dtic.iddetalleTicket=tic.detalleTicket_iddetalleTicket
inner join estadoticket as stic on stic.idestadoTicket=tic.estadoTicket_idestadoTicket
inner join priorida as prio on prio.idpriorida=tic.priorida_idpriorida
inner join problema as pro on pro.idproblema=tic.problema_idproblema  where tic.fechaCreacion=CURDATE() group by d.iddepartamento ASC") ;
while ($row=mysql_fetch_array($result)) {

?>

<tr>

  <td><?php echo$row["idpersona"]  ?></td>
  <td><?php echo$row["nom"]  ?></td>
  <td><?php echo$row["nombreDepa"]  ?></td>
  <td><?php echo$row["idticket"]  ?></td>
  <td><?php echo$row["descripcio"]  ?></td>
   <td><?php echo$row["estado"]  ?></td>
   <td><?php echo$row["nombreprio"]  ?></td>
   <td><?php echo$row["nombreProblema"]  ?></td>
 <td><form  id="updateCita" method="GET" action="destelleconsole.php ">
<input type="hidden" name="codigo"  id="codigo" value="<?php echo$row["iddetalleTicket"]  ?>" >
<input type="submit" name="cmdguardar" class="btn btn-link" value="Detalles" POST="SUMIT"/>
</form></td> 
<td><form  id="updateCita" method="GET" action="actuaconsola.php ">
<input type="hidden" name="codigo"  id="codigo" value="<?php echo$row["idticket"]  ?>" >
<input type="submit" name="cmdguardar" class="btn btn-link" value="Revisar" POST="SUMIT"/>
</form></td> 
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