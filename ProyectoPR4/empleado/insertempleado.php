<?php
include("../include/conexion.php");
if (isset($_POST['Enviar'])) {
 $valor=1;
  $sql="INSERT INTO login(usuario, password, rol_idrol) values ('{$_POST['usuario']}','{$_POST['password']}', '$valor')";
 
  
$query=mysql_query($sql) or die(mysql_error());
 $id = mysql_insert_id($conexion); 
 if ($id>0) {
   # regreso de id de insersion en la tabla
  $sql2="INSERT INTO persona(nombre,Snombre,apellido,Sapellido,telefono,documento, login_idlogin,departamento_iddepartamento)  VALUES('{$_POST['nombre']}','{$_POST['Snombre']}','{$_POST['apellido']}','{$_POST['Sapellido']}','{$_POST['telefono']}','{$_POST['documento']}','$id','{$_POST['departamento']}')";
   echo "Registro completo";
mysql_query($sql2) or die(mysql_error());
 } else {
   # error
  echo "No Registrado";
 }
 

} else {
  # code...
 // echo "No registrado";
}

 header("Location: empleado.php");

?>