<?php
session_start();
include ("include/conexion.php");
if (isset($_POST['action'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($username) && !empty($password)) {
        $query = mysql_query("select   p.idpersona ,l.usuario, l.password, l.rol_idrol FROM login as l inner join persona as p on p.login_idlogin=l.idlogin  where l.usuario='$username' and l.password='$password'");
        while ($row = mysql_fetch_array($query)) {
            session_start();
            $_SESSION['userid'] = $row{'usuario'};
            $_SESSION['iduse']=$row{'idpersona'};
            $valor=$row{'rol_idrol'};
            if ($valor==1) {
                header("Location:empleado/console.php"); /* Si el usuario existe, direccionar a la pagina princial( catalogo) */
            }elseif ($valor==2) {
                header("Location:inicio.php");
            }
        }
    } else {
        echo "<p>Usuario/Contrasenia incorrectos.</p>";
    }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es-ES" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="validacionStyle.css">

    <LINK rel="stylesheet" HREF="../ProyectoPR4/css/bootstrap-3.2.0-dist/css/bootstrap.css"  >
    <style>
        .container
        {
            margin-top: 1%;

        }
        .panel panel-primary
        {

            display: center;

        }
        h2
        {
            text-align: center;
        }
        #frm-login
        {
            float:left;    /*tambien puede poner float:right, para que se alineé a la derecha */
            padding:10px;
            width:500px;
            margin:40px;

        }
        #registrarse-container
        {
            float:left;       /*tambien puede poner float:right, para que se alineé a la derecha */
            padding:10px;
            width:400px;
            margin:40px;


        }


    </style>

</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading"></div>
        <div class="panel-body">

            <form id="frm-login" action="" method="POST" class="form-horizontal" autocomplete="off">

                <fieldset>
                    <div class="form-group">

                        <legend><center><h3>Login cliente</h3></center></legend>
                        <br>
                        <div class="form-group">
                            <label  class="col-lg-3 control-label" for="username">Username</label>
                            <div class="col-lg-8">
                                <input type="tex" name="username" class="form-control"  placeholder="Escriba un nombre" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-3 control-label" for="passwordm">Password</label>
                            <div class="col-lg-8">
                                <input type="password" name="password" class="form-control"  placeholder="Escriba una contrasenia" pattern=".{4,25}">
                            </div>
                        </div>
                        <center>
                            <input type='submit' name='action' value="Entrar" class="btn btn-success">
                        </center>
                        <br>
                        <br>
                        <a href="index.php">Cancel</a>
                        <br>


                    </div>
                </fieldset>

            </form>
            <div id="registrarse-container">
                <h3><p class="text-center">¿Ya estas registrado?</p></h3>
                <hr>
                <h4><p class="text-center">Registrarse como Cliente</p></h4>

                <p class="text-center">
                    <a href="registro.php">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </a>
                </p>
                <br>
            </div>

        </div>
    </div>
</div>
</div> <!-- End of outer-wrapper which opens in header.php -->
</body>
</html>
