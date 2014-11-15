<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php
include("include/cone.php");
if (isset($_POST['Enviar'])) {
	# code...
	$sql = "INSERT INTO priorida (nombreprio) VALUES ('{$_POST['nombre']}')";

if ($conn->query($sql) === TRUE) {
    echo "Se agrego correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
	# code...
}


  $conn->close();
?>
</head>
<body>
<form action="" method="POST">
 <input type="text" name="nombre" id="nombre" class="form-control" >
 <input type='hidden' value='1' name='Enviar' />
 <input type='submit' class="btn btn-primary btn-lg" value='Guardar' />
</form>
</body>
</html>