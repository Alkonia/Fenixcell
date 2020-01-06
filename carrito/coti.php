<?php
require_once('class.pCarrito.php');
    require_once("../plantillas/plantilla.php");
//SI LA CONECCION CARRITO EXISTE MOSTRARA CUANTOS ARTICULOS HAY
if (isset($_SESSION["carrito"])) {
    $car = $_SESSION["carrito"];
$TOTAL=0;
    ?>
    <table>
            <?php foreach ($car as $c) {
                echo "<br>";
                $sql="SELECT * FROM producto where id_prod ='$c->id_prod'";
                $rs = mysqli_query($con, $sql);
                
                while ($mosP = mysqli_fetch_array($rs)) { ?>
                    <tr>
                        <td> <img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($mosP['img_prod']); ?>" /> </td>
                        <td> Producto : <?php echo $mosP['nomb_prod'] ?></td>
                        <td> precio : <?php echo $mosP['Pre_Bruto'] ?></td>
                        <td> precio + iva : <?php echo $mosP['Pre_neto'] ?></td>
                        <?php if ($c->can_prod>0) { ?>
                            <td> precio subtotal: <?php echo $subTotal =($mosP['Pre_neto'] * $c->can_prod ) ?> </td>
                        <?php
                        }else {
                            $subTotal=$mosP['Pre_neto'];
                        } ?>
                        <?php $TOTAL = $TOTAL + $subTotal; ?>
                        
                    </tr>
                <?php } ?>
                
                <?php
            }
        }
        ?>
    </table>
    precio total = <?php echo $TOTAL ?> 
    <!-- AQUI VA EL API PARA PAGAR -->
    <input type="submit" value="PAGAR">
<?php
include("../plantillas/piePagina.php");
?>