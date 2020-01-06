<?php
include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");
?>
<center>
    <form action="insertarAdministrador.php" method="POST" enctype="multipart/form-data">

		<table border="2">
			<tr>
				<td colspan="5" align="center" class="TituloTabla">
					<h2>REGISTRO ADMINISTRADORES</h2>
			</tr>
			<tr>
				<td>Primer nombre</td>
				<td><input type="text" name="priNom" placeholder="Ingrese primer nombre" required=""></td>
				<td>Segundo nombre </td>
				<td><input type="text" name="segNom" placeholder="Ingrese segundo nombre" required="">
				<td>
			</tr>
			<tr>
				<td>Primer apellido</td>
				<td><input type="text" name="priApe" placeholder="Ingrese primer apellido"></td>
				<td>Segundo apellido</td>
				<td><input type="text" name="segApe" placeholder="Ingrese segundo apellido" required="TE ">
			</tr>
			</tr>
			<tr>
				<td>Subir Imagen</td>
				<td><input type="file" class="form-control" id="image" name="image" multiple></td>
				<td>Correo</td>
				<td><input type="email" name="correo" placeholder="ejemplo@gmail.com" required=""></td>
			</tr>
			<tr>
				<td>Documento
				<td>
					<select name="tipIde">
						<option values="Cedula">C.C </option>
						<option values="Tarjeta de identidad">T.I </option>
						<option values="Cedula de extranjería">C.E</option>
						<option values="Pasaporte">P.S</option>
					</select>
					<input type="number" name="DNI" placeholder="Documento" required=""></td>
				</td>
				<td>Fecha de nacimiento</td>
				<td><input type="date" name="fecNac" required=""></td>

			</tr>
			<td>Contraseña</td>
			<td><input type="password" name="clave" required="" placeholder="Ingrese su contraseña"></td>
			<td>Repita su contraseña</td>
			<td><input type="password" name="clave1" required="" placeholder="Repita su contraseña"></td>
			<tr>
				<td>Dirección</td>
				<td><select name="dir1" id="">
						<option value="carrera">Cra</option>
						<option value="avenida">Av</option>
						<option value="calle">Cll</option>
						<option value="transversal">Tr</option>
						<option value="diagonal">Dg</option>
					</select>
					<input type="text" size="1" name="dir2">
					<font> # </font>
					<input type="text" size="1" name="dir3">
					<font> - </font>
					<input type="text" size="1" name="dir4">
				</td>
				<td>Contacto</td>
				<td><input type="number" name="tel" placeholder="Movil o Fijo" required=""></td>
			</tr>
			<tr>
				<td>Genero
				<td><select name="gen">
						<option values="Masculino">Masculino</option>
						<option values="Femenino">Femenino</option>
						<option values="Otro">Prefiero no especificar</option>
					</select></td>
				</td>

				<td><input type="submit" name="insert" value="Insertar"></td>
				<td><input type="reset" name="reset" value="Limpiar"></td>
		</table>
	</form>
</center>
<?php
include("../plantillas/piePagina.php");
?>