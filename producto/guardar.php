<?php
include("../plantilla.php");

if (isset($_POST['enviar'])) {
	$id=$_POST['id'];
	$id_slpro=$_POST['id_slpro'];
	$desc_prod=$_POST['desc_prod'];
	$vlr_prod=$_POST['vlr_prod'];
	$can_prod=$_POST['can_prod'];

	$query = "INSERT INTO producto (id, id_slpro, desc_prod, vlr_prod, can_prod) VALUES ('$id', '$id_slpro', '$desc_prod', '$vlr_prod', '$can_prod')";
	$datos=mysqli_query($con, $query);
	if (!$datos) {
		die ("Query failed");
	}
	header("Location: producto.php");
}
?>