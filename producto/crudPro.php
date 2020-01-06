<?php
include("../plantillas/plantilla.php");
?>
<form action="aggSL.php" method="POST">
	<div class="SL">
		<table>
			<tr>
				<td>
					<table class="aggSL">
						<thead>
							<th colspan="2">
								<font>Formulario para agregar Sub Categorias</font>
							</th>
			</tr>
			</thead>
			<tr>
				<td>
					Selecciona una Categoria
				</td>
				<td>
					<select name="idLin" id="">
						<?php
						$sql1 = "select * from linea_producto";
						$rs1 = mysqli_query($con, $sql1);
						while ($mosLin = mysqli_fetch_array($rs1)) {
							?>
							<option value="<?php echo $mosLin['id_lpro'] ?>">
								<?php
									echo $mosLin['des_lpro'];
									?>
							</option>

						<?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Escriba nombre de sublinea
				</td>
				<td>
					<input type="text" name="nomSL" required id="">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Agregar">
				</td>
			</tr>
		</table>
		</td>
		<td>
</form>
<div class="cajaSL">
	<table class="listSL">
		<thead>
			<tr>
				<th>
					id Linea
				</th>
				<th>
					id Sub Linea
				</th>
				<th>
					nombre de Sub Linea
				</th>
				<th colspan="2">
					Acciones
				</th>
			</tr>
		</thead>
		<?php
		$sql2 = "select * from sub_linea_producto";
		$rs = mysqli_query($con, $sql2);
		while ($mosSL = mysqli_fetch_array($rs)) { ?>
			<tr>
				<td><?php echo $mosSL['id_lpro1_FK'] ?></td>
				<td><?php echo $mosSL['id_slpro'] ?></td>
				<td><?php echo $mosSL['des_slpro'] ?> </td>
				<td><a href="editandoSL.php?id=<?php echo $mosSL['id_slpro'] ?>">Editar</a></td>
				<td><a onclick="return ConfirmDelete()" href="dltSubLinea.php?id=<?php echo $mosSL['id_slpro'] ?>">Eliminar</a></td>
			</tr>
		<?php } ?>
		</td>
		</tr>
	</table>
</div>
</table>
</div>
<Form action="aggProd.php" method="POST" enctype="multipart/form-data">
	<table class="tabAggProd">
		<thead>+
			<th colspan="6">
				<font>añadir un producto</font>
			</th>
		</thead>
		<tr>
			<td>imagen</td>
			<td>nombre</td>
			<td>descripcion</td>
			<td>marca</td>
			<td>cantidad</td>
			<td>SubCategoria</td>
		</tr>
		<tr>
			<td rowspan="3"><input type="file" name="imgProd" id=""> </td>
			<td><input type="text" name="nomb_prod" id="" required></td>
			<td><input type="text" name="desc_prod" id=""></td>
			<td><input type="text" name="marc_prod" id=""></td>
			<td><input type="number" name="cant_prod" id=""></td>
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
			<td>Precio de Compra:</td>
			<td>Precio de Bruto</td>
			<td colspan="2" rowspan="2"><input type="submit" value="Añadir"></td>
		</tr>
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
		<td><input type="number" name="preC_prod" id=""></td>
		<td><input type="number" name="preB_prod" id=""></td>
		</tr>
	</table>
</Form>
<table class="listProd">
	<thead>
		<th colspan="14">Tabla de los productos</th>
	</thead>
	<thead>
		<th>id</th>
		<th>imagen</th>
		<th>nombre</th>
		<th>descripcion</th>
		<th>marca</th>
		<th>cantidad</th>
		<th>SubCategoria</th>
		<th>Proveedor</th>
		<th>Precio de Compra</th>
		<th>Precio de Venta</th>
		<th>Precio de Bruto</th>
		<th colspan="2">Opciones</th>
	</thead>
	<?php
	$sql3 = "select * from Producto";
	$rs = mysqli_query($con, $sql3);
	while ($mosPr = mysqli_fetch_array($rs)) { ?>
		<tr>
			<td><?php echo $mosPr['id_prod'] ?></td>
			<td><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($mosPr['img_prod']); ?>" /></td>
			<td><?php echo $mosPr['nomb_prod'] ?></td>
			<td><?php echo $mosPr['desc_prod'] ?></td>
			<td><?php echo $mosPr['marc_prod'] ?></td>
			<td><?php echo $mosPr['cant_prod'] ?></td>

			<td><?php $sqlslp = "SELECT * from sub_linea_producto WHERE id_slpro=$mosPr[idsl_proFK]";
					$result1 = mysqli_query($con, $sqlslp);
					$mostrar1 = mysqli_fetch_array($result1);
					echo $mostrar1['des_slpro'] ?></td>
			<td><?php $sqlp = "SELECT * from proveedor WHERE id_prov=$mosPr[prov_prodFK]";
					$result2 = mysqli_query($con, $sqlp);
					$mostrar2 = mysqli_fetch_array($result2);
					echo $mostrar2['nom_prov'] ?></td>
			<td><?php echo $mosPr['Pre_Compra'] ?></td>
			<td><?php echo $mosPr['Pre_neto'] ?></td>
			<td><?php echo $mosPr['Pre_Bruto'] ?></td>
			<td><a href="editandoProd.php?id=<?php echo $mosPr['id_prod'] ?>">Editar</a></td>
			<td><a onclick="return ConfirmDelete()" href="dltProd.php?id=<?php echo $mosPr['id_prod'] ?>">Eliminar</a></td>
		</tr>

	<?php } ?>
	<script type="text/javascript">
		function ConfirmDelete() {
			var respuesta = confirm("Una vez borrado el registro no puedes recuperarlo estas seguro?");
			if (respuesta == true) {
				return true;
			} else
				return false;
		}
	</script>
</table>
<?php
include("../plantillas/piePagina.php");
?>