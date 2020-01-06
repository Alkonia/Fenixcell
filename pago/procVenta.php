<?php
require_once('../cliente/class.pCarrito.php');
require_once("../plantillas/plantilla.php");

$metodo = $_POST['tar'];
$total = $_POST['total'];
$car = $_SESSION["carrito"];
$usuario = $_SESSION['id_usu'];
$fecha = $_POST['fecha'];

$sql="INSERT INTO venta VALUES ('','$fecha','$usuario','$total','$metodo')";
$rs=mysqli_query($con,$sql);

$sqlID="SELECT max(idVenta) FROM venta";
$rsID =mysqli_query($con,$sqlID);
$uID = 0;
while ($id = mysqli_fetch_array($rsID)) {
    $uID = $id[0];
}
foreach ($car as $c) {
    if ($c->can_prod == 0) {
        $c->can_prod = 1;
    }
    $sql2="INSERT INTO detalleventa values ('$uID','$c->id_prod','$c->can_prod')";
    $rs2=mysqli_query($con, $sql2);

}
if($_SESSION['carrito']){ 
    unset($_SESSION['carrito']);
}
?>
<h1>Felicidades por tu compra</h1>