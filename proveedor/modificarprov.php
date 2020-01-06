<?php
include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");

$id = $_GET['id_prov'];
$asd = "SELECT * FROM proveedor where id_prov=$id";
$rs = mysqli_query($con, $asd);
while ($mosProv = mysqli_fetch_array($rs)) { ?>
	<form action="aditandoprov.php?id_prov=<?php echo $mosProv['id_prov'] ?>" method="POST" enctype="multipart/form-data">
		<table border="2">
			<caption> Modifique el proveedor </caption>
			<tr>
				<td>nombre</td>
				<td>ciudad</td>
				<td>Nomenclatura</td>
				<td>via principal</td>
				<td>via complementaria</td>
				<td>via secuandaria</td>
				<td>telefono</td>
				<td>correo</td>
				<td>imagen</td>
				<td>estado</td>
			</tr>
			<tr>
				<td><input type="text" name="nombre" value="<?php echo $mosProv['nom_prov'] ?>" id=""></td>
				<td><select name="ciudad" id="">
						<?php
							$kha = "SELECT * FROM ciudad";
							$rs2 = mysqli_query($con, $kha);
							while ($datos = mysqli_fetch_array($rs2)) {
								?>
							<option value="<?php echo $datos['id_ciu'] ?>"> <?php echo $datos['nom_ciu'] ?> </option>
						<?php
							}
							?>
					</select></td>
				<td><select name=dir1 value="<?php echo $dir1; ?>" id="">
						<option>'seleccionar'</option>
						<option>avenida</option>
						<option>carrera</option>
						<option>calle</option>
						<option>pasaje</option>
					</select></td>
				<td><input type="text" name=dir2 value="" id=""></td>
				<td><input type="text" name=dir3 value="" id=""></td>
				<td><input type="text" name=dir4 value="" id=""></td>
				<td><input type="text" name=telefono value="<?php echo $mosProv['tel_prov'] ?>" id="">
				<td><input type="text" name=email value="<?php echo $mosProv['ema_prov'] ?>" id=""></td>
				<td><input type="file" name=imagen id=""> </td>
				<td><select name=est id="">
						<?php
							$khe = "SELECT * FROM estado";
							$rs3 = mysqli_query($con, $khe);
							while ($dat = mysqli_fetch_array($rs3)) {
								?>
							<option value="<?php echo $dat['id_est'] ?>"> <?php echo $dat['desc_est'] ?> </option>

						<?php
							}
							?>
					</select></td>
				<td><input type="submit" name="editar" value="Editar"></td>
			</tr>
			</tbody>
		</table>
	</form>
<?php
}
include("../plantillas/piePagina.php");
?>