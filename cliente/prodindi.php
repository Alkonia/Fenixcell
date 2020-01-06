<?php
#Requiero la clase pCarrito(Productos del carrito), y la requiero antes de la plantilla ya que esta contiene el inicio de sesion
require_once('class.pCarrito.php');
require_once("../plantillas/plantilla.php");
$con = mysqli_connect('localhost', 'root', '', 'fenixx');

?>
<div class="cajaProd">
    <?php
#llamo la sesion carrito
    if (isset($_SESSION["carrito"])) {
        $car = $_SESSION["carrito"];
        #muestro la lista de carrito y un link que dirige a la cotizacion del carrito
        echo " <a href='coti.php'>En carrito:</a> ";
        echo count($car);
    }
    #Llamo el id del producto por el metodo get
    $id = $_GET['id'];
    #Muestro detalles del producto del id que traje atravez del GET
    $sql = "SELECT * FROM producto WHERE id_prod ='.$id.'";
    $rs = mysqli_query($con, $sql);
    #Este while me muestra el resultado de la busqueda
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
                <tr>
                    <td>
                        <?php echo $mos['marc_prod'] ?>
                    </td>
                </tr>
                <tr>
                    <td width="300px">
                        <?php echo $mos['desc_prod'] ?>
                    </td>
                
                <tr>
                    <td>
                        $ <?php echo $mos['Pre_neto'] ?>
                    </td>
                </tr>
                <tr>
                    <form action="proceso.php" method="post">
                    <td>
                    <input type="hidden" value="<?php echo $mos['id_prod'] ?>" name="id">
                    cantidad
                    <input type="number" width="20px" name="cant" id="" min="1" max="<?php echo $mos['cant_prod'] ?>" >
                    </td><td>
                        <input type="submit" value="Agregar a carrito">
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