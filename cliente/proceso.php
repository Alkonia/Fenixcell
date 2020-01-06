
<?php
#Este es el proceso que mete productos al carrito

#Requiero la clase productos del carrito(pCarrito)
require_once('class.pCarrito.php');
#Creo un objeto llamado C con la clase carrito

#-este objeto me guardara momentaneamente el id del producto y la cantidad del produccto que estoy metiendo al carrito
$c = new carrito;
$c->id_prod=$_POST['id'];
$c->can_prod=$_POST['cant'];
#inico la sesion
session_start();

#Si existe sesion [Carrito] la variable $car sera igual a la sesion
#lo que se traduce que si existe la variable $car es por existen objetos en el carrito
if(isset($_SESSION['carrito'])){
    $car = $_SESSION['carrito'];
}else{
    #Esto se crea antes de que se inicie la sesion carrito
    #es decir la variable $car sera un array la cual guardara todos los objetos del carrito
    $car = array();
}
#Array push toma los objetos de la variable c y los va agregando como ultimos en la fila del arreglo $car
array_push($car, $c);
#se aclara que la sesion [carrito] se iniciara una vez exista car, es decir que mientras $car tenga elementos la sesion estara activa
$_SESSION["carrito"] =  $car;
header("Location:productos.php");
?>
