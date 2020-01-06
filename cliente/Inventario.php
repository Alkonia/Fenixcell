<?php
require_once('class.pCarrito.php');
require_once("../plantillas/plantilla.php");
$con = mysqli_connect('localhost', 'root', '', 'fenixx');

?>
<div class="cajaProd">
    <?php
error_reporting(0);
    if (isset($_SESSION["carrito"])) {
        $car = $_SESSION["carrito"];
        echo " <a href='coti.php'>En carrito:</a> ";
        echo count($car);
    } ?>
    <a href=""></a>
    <tr></tr>
    <?php
    $busca = $con->real_escape_string($_POST['busca']);
    $sql = "SELECT * FROM producto";
    
    if (isset($_POST['busca'])) {
        $sql = "SELECT * FROM producto WHERE id_prod LIKE'%" . $busca . "%' OR nomb_prod LIKE'%" . $busca . "%'";
    }elseif ($_POST['idL']) {
        $sql2="SELECT * FROM sub_linea_producto WHERE id_lpro1_FK = $idL";
        $rs2= mysqli_query($con, $sql2);
        while ($a <= 10) {
        }
    }
    $rs = mysqli_query($con, $sql); 
    $i=0;
    ?>
    <table width="200px" align="center" class="listProdMin">
    <tr>
            <?php
            while ($mosP = $rs->fetch_assoc()) {
                
                while ($i > 6) {
                    print "<tr>";
                    
                }
                ?>
                <form action="proceso.php" method="POST">
                    <td >

                        <a href="CarProd.php?id=<?php echo $mosP['id_prod'] ?>"><img height="110px" width="110px" src="data:image/jpg;base64,<?php echo base64_encode($mosP['img_prod']); ?>" /></a>
                        <br>
                        <?php echo $mosP['nomb_prod'] ?>
                        <br>
                        Cantidad: <?php echo $mosP['cant_prod'] ?>
                        <br>
                        <form action="">
                            <input type="hidden" value="<?php echo $mosP['id_prod'] ?>" name="id">
                        </form>
                        </td>
                    <?php
                    $i++;
                    while ($i > 6) {
                        print "</tr>";
                        $i=0;
                    }
                    ?>
                        
                </form>
            <?php
            }
            ?>
            </tr>
        </tr>
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