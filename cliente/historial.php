<?php
require_once("../plantillas/plantilla.php");
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
$id_sesion = $_SESSION['id_usu'];
$conj = "SELECT * FROM venta WHERE usuVenta_FK = $id_sesion";
$rs = mysqli_query($con, $conj);


?>
 
        
        <?php

            ?><center>
            <table border="1">
            <thead>
             <th>fecha</th>
             <th>Producto</th>
             <th>Pago</th>
             <th>Tipo de pago</th>
             <th>cantidad</th>
            </thead>
            <?php
        while ($mos = mysqli_fetch_array($rs)) {
$query1 = "SELECT * FROM detalleventa WHERE idVentaFK=$mos[idVenta]";
                        $rs1 = mysqli_query($con, $query1);
                        while ($mos1 = mysqli_fetch_array($rs1)){
                            $query2 = "SELECT * FROM producto WHERE id_prod =$mos1[idProdFk] ";
                            $rs2 = mysqli_query($con,$query2);
                            while ($mos2 = mysqli_fetch_array($rs2)){
                                ?>
            <tr>
                <td><?php echo $mos['fecVenta'] ?></td>
                <td>
                    <?php echo $mos2['nomb_prod']; ?>
                <td><?php echo $mos['toVenta'] ?></td>
                <td><?php echo $mos['metodPago'] ?></td>
                <td><?php echo $mos1['cantProd'] ?></td>
            </tr>
            <br>
            <br>
        <?php
        }
    }
}
        ?>
    </table>
</center>