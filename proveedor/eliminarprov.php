<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=verprov.php">
<?php
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
if (isset($_GET['id_prov'])) {
	$eli = $_GET['id_prov'];
	$query = "DELETE FROM proveedor WHERE id_prov = $eli";
	$eliminado = mysqli_query($con, $query);
	if (!$eliminado) {
		die("Query failed");
	}
	header("Location: verprov.php");
}

?>