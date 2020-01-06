<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=crudPro.php">
<?php
$con=mysqli_connect("localhost","root","","fenixx");
 $revisar = getimagesize($_FILES["imgProd"]["tmp_name"]);
 if($revisar !== false){
	 $image = $_FILES['imgProd']['tmp_name'];
	 $imgContenido = addslashes(file_get_contents($image));
 }
	$nomProd = $_POST['nomb_prod'];
	$descProd = $_POST['desc_prod'];
	$marcProd = $_POST['marc_prod'];
	$cantProd = $_POST['cant_prod'];
	$sublProd = $_POST['subl_prod'];
	$provProd = $_POST['prov_prod'];
	$preCprod = $_POST['preC_prod'];
	$preBprod = $_POST['preB_prod'];
	$ivaProd = $preBprod*0.19;
	$preVprod = $preBprod + $ivaProd;
	$sql="INSERT INTO producto VALUES('','$imgContenido','$nomProd',
	'$descProd','$marcProd','$cantProd','$sublProd','$provProd',
	'$preCprod','$preVprod','$preBprod','1')";
	$resultado=mysqli_query($con,$sql) or die('Error en el query data base');
?>