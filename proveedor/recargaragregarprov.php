<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=pruebaformulario.php">
<?php

$con=mysqli_connect('localhost','root','','fenixx');
 
$revisar = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['imagen']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
	}
 
 if (isset($_POST["nombre"], $_POST["ciudad"], $_POST["dir1"], $_POST["dir2"], $_POST["dir3"], $_POST["dir4"], $_POST["telefono"], $_POST["correo"], $_POST["est"]) and $_POST["nombre"] !="" and $_POST["ciudad"]!="" and $_POST["dir1"]!="" and $_POST["dir2"] !="" and $_POST["dir3"] !="" and $_POST["dir4"] !="" and $_POST["telefono"] !="" and $_POST["correo"] !="" and $_POST["est"] !=""){

  $nom = $_POST['nombre'];
        $ciu = $_POST['ciudad'];
        $dir1 = $_POST['dir1'];
        $dir2 = $_POST['dir2'];
        $dir3 = $_POST['dir3'];
        $dir4 = $_POST['dir4'];
        $dirCom = $dir1.' '.$dir2.' # '.$dir3.' - '.$dir4;
        $tel = $_POST['telefono'];
        $email = $_POST['correo'];
        $est = $_POST['est'];
		
		$msqli ="INSERT INTO proveedor VALUES('','$nom','$ciu','$dirCom','$tel','$email','$imgContenido','$est')";

        $resultado = mysqli_query($con,$msqli) or die("error");

} else {

echo '<p>Por favor, complete el <a href="pruebaformulario.php">formulario</a></p>';
}

?>