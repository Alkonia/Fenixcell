<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=crudPro.php">
<?php
$con = mysqli_connect("localhost", "root", "", "fenixx");
$idsl = $_POST['idsl'];
$idLinea = $_POST['idLin'];
$nomsl = $_POST['nomslNueva'];
$sql2 = "update sub_linea_producto set id_lpro1_FK = '$idLinea',des_slpro ='$nomsl' where id_slpro ='$idsl'";
$resultado = mysqli_query($con, $sql2);
?>