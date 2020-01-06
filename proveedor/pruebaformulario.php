<?php
include("../plantillas/plantilla.php");
$query = mysqli_query($con, "SELECT id_ciu,nom_ciu FROM ciudad");
$quer = mysqli_query($con, "SELECT id_est,desc_est FROM estado")
?>
<link rel="stylesheet" href="cssbasico.css">
<center>
    <form action="recargaragregarprov.php" method="POST" enctype="multipart/form-data">
        <label>Nombre</label>
        <input type=text name=nombre required="" placeholder="ingrese el nombre"></p>
        <label>ciudad</label>
        <select name="ciudad">
            <?php

            while ($datos = mysqli_fetch_array($query)) {
                ?>
                <option value="<?php echo $datos['id_ciu'] ?>"> <?php echo $datos['nom_ciu'] ?> </option>

            <?php
            }
            ?>

        </select>
        </p>
        <label>Direccion</label>
        <select name=dir1>
            <option>'seleccionar'</option>
            <option>avenida</option>
            <option>carrera</option>
            <option>calle</option>
            <option>pasaje</option><input name=dir2 type="text" required=""> # <input name=dir3 type=text required=""> - <input name=dir4 type=text class=num required=""></p>
        </select>
        <label>Telefono</label>
        <input type=text name=telefono required=""></p>
        <label>Correo</label>
        <input type=text name=correo required=""></p>
        <label>Imagen</label>
        <input type="file" name=imagen required=""></p>
        <label>estado</label>
        <select name=est>

            <?php

            while ($dato = mysqli_fetch_array($quer)) {
                ?>
                <option value="<?php echo $dato['id_est'] ?>"> <?php echo $dato['desc_est'] ?> </option>

            <?php
            }
            ?>


        </select>
        </p>
        <input type=reset value="borrar"> <input type=submit value=agregar name=add>
    </form>
</center>
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