<?php
$con = mysqli_connect("localhost", "root", "", "fenixx");
$id = $_GET['id'];
$sql = "select * from sub_linea_producto where id_slpro ='" . $id . "'";
$resultado = mysqli_query($con, $sql);
while ($fila = mysqli_fetch_array($resultado)) {
	?>
	<div>
		<form action="editSL.php" method="POST">
			<select name="idLin" id="">
				<?php
					$conj1 = "select * from linea_producto";
					$rs1 = mysqli_query($con, $conj1);
					while ($most = mysqli_fetch_array($rs1)) {
						?>
					<option value="<?php echo $most['id_lpro'] ?>">
						<?php
								echo $most['des_lpro'];
								?>
					</option>
				<?php
					}
					?>
			</select>
			<input type="hidden" name="idsl" value="<?php echo $id ?>">
			<font> Linea Sub Linea</font>
			<input type="text" name="nomslNueva" id="" value="<?php echo $fila['des_slpro'] ?>">
			<input type="submit" value="Actualizar">
		</form>
	</div>
<?php } ?>