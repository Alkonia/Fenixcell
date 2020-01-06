<?php
include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");
?>
<CENTER>
    <H1> LISTA DE ADMINISTRADOR</H1>
</CENTER>
<!--Para añadir un nuevo administrador-->
<a href="añadirAdministrador.php"><input type="button" value="Añadir administrador" id="bt1"></a>
<center>
    <table border="1" cellpadding="10px" font-family:Arial style="border-radius: 0px; border-color: black;">


        <tr>
            <td>
                <h2>Nombre</h2>
            </td>
            <td>
                <h2>Apellido</h2>
            </td>
            <td>
                <h2>Tipo de identificacion</h2>
            </td>
            <td>
                <h2>Numero</h2>
            </td>
            <td>
                <h2>Genero</h2>
            </td>
            <td>
                <h2>Fecha de nacimiento</h2>
            </td>
            <td>
                <h2>Direccion</h2>
            </td>
            <td>
                <h2>Telefono</h2>
            </td>
            <td>
                <h2>Imagen</h2>
            </td>
            <?php
            //Comienza el proceso para mostrar todos los administradores
            $sql = "SELECT * FROM usuario WHERE rol=3";

            $result = mysqli_query($con, $sql);
            if ($result == null) {
                //Situación en caso que no haya administradores
                echo "No hay administrador";
            } else {
                while ($mostrar = mysqli_fetch_array($result)) {
                    if ($mostrar['id_est1_FK'] == 1) {


                        ?>

        </tr>
        <tr>
            <!--Se muestran los valores de la base de datos-->
            <?php $mostrar['id_usu'] ?>
            <td><?php echo $mostrar['pri_nom_usu'] ?> <?php echo $mostrar['seg_nom_usu'] ?></td>
            <td><?php echo $mostrar['pri_ape_usu'] ?> <?php echo $mostrar['seg_ape_usu'] ?></td>
            <td><?php echo $mostrar['tide'] ?></td>
            <td><?php echo $mostrar['num_doc_usu'] ?></td>
            <td><?php echo $mostrar['gen_usu'] ?></td>
            <td><?php echo $mostrar['fna_usu'] ?></td>
            <td><?php echo $mostrar['dir_usu'] ?></td>
            <td><?php echo $mostrar['tel_usu'] ?></td>
            <td><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['img_usu']); ?>" /></td>
            <td><a href="eliminarReporte.php?id_rep=<?php echo $mostrar['id_rep'] ?>"><input type="button" value="Estado" id="bt1" name="elimi"></a>
                <a href="modificarReporte.php?id_rep=<?php echo $mostrar['id_rep'] ?>"><input type="button" value="Modificar" id="bt2"></a></td>
            <br>
        </tr>
<?php
        }
    }
}
?>
    </table>
</center>
<?php
include("../plantillas/piePagina.php");
?>