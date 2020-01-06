<?php
$id = $_GET['id'];
require_once("../plantillas/plantilla.php");
$nuevaCantidad= $_POST['cant_llegados'];
$query="SELECT cant_prod FROM producto WHERE id_prod= '$id'";
$rs= mysqli_query($con,$query);
$mostrar1 = mysqli_fetch_array($rs);
$suma=$mostrar1+$nuevaCantidad;
$sql2 = "UPDATE producto SET cant_prod = '$suma' WHERE producto.id_prod ='$id'";
$resultado = mysqli_query($con, $sql2);
?>