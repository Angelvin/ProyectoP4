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
  <div class="panel-heading">estadoticket </div>
  <div class="panel-body">
  <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Crear estadoticket </button></div>
  <table class="table">
  
  <?php 

$result= mysql_query("select idestadoTicket, estado from estadoticket ");
while ($row=mysql_fetch_array($result)) {

?>
<tr>

  <td><?php echo$row["idestadoTicket"]  ?></td>
  <td><?php echo$row["estado"]  ?></td>
 
 <td><form  id="updateCita" method="GET" action="updestadoti.php ">
<input type="hidden" name="codigo"  id="codigo" value="<?php echo$row["idestadoTicket"]  ?>" >
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
                    <div class="modal-dialog modal-lg" style="width: 50% !important;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    
   <h2>Crear estadoticket </h2>
   <form action="insertstadotick.php" method="POST">
  <div class="row">
  <div class="col-xs-6"><label>Nombre de estadoticket </label></div>
  <div class="col-xs-6"><input type="text"  id="nombre"  name="nombre" class="form-control" pattern="|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|"  required / ></div>
</div>

<input type='hidden' value='1' name='Enviar' />
  <input type='submit' class="btn btn-primary btn-lg" value='Guardar' />
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