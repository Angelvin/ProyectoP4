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
    <a href="index.php" style="font-size: 24px; margin-left: 50px;">Volver a inicio</a>
</div>
<div class="row">
    <div class="col-md-6 col-lg-offset-3">
        <br>
        <div class="panel panel-info">

            <div class=" panel-heading">Registo</div>
            <div class="panel-body">
                         <form action="../insertUsuario.php" method="POST">
  <div class="row">
  <div class="col-xs-6"><label>nombre</label></div>
  <div class="col-xs-6"><input type="text"  id="nombre"  name="nombre"  class="form-control" pattern="|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|"  required / ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>segundo nombre</label></div>
  <div class="col-xs-6"><input type="text" id="Snombre" name="Snombre"  class="form-control" pattern="|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|" required / ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>apellido</label></div>
  <div class="col-xs-6"><input type="text" name="apellido"  class="form-control" pattern="|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|" required / ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>apellido segundo</label></div>
  <div class="col-xs-6"><input type="text" name="Sapellido"  class="form-control" pattern="|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|" required / ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>telefono</label></div>
  <div class="col-xs-6"><input type="text" name="telefono"  class="form-control"  pattern="[0-9]{8}$" required /></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>Documento</label></div>
  <div class="col-xs-6"><input type="text" name="documento"  class="form-control" pattern="[0-9]"/></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>Departamento</label></div>
  <div class="col-xs-6"> <select class="form-control" name="departamento" required><option>-seleccione-</option><?php include_once '../include/departamento.php'; ?></select> </div>
</div>
  </div>
  <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Credenciales</h3>
  </div>
  <div class="panel-body">
  <div class="row">
  <div class="col-xs-6"><label>Usuario</label></div>
  <div class="col-xs-6"><input type="text" id="usuario" name="usuario" class="form-control" pattern="^[A-z0-9]{3,15}$" ></div>
</div>
<div class="row">
  <div class="col-xs-6"><label>Contraseña</label></div>
  <div class="col-xs-6"><input type="password" id="password" name="password"class="form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15})" required/></div>
  <input type='hidden' value='1' name='Enviar' />
  <input type='submit' class="btn btn-primary btn-lg" value='Guardar' />
</div>

  </div>
</div>

 
  </form>
        </div></div>

</div>

</body>
</html>