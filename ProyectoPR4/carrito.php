<!DOCTYPE html>
<html lang="en">
<?php session_start();
include 'include/conexion.php';
if ((isset($_SESSION['carrito']))){
$arreglo=$_SESSION['carrito'];
$encontro=false;
$numero=0;
for ($i=0; $i <count($arreglo) ; $i++) { 
	if ($arreglo[$i]['Id']==$_Get['id']) {
		$encontro=true;
		$numero=$i;
	}
}
if ($encontro==true) {
	$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
	$_SESSION['carrito']=$arreglo;
}
}else{
	if ((isset($_Get['id']))){
		$nombre=" ";
		$precio=0;
		$imagen=" ";
		$re=mysql_query("select * from producto where id=".$_Get['id']);
		while ($row=mysql_fetch_array($re)) {
			$nombre=$row['nombre'];
			$Precio=$row['Precio'];
			$imagen=$row['imagen'];
		}
		$arreglo[]=$arrayName = array('Id' =>$_Get['id'] ,
			'Nombre'=>$nombre
		,'Precio'=>$Precio
		,'Imagen'=>$imagen,
		'Cantidad'=>1 );
		$_SESSION['carrito']=$arreglo;
	}
}
?>
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<body>
<?php
	$total=0;
if ((isset($_SESSION['carrito']))) {
	$datos=$_SESSION['carrito'];

for ($i=0; $i <count($datos) ; $i++) { 

?>
<div>
<center>
	<img src="imagen/<?php echo $datos[$i]['imagen']?>" >
	<span><?php echo$datos[$i]['Nombre']?> </span>
	<span>Precio<?php echo$datos[$i]['Precio']?> </span>
	<span>Cantidad<input type="text" value="<?php echo$datos[$i]['Cantidad'];?>" />/span>
	<span>Precio<?php echo$datos[$i]['Precio']*$datos[$i]['Cantidad']?> </span>
</center>
</div>
<?php
$total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
}
}else{
	echo 'ni fuck';
}
echo 'total'.$total;
?>
<a href="inicio.php"></a>
</body>
</html>
