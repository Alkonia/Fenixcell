<?php
require_once('class.pCarrito.php');
require_once("../plantillas/plantilla.php");
$con = mysqli_connect('localhost', 'root', '', 'fenixx');

?>
<div class="cajaProd">
<?php

if (isset($_SESSION["carrito"])) {
    $car = $_SESSION["carrito"];
    echo " <a href='coti.php'>En carrito:</a> ";
    echo count($car);
} ?>
<table>
    <a href=""></a>
    <tr></tr>
    <?php
    $busca = $con->real_scape_string($_POST['busca']);
    $sql = "SELECT * FROM producto WHERE id_prod LIKE'%".$busca."%' OR nom_prod LIKE'%".$busca."%'";
    $rs = mysqli_query($con, $sql);
    foreach ($rs as $mosP) {
        ?>
        <form action="proceso.php" method="POST">
            <td>
            <a href="prodindi.php?id=<?php echo $mosP['id_prod'] ?>"><img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($mosP['img_prod']); ?>" /></a>
                <br>
                <?php echo $mosP['nomb_prod'] ?>
                <br>
                $ <?php echo $mosP['Pre_neto'] ?>
                <br>
                <form action="">
                    <input type="hidden" value="<?php echo $mosP['id_prod'] ?>" name="id">
                    <input type="number" width="20px" name="cant" id="" min="1" max="<?php echo $mosP['cant_prod'] ?>" >
                    <input type="submit" value="Añadir">
                </form>
            </td>
            <?php
                ?>
        </form>
    <?php
    }
    ?>
</table>
</div>
<?php
    ?>
   </tbody>
    </table>
    <?php  ?>
    <?php 
include("../plantillas/piePagina.php");
?>