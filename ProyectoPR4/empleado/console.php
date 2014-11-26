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
   <div class="span12">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#programadas" data-toggle="tab">Citas Programadas</a></li>
                                            <li><a href="#retraso" data-toggle="tab">Retraso</a></li>
                                            <li><a href="#estadosCitas" data-toggle="tab">Estado de Citas</a></li>
                                            <li><a href="#Menu" data-toggle="tab">Menu</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="programadas">
                                                <div class="panel-body">
                                                    <table>
                                                        <!--          LISTADO     -->
                                                    <jsp:useBean id="estado2" scope="request" class="BAL.confimado" />
                                                    <c:set var="list" scope="request" value="${estado2.listado}"/>
                                                    <display:table name="list" export="true" id="fila"  class="table table-condensed" pagesize="10" >
                                                        <display:setProperty name="export.rtf.filename" value="example.rtf" />
                                                        <display:column property="codigo" title="Codigo" />
                                                        <display:column property="nombre" title="Nombre" />
                                                        <display:column property="motivo" title="Motivo" />
                                                        <display:column property="especialidad" title="Especialidad" />
                                                        <display:column property="medico" title="Mèdico" />
                                                        <display:column property="hora" title="Hora" />
                                                        <display:setProperty name="export.pdf" value="true" />
                                                        <display:column title="Editar">
                                                            <form  id="updateCita" method="post" action="../cConsulta ">
                                                                <input type="hidden" name="codigoCita" value="${fila.codigo}" >
                                                                <input type="submit" name="cmdguardar" class="btn btn-link" value="Consulta" POST="SUMIT"/>
                                                            </form>
                                                        </display:column>
                                                    </display:table>
                                                </table>
                                            </div>

                                        </div><!-- @end #hello -->

                                        <div class="tab-pane" id="retraso">
                                            <div class="panel-body">
                                                <div class="panel-body">
                                                    <table>
                                                        <!--          LISTADO     -->
                                                        <jsp:useBean id="estado3" scope="request" class="BAL.tarde" />

                                                        <c:set var="lista" scope="request" value="${estado3.listado}"/>


                                                        <display:table name="lista" export="true" id="fila" class="table table-condensed" pagesize="10">
                                                            <display:setProperty name="export.rtf.filename" value="example.rtf"/>

                                                            <display:column property="codigo" title="Codigo" />
                                                            <display:column property="nombre" title="Nombre" />
                                                            <display:column property="medico" title="Mèdico" />
                                                            <display:column title="Editar">
                                                                <form  id="updateCita" method="GET" action="../FrmSecretaria/reprogramar.jsp ">
                                                                    <input type="hidden" name="codigoCita" value="${fila.codigo}" >
                                                                    <input type="submit" name="cmdguardar" class="btn btn-link" value="Reprogramar" POST="SUMIT"/>

                                                                </form>
                                                            </display:column>
                                                            <display:column title="Editar">
                                                                <form  id="updateCita" method="post" action="../cConsulta ">
                                                                    <input type="hidden" name="codigoCita" value="${fila.codigo}" >

                                                                    <input type="submit" name="cmdguardar" class="btn btn-link" value="cancelar" POST="SUMIT"/>
                                                                </form>
                                                            </display:column>
                                                        </display:table>

                                                    </table>
                                                </div>
                                            </div>
                                        </div><!-- @end #empty -->

                                        <div class="tab-pane" id="estadosCitas">
                                            <div class="panel-body"
                                                 <table class="table table-bordered">
                                                    <!--          LISTADO     -->
                                                    <jsp:useBean id="estado" scope="request" class="BAL.Espera" />
                                                    <c:set var="lista" scope="request" value="${estado.listado}"/>

                                                    <display:table name="lista" export="true" id="fila"pagesize="10" class="table table-condensed" >
                                                        <display:setProperty name="export.rtf.filename" value="example.rtf"/>
                                                        <display:column property="codigo" title="Codigo" />
                                                        <display:column property="correocita" title="Correo" />
                                                        <display:column property="nombre" title="Nombre" />
                                                        <display:column property="fechasoli" title="Fecha Solicitud" />
                                                        <display:column property="fecha" title="Fecha" />
                                                        <display:column property="hora" title="Hora" />
                                                        <display:column property="estado" title="Estado Cita" />
                                                        <display:column title="Editar">
                                                            <form  id="updateCita" method="post" action="../cConsulta ">
                                                                <input type="hidden" name="codigoCita" value="${fila.codigo}" >
                                                                <input type="submit" name="cmdguardar" class="btn btn-link" value="Confirmar" POST="SUMIT"/>
                                                                <input type="submit" name="cmdguardar" class="btn btn-link" value="cancelar" POST="SUMIT"/>
                                                            </form>
                                                        </display:column>
                                                    </display:table>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="Menu">
                                            <h3>Selecciones una opciòn</h3>
                                            <ul class="list-group">


                                                <li class="list-group-item"><span class="glyphicon glyphicon-user"></span><a href="../FrmSecretaria/RegistroP.jsp">Creacion Paciente</a></li>
                                                <li class="list-group-item"><span class="glyphicon glyphicon-search"></span><a href="../FrmSecretaria/BusquedaPaciente.jsp">Busqueda de Paciente</a></li>
                                                <li class="list-group-item"><span class="glyphicon glyphicon-search"></span><a href="../FrmSecretaria/BusquedaMedico.jsp">Medico</a></li>
                                                <li class="list-group-item"><span class="glyphicon glyphicon-list-alt"></span><a href="../FrmSecretaria/agendaSecre.jsp">Agenda</a></li>
                                                <li class="list-group-item"><span class="glyphicon glyphicon-shopping-cart"></span><a href="../FrmSecretaria/Ingreso.jsp">Adquisicion</a></li>
                                                <li class="list-group-item"><span class="glyphicon glyphicon-usd"></span><a href="../FrmSecretaria/factura.jsp">Facturacion</a></li>

                                            </ul>
                                        </div><!-- @end .tab-content -->

                                    </div><!-- @end .span12 -->
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
inner join problema as pro on pro.idproblema=tic.problema_idproblema where tic.fechaCreacion=CURDATE() and idempleado is null  group by d.iddepartamento ASC") ;
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