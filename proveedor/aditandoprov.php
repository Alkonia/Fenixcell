<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=verprov.php">
<?php
$con = mysqli_connect("localhost", "root", "", "fenixx");
$revisar = getimagesize($_FILES["imagen"]["tmp_name"]);
if ($revisar !== false) {
	$image = $_FILES['imagen']['tmp_name'];
	$imgContenido = addslashes(file_get_contents($image));
}
$id = $_GET['id_prov'];
$nom = $_POST['nombre'];
$ciu = $_POST['ciudad'];
$dir1 = $_POST['dir1'];
$dir2 = $_POST['dir2'];
$dir3 = $_POST['dir3'];
$dir4 = $_POST['dir4'];
$dirCom = $dir1 . ' ' . $dir2 . ' # ' . $dir3 . ' - ' . $dir4;
$tel = $_POST['telefono'];
$email = $_POST['email'];
$est = $_POST['est'];

$coro = "update proveedor set
				nom_prov = '$nom',
				id_ciu1_FK = '$ciu',
				dir_prov = '$dirCom',
				tel_prov = '$tel',
				ema_prov ='$email',
				img_prov='$imgContenido',
				id_est4_FK ='$est' WHERE id_prov='$id'";
$result = mysqli_query($con, $coro);
?>