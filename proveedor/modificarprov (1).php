<?php
$con=mysqli_connect('localhost','root','','fenixx');

if (isset($_GET['id_prov'])) {
		$id = $_GET['id_prov'];
		$query = "SELECT * FROM proveedor WHERE id_prov = $id";
		$edit = mysqli_query($con, $query);
		if (mysqli_num_rows($edit) == 1) {
			$row = mysqli_fetch_array($edit);
			$nom = $row['nombre'];
			echo $nom;
		}
	}
?>