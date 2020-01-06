<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../index/index.php">
<?php

$revisar = getimagesize($_FILES["image"]["tmp_name"]);
if ($revisar !== false) {
	$image = $_FILES['image']['tmp_name'];
	$imgContenido = addslashes(file_get_contents($image));
}
$con = mysqli_connect("localhost", "root", "", "fenixx");

$priNom = $_POST['priNom'];
$segNom = $_POST['segNom'];
$priApe = $_POST['priApe'];
$segApe = $_POST['segApe'];
$cor = $_POST['correo'];
$DNI = $_POST['DNI'];
$tipIde = $_POST['tipIde'];
$dir1 = $_POST['dir1'];
$dir2 = $_POST['dir2'];
$dir3 = $_POST['dir3'];
$dir4 = $_POST['dir4'];
$dirCom = $dir1 . ' ' . $dir2 . ' # ' . $dir3 . ' - ' . $dir4;
$gen = $_POST['gen'];
$fecNac = $_POST['fecNac'];
$tel = $_POST['tel'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$clave1 = $_POST['clave1'];


function buscarepe($con, $DNI)
{
	$sql = "SELECT * from usuario 
	where num_doc_usu='DNI'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		return 1;
	} else {
		return 0;
	}
}
if (buscarepe($con, $DNI) == 1) {
	echo "El usuario ya esta registrado";
} else {
	//Este es una formula para crear la direccion ya que el formulario se hizo separado
	//Aqui se declara un Si para validar las contraseñas
	if ($clave != $clave1) {
		echo "Las contraseñas no coinciden!!!";
	}
	//Aqui se declara un else para iniciar el proceso en caso de que las contraseñas sean correctas
	else {
		//Las contraseñas se encritan con md5
		$clave2 = md5($clave1);
		//Se insertan las variables dentro de la base de datos

		$insertar = "INSERT INTO usuario VALUES('','$priNom','$segNom','$priApe','$segApe','$tipIde','$DNI','$gen','$fecNac','1','$correo','$clave2','$dirCom','$tel','$imgContenido','1')";

		//En caso de un error en la base de datos query mostrar este mensaje
	}
}



$ejecutar = mysqli_query($con, $insertar) or die("Hubo un error");

$titulo    = 'Registro Fenixcell';
$mensaje   = 'Su Registro como cliente ha sido exitoso'."\r\n".'su contraseña es'."$clave2";
$cabeceras = 'From: fenixcellrep@gmail.com' . "\r\n" .
    'Reply-To: fenixcellrep@gmail.com' . "\r\n";

mail($correo, $titulo, $mensaje, $cabeceras);
?>
?>