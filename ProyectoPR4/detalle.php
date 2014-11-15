<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php include("include/conexion.php") ?>

</head>
<body>
<table>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr><?php
$re=mysql_query("select * from producto where id_pro=".$_GET['id']) or die(mysql_error());
while ($row=mysql_fetch_array($re)) {

	?>

		<td><?php echo $row["nombre_pro"];?></td>
		<td><?php echo $row["descripcion"];?></td>
		<td><?php echo $row["precio"];?></td>
		<td><img src="imagen/<?php echo $row['imagen'];?>"></td>


		<td><a href="carrito.php?id=<?php echo $row['id_pro'];?>">añadir el carrito</a></td>
	</tr>
</table>


	<?php

}

?>
</body>
</html>