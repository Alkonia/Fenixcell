<?php
#llamo el indice que viene en la variable i por el metodo GET y lo agrego a una variable llamada $index
$index = $_GET['i'];
#inicio la sesion
session_start();
#llamo la sesion carrito
if(isset($_SESSION["carrito"])){
    $car = $_SESSION['carrito'];
    #borro con un set la variable guarda en el arreglo $car atravez del indice
    unset($car[$index]);
    #Resstructuro los valores de $car para que no queden desordenados
    $car = array_values($car);
    $_SESSION["carrito"] = $car;
    #si el arreglo $car se queda sin objetos se borrara el arreglo
    if(count($car)==0){
        session_unset($car);
    }
}
#me redirige a la cotizacion con el producto eliminado
header("Location:coti.php")
?>