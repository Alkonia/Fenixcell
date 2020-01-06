<?php
error_reporting(E_ALL ^ E_NOTICE);
include("../plantilla.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM producto WHERE id= $id";
	$editado = mysqli_query($con, $query);
	if (mysqli_num_rows($editado) == 1) {
		$row = mysqli_fetch_array($editado);
		$id = $_POST['id'];
		$id_slpro = $_POST['id_slpro'];
		$desc_prod = $_POST['desc_prod'];
		$vlr_prod = $_POST['vlr_prod'];
		$can_prod = $_POST['can_prod'];
	}
}
if (isset($_POST['editar'])) {
	$id = $_GET['id'];
	$id_slpro = $_POST['id_slpro'];
	$desc_prod = $_POST['desc_prod'];
	$vlr_prod = $_POST['vlr_prod'];
	$can_prod = $_POST['can_prod'];

	$query =  "UPDATE producto set id_slpro = '$id_slpro' , desc_prod = '$desc_prod', vlr_prod = '$vlr_prod',can_prod = '$can_prod' WHERE id=$id";
	mysqli_query($con, $query);
	header("Location: producto.php");
}
?>
<form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
	<table style="caption-side: top;" border="2">
		<caption> Ingrese productos </caption>
		<thead>
			<th>Id</th>
			<th>Id sublinea</th>
			<th>Descripcion</th>
			<th>Valor</th>
			<th>Cantidad</th>
		</thead>
		<tbody>
			<tr>
				<td><input type="text" name="id" value="<?php echo $id; ?>"></td>
				<td><input type="text" name="id_slpro" value="<?php echo $id_slpro; ?>"></td>
				<td><textarea name="desc_prod" rows="4" cols="30"></textarea><?php echo $desc_prod; ?></td>
				<td><input type="text" name="vlr_prod" value="<?php echo $vlr_prod; ?>"></td>
				<td><input type="text" name="can_prod" value="<?php echo $can_prod; ?>"></td>
				<td><input type="submit" name="editar" value="Editar"></td>
			</tr>
		</tbody>
	</table>
</form>