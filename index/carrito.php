<?php 

foreach ($_POST as $clave => $valor) {
    $_SESSION['carrito'][$clave] = $valor;
    }
$mensaje="";
if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'agregar':
            if (is_numeric(openssl_decrypt( $_POST['id'],COD,KEY))) {
                $ID=openssl_decrypt( $_POST['id'],COD,KEY);
                $mensaje = "OK el id correcto".$ID;
                
            }else{

                $mensaje = "OK el id es incorrecto".$ID;
            }
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE= openssl_decrypt($_POSt['nombre'],COD,KEY);
            }else {
                $mensaje=" algo pasa con el nombre";    break;
            }
            if (is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'],COD,KEY);

            } else {
                $mensaje="algo va mal con la cantidad";  break;
            }
            if (is_numeric(openssl_decrypt($_POST['precio']))) {
                $PRECIO = openssl_decrypt($_POST['precio']);
                
            } else {
                $mensaje = "algo va mal con el precio";  break;
            }
        
            session_start();
    if (!isset($_SESSION['carrito'])) {
        $producto= array(
       'ID'=>$ID, 
       'NOMBRE'=>$NOMBRE,
       'CANTIDAD'=>$CANTIDAD,        
       'PRECIO'=>$PRECIO
    );
    $_SESSION['carrito'][0]=$producto;       
    }else {
        $numeroProductos = count($_SESSION['carrito']);
        $producto= array(
            'ID'=>$ID, 
            'NOMBRE'=>$NOMBRE,
            'CANTIDAD'=>$CANTIDAD,        
            'PRECIO'=>$PRECIO
         );
         $_SESSION['carrito'][$numeroProductos]=$producto;
    }
    $mensaje=print_r($_SESSION,true);
    break;
 }
}


?>