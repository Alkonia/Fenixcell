<?php
require_once("../plantillas/plantilla.php");
$con = mysqli_connect('localhost', 'root', '', 'fenixx');

?>
<div class="cajaProd">
    <?php

    if (isset($_SESSION["carrito"])) {
        $car = $_SESSION["carrito"];
        echo " <a href='coti.php'>En carrito:</a> ";
        echo count($car);
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM producto WHERE id_prod ='.$id.'";
    $rs = mysqli_query($con, $sql);
    while ($mos = mysqli_fetch_array($rs)) {

        ?>
        <center>
            <table class="listProd">
                <thead>
                    <th colspan="2"> <?php echo $mos['nomb_prod']  ?> </th>
                </thead>
                <tr>
                    <td rowspan="4"><img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($mos['img_prod']); ?>" /></td>
                </tr>
                    <form action="SumaCant.php" method="POST">
                    <td>
                    <input type="hidden" value="<?php echo $mos['id_prod'] ?>" name="id">
                    Cantidad llegados
                    <input type="number" width="20px" name="cant_llegados" min="1">
                    <input type="hidden" width="20px" name="cant" id="" min="1" value="<?php echo $mos['cant_prod'] ?>" >
                    <input type="submit" value="Enviar"> 
                    </td>
                    </form>
                </tr>
            </table>
        </center>
        <?php
            ?>
        </tbody>
        </table>
        <?php  ?>
    <?php
    }
    include("../plantillas/piePagina.php");
    ?>