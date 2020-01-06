<?php
include("../plantilla.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "DELETE FROM producto WHERE id = $id";
	$eliminado=mysqli_query($con, $query);
	if (!$eliminado) {
		die("Query failed");
	}
	header("Location: producto.php");
}
?>