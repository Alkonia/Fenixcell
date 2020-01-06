<?php
include("../plantillas/plantilla.php");
?>

<table align="left" style="width: 600px; height: 300px; padding: 120px 12px 12px 120px;background-color:white">
	<thead>
		<th>Reparacion</th>
	</thead>
	<td>
		<img src="../Diseño/imagenes/servicios2.png" style="size: 500px; width: 300px">
	</td>
	<tr>
		<td style="text-align: justify;">
			<p>Al traernos tu equipo con problemas de software o hardware nuestro equipo de tecnicos se encargaran de mejorarlo en le menor tiempo posible.</p>
			<a href="añadirConsultaRep.php"> <input type="button" value="Enviar consulta"> </a>
		</td>
	</tr>
</table>
<table align="right" style="width: 600px; height: 300px; padding: 120px 120px 12px 12px;background-color:white">
	<thead>
		<th>Mantenimiento</th>
	</thead>
	<td><img src="../Diseño/imagenes/servicios1.png" style="size: 500px; width: 300px"></td>
	<tr>
		<td style="text-align: justify;">
			<p>SI deseas optimizar tu equipo, limpiandolo tanto interna como extremadamente, e incluyenco mejoras de software incluso actualizaciones.</p>
			<a href="añadirConsultaMan.php"> <input type="button" value="Enviar consulta"> </a>
		</td>
	</tr>
</table>
<?php
include("../plantillas/piePagina.php");
?>