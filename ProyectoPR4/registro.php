<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	 <LINK rel="stylesheet" HREF="../ProyectoPR4/css/bootstrap-3.2.0-dist/css/bootstrap.css"  >
   <?php
  include ("include/conexion.php");
if (isset($_POST['Enviar'])) {
 $valor=1;
  $sql="INSERT INTO login(usuario, password, rol_idrol) values ('{$_POST['usuario']}','{$_POST['password']}', '$valor')";
 
  
$query=mysql_query($sql) or die(mysql_error());
 $id = mysql_insert_id($conexion); 
 if ($id>0) {
   # regreso de id de insersion en la tabla
  $sql2="INSERT INTO persona(nombre,Snombre,apellido,Sapellido,telefono,documento, login_idlogin,departamento_iddepartamento)  VALUES('{$_POST['nombre']}','{$_POST['Snombre']}','{$_POST['apellido']}','{$_POST['Sapellido']}','{$_POST['telefono']}','{$_POST['documento']}','$id','$valor')";
   echo "Registro completo";
mysql_query($sql2) or die(mysql_error());
 } else {
   # error
  echo "No Registrado ....Prueba";
 }
 

} else {
  # code...
 // echo "No registrado";
}

 


   ?>
</head>
<body>

<div class="row">
 <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="panel panel-info">

  <div class=" panel-heading">Registo</div>
  <div class="panel-body">
  <form action="" method="POST">
  <div class="row">
  <div class="col-xs-6"><label>nombre</label></div>
  <div class="col-xs-6"><input type="text"  name="nombre" class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>segundo nombre</label></div>
  <div class="col-xs-6"><input type="text" name="Snombre"  class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>apellido</label></div>
  <div class="col-xs-6"><input type="text" name="apellido"  class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>apellido segundo</label></div>
  <div class="col-xs-6"><input type="text" name="Sapellido"  class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>telefono</label></div>
  <div class="col-xs-6"><input type="text" name="telefono"  class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>Documento</label></div>
  <div class="col-xs-6"><input type="text" name="documento"  class="form-control" ></div>
</div>
  </div>
  <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
  </div>
  <div class="panel-body">
  <div class="row">
  <div class="col-xs-6"><label>Usuario</label></div>
  <div class="col-xs-6"><input type="text" id="usuario" name="usuario" class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>Contraseña</label></div>
  <div class="col-xs-6"><input type="text" id="password" name="password"class="form-control" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>Repetir Contraseña</label></div>
  <div class="col-xs-6"><input type="text" class="form-control" ></div>
</div>
  </div>
</div>
<input type='hidden' value='1' name='Enviar' />
  <input type='submit' class="btn btn-primary btn-lg" value='Guardar' />
 
  </form>
</div></div>
 
</div>

</body>
</html>