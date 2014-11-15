<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php
session_start();
include("include/conexion.php");
	 ?>

</head>
<body>
<table>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
	<?php $resul=mysql_query("select usuario, password from usuarios");
	while ($row= mysql_fetch_array($resul)) {
		# codigo para ver los usuarios y contraseñas

	?>
		<td><?php echo $row["usuario"]?></td>
		<td><?php echo $row["password"]?></td>
	</tr>
	<?php
}
	?>
</table>
</body>
</html>