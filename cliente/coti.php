<?php
require_once('class.pCarrito.php');
require_once("../plantillas/plantilla.php");
//SI LA SESSION CARRITO EXISTE MOSTRARA CUANTOS ARTICULOS HAY
if (isset($_SESSION["carrito"])) {
    $car = $_SESSION["carrito"];
    $TOTAL = 0;
    #se crea el formulario cotizacion
    ?><center>
        <form action="../pago/pago.php" method="post">
        <table class="listProd">
        <?php
        #i es un indice el cual sirve de guia para saber el numero del objeto en la posicion del carrito
        $i=0;
            #este forech mostrara los elementos guardados en $car y los mostrara en una variable llamada c
            foreach ($car as $c) {
                    echo "<br>";
                    #creo una sentencia que me mostrar el producto segun el id guarado en el arreglo
                    $sql = "SELECT * FROM producto where id_prod ='$c->id_prod'";
                    $rs = mysqli_query($con, $sql);
                    #con este while muestro la sentencia anterior
                    while ($mosP = mysqli_fetch_array($rs)) { ?>
                    <tr>
                        <td rowspan="4"> <img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($mosP['img_prod']); ?>" /> </td>
                        </tr><tr>
                        <td> Producto : <?php echo $mosP['nomb_prod'] ?></td>
                        </tr><tr>
                        <td> precio : <?php echo $mosP['Pre_Bruto'] ?></td>
                        </tr><tr>
                        <td align="right"> precio + iva : $ <?php echo $mosP['Pre_neto'] ?></td>
                        </tr><tr>
                        
                            <tr>
                                <!--Este link me envia el indice a una pagina por si deseo eliminar el 
                            producto del carrito de compras-->
                                <td><a href="dltPCar.php?i=<?php echo $i ?>">Eliminar del carrito</a></td>
                            </tr>
                            <?php 
                            #el indice se ira aumentando conforme se van mostrando los objetos del carrito
                            $i++; 
                            ?>
                        <?php 
                        #si la cantiidad de productos es mayor a cero entonces se multiplicara el precio por la cantidad
                        if ($c->can_prod > 0) { ?>
                            <td> precio subtotal: <?php echo $subTotal = ($mosP['Pre_neto'] * $c->can_prod) ?> </td>
                        <?php
                        
                        #esto lo hice para solucionar un bug que me generaba al agregar un producto sin introducir que cantidad era
                        #toma por defecto que sera 1 cuando exista el id sin la cantidad
                                    } else {
                                        $subTotal = $mosP['Pre_neto'];
                                    } ?>
                        <?php 
                        #el tipico total antes de que se cierre el ciclo donde se suman los subtotales
                        $TOTAL = $TOTAL + $subTotal; ?>

                    </tr>
                <?php } ?>

        <?php
        $c->tot_carr = $TOTAL;
            }
        }
        ?>
        <tr>
            <!-- Aqui se muestra el total -->
            <td colspan="5" align="right">
            precio total =  <?php echo $TOTAL ?>
            <input type="hidden" name="total" value=" <?php echo $TOTAL ?>" id="">
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <!-- AQUI VA EL API PARA PAGAR -->
                <input type="submit" value="PAGAR">
               
            </td>
        </tr>
        </table>
        </form>
    </center>
    <?php
    include("../plantillas/piePagina.php");
    ?>