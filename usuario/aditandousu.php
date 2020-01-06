<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=../plantillas/Perfil_De_Usuario.php">
<?php
$con = mysqli_connect("localhost", "root", "", "fenixx");
$revi = getimagesize($_FILES["imagen_usu"]["tmp_name"]);
    if($revi !== false){
        $imag = $_FILES['imagen_usu']['tmp_name'];
        $imgCont = addslashes(file_get_contents($imag));
	}
		$id = $_GET['id_usu'];
		$nom = $_POST['nom_usu'];
		$seg_nom = $_POST['seg_nom_usu'];
		$ape = $_POST['ape_usu'];
		$ape2 = $_POST['seg_ape_usu'];
		$tipde = $_POST['tide'];
		$numdoc = $_POST['num_doc_usu'];
		$gen = $_POST['gen'];
        $fech = $_POST['fna_usu'];
        $rol = $_POST['rol'];
		$email = $_POST['correo'];
        $clave = $_POST['clave'];
        $dirusu = $_POST['dir_usu'];
        $telusu = $_POST['tel_usu'];
        

			$cor = "update usuario set
				pri_nom_usu = '$nom',
				seg_nom_usu = '$seg_nom',
				pri_ape_usu = '$ape',
				seg_ape_usu	= '$ape2',
				tide = '$tipde',
				num_doc_usu = '$numdoc',
				gen_usu = '$gen',
				fna_usu = '$fech',
				rol = '$rol',
				correo = '$email',
				clave = '$clave',
				dir_usu = '$dirusu',
				tel_usu = '$telusu',
				img_usu = '$imgCont'
 				WHERE id_usu ='$id'";

	$reslt= mysqli_query($con, $cor);
	?>