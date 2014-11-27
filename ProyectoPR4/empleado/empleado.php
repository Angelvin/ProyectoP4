<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery.js"  type="text/javascript"></script>
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
include("../include/menulateral.php");

    ?>
<?php
include("../include/conexion.php");
?>
 </div>
  <div class="col-md-8">
  	<div class="panel panel-default">
  <div class="panel-heading">Empleado</div>
  <div class="panel-body">
  <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Crear Empleado</button></div>
  <table class="table">
  
  <?php 

$result= mysql_query("select  p.idpersona,p.nombre,p.Snombre, p.apellido, p.Sapellido, p.telefono,p.documento from persona as p inner join login as l on p.login_idlogin=l.idlogin inner join rol as r on l.rol_idrol=r.idrol where r.idrol=1");
while ($row=mysql_fetch_array($result)) {

?>
<tr>

  <td><?php echo$row["nombre"]  ?></td>
  <td><?php echo$row["Snombre"]  ?></td>
  <td><?php echo$row["apellido"]  ?></td>
  <td><?php echo$row["Sapellido"]  ?></td>
  <td><?php echo$row["telefono"]  ?></td>
   <td><?php echo$row["documento"]  ?></td>
 <td><form  id="updateCita" method="GET" action="updateempleado.php ">
<input type="hidden" name="codigo"  id="codigo" value="<?php echo$row["idpersona"]  ?>" >
<input type="submit" name="cmdguardar" class="btn btn-link" value="Consulta" POST="SUMIT"/>
</form></td> 

</tr>
<?php
} 
?>
</table>
<!-- Small modal -->


<!-- Large modal -->


                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="width: 50% !important">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2>Crear Empleado</h2>
                            </div>
                            <div class="modal-body">
                                


                                <form action="insertempleado.php" method="POST">
                                    <div class="row">
                                        <div class="col-xs-3 text-right"><label>nombre</label></div>
                                        <div class="col-xs-7"><input type="text"  id="nombre"  name="nombre" class="form-control"  ></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 text-right"><label>segundo nombre</label></div>
                                        <div class="col-xs-7"><input type="text" id="Snombre" name="Snombre"  class="form-control" ></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 text-right"><label>apellido</label></div>
                                        <div class="col-xs-6"><input type="text" name="apellido"  class="form-control" ></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 text-right"><label>apellido segundo</label></div>
                                        <div class="col-xs-6"><input type="text" name="Sapellido"  class="form-control" ></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 text-right"><label>telefono</label></div>
                                        <div class="col-xs-6"><input type="text" name="telefono"  class="form-control" ></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 text-right"><label>Documento</label></div>
                                        <div class="col-xs-6"><input type="text" name="documento"  class="form-control" ></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 text-right" ><label>Departamento</label></div>
                                        <div class="col-xs-6"> <select class="form-control" id="departamento" name="departamento" required><option>-seleccione-</option><?php include_once '../include/departamento.php'; ?></select> </div>
                                    </div>
                                    <hr>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Credenciales</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-6"><label>Usuario</label></div>
                                                <div class="col-xs-6"><input type="text" id="usuario" name="usuario" class="form-control" ></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6"><label>Contraseña</label></div>
                                                <div class="col-xs-6"><input type="text" id="password" name="password"class="form-control" ></div>
                                                <input type='hidden' value='1' name='Enviar' />
                                                <input type='submit' class="btn btn-primary btn-lg" value='Guardar' />
                                            </div>

                                        </div>
                                    </div>

                                </form>
    </div>
  </div>
</div>
  </div>
  
</div>
  </div>
</div>
   <script src="../../ProyectoPR4/css/bootstrap-3.2.0-dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>