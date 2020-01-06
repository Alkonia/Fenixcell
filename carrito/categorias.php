<?php
require_once("../plantillas/plantilla.php");
?>
<table>
	<?php
	$i = 1;
	$link = mysqli_connect("localhost", "root", "", "Fenixx");
	foreach ($link->query('SELECT * from Linea_producto') as $row) {
		$Linea[$i] =  $row['des_lpro'];
		$i++;
	}
	?>
	<table class=cate>
		<thead>
			<th colspan="3">
				<a href="">TODOS LOS PRODUCTOS</a>
			</th>
		</thead>
		<tr>
			<td>
				<a href="productos.php?linea"><img src="imagenes/categorias/cate1.jpg" alt=""> <br>
					<font><?php echo $Linea[1] ?></font>
				</a>
			</td>
			<td>
				<a href=""><img src="imagenes/categorias/cate2.jpg" alt=""> <br>
					<font><?php echo $Linea[2] ?></font>
				</a>
			</td>
			<td>
				<a href=""><img src="imagenes/categorias/cate3.jpg" alt=""> <br>
					<font><?php echo $Linea[3] ?></font>
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href=""><img src="imagenes/categorias/cate4.jpg" alt=""> <br>
					<font><?php echo $Linea[4] ?></font>
				</a>
			</td>
			<td>
				<a href=""><img src="imagenes/categorias/cate5.jpg" alt=""> <br>
					<font><?php echo $Linea[5] ?></font>
				</a>
			</td>
			<td>
				<a href=""><img src="imagenes/categorias/cate6.jpg" alt=""> <br>
					<font><?php echo $Linea[6] ?></font>
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href=""><img src="imagenes/categorias/cate7.jpg" alt=""> <br>
					<font><?php echo $Linea[7] ?></font>
				</a>
			</td>
			<td>
				<a href=""><img src="imagenes/categorias/cate8.jpg" alt=""> <br>
					<font><?php echo $Linea[8] ?></font>
				</a>
			</td>
			<td>
				<a href=""><img src="imagenes/categorias/cate9.jpg" alt=""> <br>
					<font><?php echo $Linea[9] ?></font>
				</a>
			</td>
		</tr>
	</table>
	</div>
	</body>
	<?php
	include("../plantillas/piePagina.php");
	?>