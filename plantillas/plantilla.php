<?php
session_start();
//Esto es una plantilla en donde se va a repetir en todos los include y se va a insertar en cada vez que se coloque.
//Conexion a base de datos
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Fenixcell</title>
	<!-- Conexion al css-->
	<link rel="stylesheet" type="text/css" href="../Diseño/css/fenixcel.css">
	<link rel="icon" type="image/png" href="../Diseño/imagenes/logo-beta.png" sizes="32px">
	<style>
		a {
			color: white;
			text-decoration: none;
		}
	</style>
</head>

<body>
	<!--Banner-->
	<div>
		<table>
			<tr>
				<!--Logo-->
				<td><img src="../diseño/imagenes/logo-beta.png" style="size: 300px" ; width="150"></td>
				<form action="../cliente/productos.php" method="POST">
					<td class="busqueda"><input name="busca" type="text" style="width: 600px; height: 32px;" >&nbsp;<input type="submit" value="Buscar"></td>
					
					
				</form>

				<td>&nbsp;</td>
				<?php
				if (isset($_SESSION['id_usu'])) { ?>
					<td class="Usuario">
					<a class="sesion" href="../plantillas/Perfil_De_Usuario.php"><?php echo $_SESSION['pri_nom_usu']; ?>
						<?php echo $_SESSION['pri_ape_usu']; ?>
						<br>
						<?php if ($_SESSION['rol'] == 1) {
															echo "Cliente";
														} elseif ($_SESSION['rol'] == 2) {

															echo "Empleado";
														} else {

															echo "Administrador";
														}
														?> </a>
						<br>
						<?php if (isset($_SESSION["carrito"])) {
       				 	$car = $_SESSION["carrito"];
       					echo " <a href='../cliente/coti.php'>En carrito:</a> ";
						echo count($car);
						echo "<br>";
    } ?>
						<a class="sesion" id="button" href="../login/cerrar_sesion.php">Cerrar sesion</a>
						<br>
						
													</td>

				<?php
				} else {
					?>
					<td class="">
						<form action="../login/validarlogin.php" method="post">
							<h4>Email: <input type="text" name="user" id=""></h4>
							<h4>Clave: <input type="password" name="password" id=""></h4> <br>
							<h4><input type="submit" value="Log-in" class="login"></h4>
							<!--Boton que redirige a registrarse-->
							<a href="../usuario/añadirCliente.php">
								<h4>Registrarse</h4>
						</form>
					<?php
					}
					?>


					</a>
					</td>
			</tr>
		</table>
	</div>
	<!--Todos los botones sobre -->
	<div class="btns" id="div1" align="center">
		<a href="../index/index.php"><input type="button" id="bt1" value="Inicio"></a>
		<a href="../informacion/quienessomos.php"><input type="button" id="bt2" value="¿Quienes somos?"></a>
		<a href="../cliente/categorias.php"><input type="button" id="bt6" value="Productos"></a>
		<a href="../informacion/servicios.php"><input type="button" id="bt4" value="Servicios"></a>
		<a href="../informacion/contactanos.php"><input type="button" id="bt5" value="Contactanos"></a>
		<?php
		if (isset($_SESSION['id_usu'])) {
			if ($_SESSION['rol'] >= 2) {
				?>
				<a href="../plantillas/admin.php"><input type="button" id="bt1" value="Gestion"></a>
		<?php
			}
		}
		?>
	</div>