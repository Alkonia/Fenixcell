<?php
require_once('class.pCarrito.php');

$c = new carrito;
$c->id_prod = $_POST['id'];
$c->can_prod = $_POST['cant'];

session_start();
if (isset($_SESSION['carrito'])) {
    $car = $_SESSION['carrito'];
} else {
    $car = array();
}
array_push($car, $c);
$_SESSION["carrito"] =  $car;
header("Location:carrito.php");
