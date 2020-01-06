<?php
include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");
?>
<br>
<br>
<br>
<center>
    <table border="1">
        <tr>
            <td>id</td>
            <td>nombre</td>
            <td>id ciudad</td>
            <td>direccion</td>
            <td>telefono</td>
            <td>correo</td>
            <td>imagen</td>
            <td>id estado</td>
            <td></td>
            <td><a class="link" href="../proveedor/añadirprov.php">Añadir proveedor</a></td>
        </tr>
        <?php
        $conj = "select * from proveedor";
        $rs = mysqli_query($con, $conj);

        while ($mos = mysqli_fetch_array($rs)) {
            ?>
            <tr>
                <td><?php echo $mos['id_prov'] ?></td>
                <td><?php echo $mos['nom_prov'] ?></td>
                <td><?php $query1 = "SELECT * from ciudad WHERE id_ciu=$mos[id_ciu1_FK]";
                        $rs1 = mysqli_query($con, $query1);
                        $mos1 = mysqli_fetch_array($rs1);
                        echo $mos1['nom_ciu'] ?></td>
                <td><?php echo $mos['dir_prov'] ?></td>
                <td><?php echo $mos['tel_prov'] ?></td>
                <td><?php echo $mos['ema_prov'] ?></td>
                <td><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($mos['img_prov']); ?>" /></td>
                <td><?php echo $mos['id_est4_FK'] ?></td>
                <td><a href="eliminarprov.php?id_prov=<?php echo $mos['id_prov'] ?>"><input type="button" name="eliminar" value="Eliminar"></a></td>
                <td><a href="modificarprov.php?id_prov=<?php echo $mos['id_prov'] ?>"><input type="button" name="modificar" value="Modificar"></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</center>
<?php
include("../plantillas/piePagina.php");
?>