<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=productos.php">
<?php

$con = mysqli_connect('localhost', 'root', '', 'fenixx');

$ID = $_POST['id'];
$CantHabidos = $_POST['cant'];
$CantLlegadoos = $_POST['cant_llegados'];

$Resultado = $CantHabidos + $CantLlegadoos;
echo $Resultado;

$query = "UPDATE `producto` SET `cant_prod` = '$Resultado' WHERE `producto`.`id_prod` = $ID AND `producto`.`idsl_proFK` = 5";
$resultado=mysqli_query($con, $query) or die ("error");
?>