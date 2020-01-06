<?php
include("../plantilla.php")
?>

<body>
	<div align="center" style="padding: 6px;">
		<form action="guardar.php" method="POST">
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
						<td><input type="text" name="id"></td>
						<td><input type="text" name="id_slpro"></td>
						<td><textarea name="desc_prod" rows="4" cols="30"></textarea></td>
						<td><input type="text" name="vlr_prod"></td>
						<td><input type="text" name="can_prod"></td>
						<td><input type="submit" name="enviar" value="Enviar"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div align="center" style="padding: 6px;">
		<table style="caption-side: top;" border="2">
			<caption>Productos Ingresados</caption>
			<thead>
				<th>Id</th>
				<th>Id sublinea</th>
				<th>Descripcion</th>
				<th>Valor</th>
				<th>Cantidad</th>
				<th>Fecha ingresado</th>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM producto";
				$datos_prod = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($datos_prod)) { ?>

					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['id_slpro']; ?></td>
						<td><?php echo $row['desc_prod']; ?></td>
						<td><?php echo $row['vlr_prod']; ?></td>
						<td><?php echo $row['can_prod']; ?></td>
						<td><?php echo $row['fecha']; ?></td>
						<td><a href="editar.php?id=<?php echo $row['id'] ?>"><input type="button" name="editar" value="Editar"></a><a href="eliminar.php?id=<?php echo $row['id'] ?>"><input type="button" name="eliminar" value="Eliminar"></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

</html>