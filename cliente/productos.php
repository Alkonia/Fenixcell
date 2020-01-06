<?php
require_once('class.pCarrito.php');
require_once("../plantillas/plantilla.php");
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
?>

    
 
    <?php
    if($_GET){
        $idL=$_GET['idL'];
    }
   
   
    #Si la variable busqueda existe mostrara los productos filtrados por Nombre o ID del producto
    if (isset($_POST['busca'])) {
         #la variable busca viene de la barra de busqueda
    $busca = $con->real_escape_string($_POST['busca']);
        $sql = "SELECT * FROM producto WHERE id_prod LIKE'%" . $busca . "%' OR nomb_prod LIKE'%" . $busca . "%'";
        $rs = mysqli_query($con, $sql); ?>
        <table width="200px" align="center" class="listProdMin">
            <tr>
                <?php
                    while ($mosP = $rs->fetch_assoc()) {

                        ?>
                    <form action="proceso.php" method="POST">
                        <td>

                            <a href="prodindi.php?id=<?php echo $mosP['id_prod'] ?>"><img height="100px" width="60px" src="data:image/jpg;base64,<?php echo base64_encode($mosP['img_prod']); ?>" /></a>
                            <br>
                            <?php echo $mosP['nomb_prod'] ?>
                            <br>
                            $ <?php echo $mosP['Pre_neto'] ?>
                            <br>
                            <form action="">
                                <input type="hidden" value="<?php echo $mosP['id_prod'] ?>" name="id">
                                <font>Cantidad :</font>
                                <input type="number" width="20px" name="cant" id="" min="1" max="<?php echo $mosP['cant_prod'] ?>">
                                <input type="submit" value="Añadir">
                            </form>
                        </td>
                        <?php
                                ?>
                    </form>
                <?php
                    }
                    ?>
            </tr>
        </table>
</div>
<?php #Pero si la variable $idL es la que existe buscara los productos segun su categoria
} elseif (isset($idL)) {
     #La variable IdL viene de la busqueda por categorias
     
    #en esta primera fase selcciona la sub_linea y la filtra segun la categiria seleccionada
    $sql3 = "SELECT * FROM sub_linea_producto WHERE id_lpro1_FK = $idL";
    $rs3 = mysqli_query($con, $sql3);
    
    while ($row = mysqli_fetch_array($rs3)) {

#La siguiente sentencia filtrara los productos segun la Sub_lineas encontradas en la sentecia anterior
#Esta sentencia tiene un error muestra en diferentes tablas las sub categorias
#Si existen sub lineas vacias mostrara una tabla vacia
        $sql = "SELECT * FROM producto WHERE idsl_proFK = '" . $row['id_slpro'] . "'";
        $rs = mysqli_query($con, $sql);
        ?>
    <table width="200px" align="center" class="listProdMin">
        <tr>
            <?php
             $c = 0;       while ($mosP = $rs->fetch_assoc()) {
                        while ($c > 2) {
                            print "<tr>";
                            $c=0;
                            }
        
                        ?>
                <form action="proceso.php" method="POST">
                    <td>

                        <a href="prodindi.php?id=<?php echo $mosP['id_prod'] ?>"><img height="100px" width="60px" src="data:image/jpg;base64,<?php echo base64_encode($mosP['img_prod']); ?>" /></a>
                        <br>
                        <?php echo $mosP['nomb_prod'] ?>
                        <br>
                        $ <?php echo $mosP['Pre_neto'] ?>
                        <br>
                        <form action="">
                            <input type="hidden" value="<?php echo $mosP['id_prod'] ?>" name="id">
                            <font>Cantidad :</font>
                            <input type="number" width="20px" name="cant" id="" min="1" max="<?php echo $mosP['cant_prod'] ?>">
                            <input type="submit" value="Añadir">
                        </form>
                        <?php
                $c++;
                while ($c > 2) {
                print "</tr>";
                $c=0;
                }
                ?>
                    </td>
                </form>
            <?php
                    }
                    ?>
        </tr>
    </table>
    </div>
<?php
    }
#Pero si no existe ninguna de las variables anteriores ($idL o $busca) mostrara todos los productos
#Existe un bug cuando se va al carrito de compras y es que este cuando se devuelve llega a esta pagina mostrando todos los producots

} else {
    $sql ="SELECT * FROM producto";
    $rs = mysqli_query($con, $sql);
    ?>
<table width="200px" align="center" class="listProdMin">
    
        <?php
        $c=0;
            $sql = "SELECT * FROM producto";
            while ($mosP = $rs->fetch_assoc()) {
                
                while ($c > 2) {
                    print "<tr>";
                    $c=0;
                    }

                ?>
            <form action="proceso.php" method="POST">
                <td>
                    <a href="prodindi.php?id=<?php echo $mosP['id_prod'] ?>"><img height="100px" width="60px" src="data:image/jpg;base64,<?php echo base64_encode($mosP['img_prod']); ?>" /></a>
                    <br>
                    <?php echo $mosP['nomb_prod'] ?>
                    <br>
                    $ <?php echo $mosP['Pre_neto'] ?>
                    <br>
                    <form action="">
                        <input type="hidden" value="<?php echo $mosP['id_prod'] ?>" name="id">
                        <font>Cantidad :</font>
                        <input type="number" width="20px" name="cant" id="" min="1" max="<?php echo $mosP['cant_prod'] ?>">
                        <input type="submit" value="Añadir">
                    </form>
                </td>
                <?php
                $c++;
                while ($c > 2) {
                print "</tr>";
                $c=0;
                }
                ?>
            </form>
        <?php } ?>
        </tr>
</table>
</div>
<?php  } ?>

<?php  ?>
<?php
include("../plantillas/piePagina.php");
?>