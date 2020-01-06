<?php
include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");
?>
<CENTER>
	<H1> LISTA DE REPORTES</H1>
</CENTER>
<!--Para añadir un nuevo reporte-->
<div class="btns" id="div1">
<a href="añadirReporte.php"><input type="button" value="Añadir reporte" id="bt2"></a></div>

<center>
	<table border="1" cellpadding="10px" font-family:Arial style="border-radius: 0px; border-color: black;">
		<?php
		//Comienza el proceso para mostrar todos los reportes
		// Los ordena bajo la fecha de creación
		$sql = "SELECT * from reporte ORDER BY fec_rep";
		$result = mysqli_query($con, $sql);
		if ($result == "") {
			//Situación en caso que no haya reportes
			echo "No hay reportes";
		} else {
			while ($mostrar = mysqli_fetch_array($result)) {
				if ($mostrar['estado'] == 1) {


					?>
					<tr>
						<td>
							<h2>Fecha</h2>
						</td>
						<td>
							<h2>Asunto</h2>
						</td>
						<td>
							<h2>Descripcion</h2>
						</td>
						<td>
							<h2>Tipo de reporte</h2>
						</td>
						<td>
							<h2>Cambiar</h2>
						</td>
					</tr>
					<tr>
						<!--Se muestran los valores de la base de datos-->
						<?php $mostrar['id_rep'] ?>
						<td><?php echo $mostrar['fec_rep'] ?></td>
						<td><?php echo $mostrar['mot_rep'] ?></td>
						<td style="width: 400px"><?php echo $mostrar['des_rep'] ?></td>
						<td><?php echo $mostrar['tip_rep'] ?></td>

						
						<td><div class="btns" align="center" id="div1"><a href="eliminarReporte.php?id_rep=<?php echo $mostrar['id_rep'] ?>"><input type="button"  id="bt4" value="Eliminar"></a>
							<a href="modificarReporte.php?id_rep=<?php echo $mostrar['id_rep'] ?>"><input type="button" id="bt4" value="Modificar"></a></div></td>
						<br>
					</tr>
		<?php
				}
			}
		}
		?>
	</table>
</center>
<?php
include("../plantillas/piePagina.php");
?>