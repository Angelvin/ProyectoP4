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
  <div class="panel-heading">Espera</div>
  <div class="panel-body">
 
  <table class="table">
  <tr>
  
  <td>numero ticket</td>
  <td>Caso</td>
  <td>Departamento</td>
  <td>Descripcio</td>
  <td>Estado</td>
  <td>nombre Priorida</td>
  <td>Nombre problemas</td>
 

</tr>
  <?php 
 $valor=$_SESSION['iduse'];
$result= mysql_query("Select d.nombreDepa ,tic.ticketcol, tic.idticket,
dtic.descripcio, dtic.iddetalleTicket,stic.estado,prio.nombreprio,pro.nombreProblema  
from persona as p inner join departamento as d on d.iddepartamento=p.departamento_iddepartamento
inner join ticket as tic on p.idpersona=tic.persona_idpersona 
inner join detalleticket as dtic on dtic.iddetalleTicket=tic.detalleTicket_iddetalleTicket
inner join estadoticket as stic on stic.idestadoTicket=tic.estadoTicket_idestadoTicket
inner join priorida as prio on prio.idpriorida=tic.priorida_idpriorida
inner join problema as pro on pro.idproblema=tic.problema_idproblema where  tic.persona_idpersona='$valor' and idempleado is null ") ;
while ($row=mysql_fetch_array($result)) {

?>

<tr>

  <td><?php echo$row["idticket"]  ?></td>

  <td><?php echo$row["ticketcol"]  ?></td>
  <td><?php echo$row["nombreDepa"]  ?></td>

  <td><?php echo$row["descripcio"]  ?></td>
   <td><?php echo$row["estado"]  ?></td>
   <td><?php echo$row["nombreprio"]  ?></td>
   <td><?php echo$row["nombreProblema"]  ?></td>

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