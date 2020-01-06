<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=crudPro.php">
<?php
$con=mysqli_connect("localhost","root","","fenixx");
    $idLin = $_POST['idLin'];
	$nomSl=$_POST['nomSL'];
	$sql="INSERT INTO sub_linea_producto VALUES('','$idLin','$nomSl')";
	$resultado=mysqli_query($con,$sql) or die('Error en el query data base');
?>