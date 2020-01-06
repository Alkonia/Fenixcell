<?php
include("../plantillas/plantilla2.php");
$id = $_GET['id'];
$sql3 = "select * from Producto where id_prod=$id";
$rs = mysqli_query($con, $sql3);
while ($mosPr = mysqli_fetch_array($rs)) { ?>
	<Form action="editProd.php?id=<?php echo $mosPr['id_prod'] ?>" method="POST" enctype="multipart/form-data">
		<table class="tabAggProd">
			<thead>
				<th colspan="6">
					<font>añadir un producto</font>
				</th>
			</thead>
			<tr>
				<td rowspan="8"><img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($mosPr['img_prod']); ?>" />
					<br>
					<input type="file" name="imgProd" id=""> </td>
				<td>nombre</td>
				<td><input value="<?php echo $mosPr['nomb_prod'] ?>" type="text" name="nomb_prod" id=""></td>
			<tr>
				<td>descripcion</td>
				<td><textarea name="desc_prod" id="" cols="30" rows="10"><?php echo $mosPr['desc_prod'] ?></textarea></td>
			</tr>
			<tr>
				<td>marca</td>
				<td><input value="<?php echo $mosPr['marc_prod'] ?>" type="text" name="marc_prod" id=""></td>
			</tr>
			<tr>
				<td>cantidad</td>
				<td><input value="<?php echo $mosPr['cant_prod'] ?>" type="number" name="cant_prod" id=""></td>
			</tr>
			<tr>
				<td>SubCategoria</td>
				<td><select name="subl_prod" id="">
						<?php
							$sql6 = "select * from sub_linea_producto";
							$rs1 = mysqli_query($con, $sql6);
							while ($mosSL = mysqli_fetch_array($rs1)) {
								?>
							<option value="<?php echo $mosSL['id_slpro'] ?>">
								<?php
										echo $mosSL['des_slpro'];
										?>
							</option>
						<?php
							}
							?>
					</select></td>
			</tr>
			<tr>
			<td>Proveedor</td>
			<td><select name="prov_prod" id="">
					<?php
						$sql6 = "select * from proveedor";
						$rs1 = mysqli_query($con, $sql6);
						while ($mosSL = mysqli_fetch_array($rs1)) {
							?>
						<option value="<?php echo $mosSL['id_prov'] ?>">
							<?php
									echo $mosSL['nom_prov'];
									?>
						</option>
					<?php
						}
						?>
				</select></td>
			</tr>
			<tr>
			<td>Precio de Compra:</td>
			<td><input value="<?php echo $mosPr['Pre_Compra'] ?>" type="number" name="preC_prod" id=""></td>
			</tr>
			<tr>
			<td>Precio de Bruto</td>
			<td><input value="<?php echo $mosPr['Pre_Bruto'] ?>" type="number" name="preB_prod" id=""></td>
			</tr>
			<tr>
			<td colspan="3" rowspan="2"><input type="submit" value="Actualizar"></td>
			</tr>
			</tr>
		</table>
	</Form>
<?php }
include("../plantillas/piePagina.php");
?>