<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<LINK rel="stylesheet" HREF="../../ProyectoPR4/css/bootstrap-3.2.0-dist/css/bootstrap.css"  >
   <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
	<title>Document</title>
</head>
<body>
<?php
include("../include/menu.php");
?>
<div class="row">
 <div class="col-md-2">
   <?php
include("../include/menulateral.php");

    ?>
<?php
include("../include/conexion.php");
?>
 </div>
  <div class="col-md-8">
  	<div class="panel panel-default">
  <div class="panel-heading">Empleados</div>
  <div class="panel-body">
  <table class="table">
  
  <?php 

$result= mysql_query("select  p.idpersona,p.nombre,p.Snombre, p.apellido, p.Sapellido, p.telefono from persona as p inner join login as l on p.login_idlogin=l.idlogin inner join rol as r on l.rol_idrol=r.idrol where r.idrol=2");
while ($row=mysql_fetch_array($result)) {

?>
<tr>
  <td><?php echo$row["nombre"]  ?></td>
  <td><?php echo$row["Snombre"]  ?></td>
  <td><?php echo$row["apellido"]  ?></td>
  <td><?php echo$row["Sapellido"]  ?></td>
  <td><?php echo$row["telefono"]  ?></td>
 <td><form  id="updateCita" method="post" action=" ">
                                                                <input type="hidden" name="codigoCita" value="<?php echo$row["idpersona"]  ?>" >
                                                                <input type="submit" name="cmdguardar" class="btn btn-link" value="Consulta" POST="SUMIT"/>
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