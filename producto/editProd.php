<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=crudPro.php">
<?php
$con = mysqli_connect("localhost", "root", "", "fenixx");

$id = $_GET['id'];
$revisar = getimagesize($_FILES["imgProd"]["tmp_name"]);
if($revisar !== false){
    $image = $_FILES['imgProd']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($image));
}

$nombProd = $_POST['nomb_prod'];
$descProd = $_POST['desc_prod'];
$marcProd = $_POST['marc_prod'];
$cantProd = $_POST['cant_prod'];
$sublProd = $_POST['subl_prod'];
$provProd = $_POST['prov_prod'];
$preCprod = $_POST['preC_prod'];
$preBprod = $_POST['preB_prod'];
$ivaProd = $preBprod * 0.19;
$preVprod = $preBprod + $ivaProd;
$sql2 = "update producto set img_prod = '$imgContenido',
    nomb_prod = '$nombProd',desc_prod = '$descProd',marc_prod = '$marcProd',
    cant_prod = '$cantProd',idsl_proFK = '$sublProd',prov_prodFK = '$provProd',
    Pre_Compra = '$preCprod',Pre_neto = '$preVprod',Pre_Bruto = '$preBprod' where id_prod='$id'";
$resultado = mysqli_query($con, $sql2);
?>