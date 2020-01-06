<?php
require_once('class.pCarrito.php');
require_once("../plantillas/plantilla.php");
$con = mysqli_connect('localhost', 'root', '', 'fenixx');

?>
<div class="cajaProd">
    <table>
        <a href=""></a>
        <tr></tr>
        <?php
        $sql = "SELECT * FROM producto";
        $rs = mysqli_query($con, $sql);
        foreach ($rs as $mosP) {
            ?>
            <form action="proceso.php" method="POST">
                <td>
                    <img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($mosP['img_prod']); ?>" />
                    <br>
                    <?php echo $mosP['nomb_prod'] ?>
                    <br>
                    $ <?php echo $mosP['Pre_neto'] ?>
                    <br>
                    <form action="">
                        <input type="hidden" value="<?php echo $mosP['id_prod'] ?>" name="id">
                        <input type="number" width="20px" name="cant" id="">
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