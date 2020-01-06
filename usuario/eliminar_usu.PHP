<?php
$server = "localhost";
$user = "root";
$contraseña = "";
$db = "fenixx";
$con = mysql_connect($server,$user,$contraseña) or die ("Error al conectar el servidor");
?>









<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Eliminar</title>
</head>
<body>
<form action="eliminar.php" method="post">
<input type="text" name="codigo" placeholder="ingrese codigo a eliminar">
<input type="submit" name="name" value="Eliminar">
</form>
</body>
</html>






<?php
include ("con.php");
$id_usu = $_POST['id_usu'];
mysql_select_db($db,$con) or die ("Error al conectar la base de datos");
mysql_query("DELETE FROM datos WHERE id_usu = $id_usu");
echo "Eliminado Correctamente";
?>