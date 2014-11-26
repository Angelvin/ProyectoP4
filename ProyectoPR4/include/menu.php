<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<LINK rel="stylesheet" HREF="../../ProyectoPR4/css/bootstrap-3.2.0-dist/css/bootstrap.css"  >
	<title>Document</title>

</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sistemas</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../empleado/console.php">Consola<span class="sr-only">(current)</span></a></li>
        <li><a href="../empleado/usuario.php">Usuario</a></li>
        <li><a href="../empleado/empleado.php">Empleado</a></li>
        <li><a href="../empleado/priorida.php">Priorida</a></li>
        <li><a href="../empleado/problema.php">Problema</a></li>
        <li><a href="../empleado/estadoticket.php">Estadoticket</a></li>
        <li><a href="../empleado/departamento.php">Departamento</a></li>

        <li class="dropdown">
       
        </li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php
        session_start();
        include ("../include/conexion.php");
if (!empty($_SESSION['userid'])) {
    echo "Bienvenido ".$_SESSION['userid'];
     echo '<a href="../logout.php" class="logout"><span class="glyphicon glyphicon-log-out"></span> Cerra Sesion</a>';
} else {
    //header("Location: logon.php"); /* Redirect browser */
    header("Location: ../index.php"); /* Redirect browser */
}

        ?></a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav></nav>
</body>
</html>