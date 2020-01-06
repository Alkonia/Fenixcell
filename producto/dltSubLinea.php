<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=crudPro.php">
<?php
$con = mysqli_connect("localhost", "root", "", "fenixx");
$id = $_GET['id'];
$sql = "delete from sub_linea_producto where id_slpro ='" . $id . "'";
$rs = mysqli_query($con, $sql); 
?>