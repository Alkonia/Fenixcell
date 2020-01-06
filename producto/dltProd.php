<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=crudPro.php">
<?php
$con = mysqli_connect("localhost", "root", "", "fenixx");
$id = $_GET['id'];
$sql = "delete from producto where id_prod ='" . $id . "'";
$resultado = mysqli_query($con, $sql);
?>