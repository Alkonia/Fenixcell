<?php

include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");
$queryd = "SELECT id_dpto,nom_dpto FROM departamento ORDER BY nom_dpto ASC";
$query = mysqli_query($con, "SELECT id_ciu,nom_ciu FROM ciudad");
$quer = mysqli_query($con, "SELECT id_est,desc_est FROM estado");
$resultado = $con->query($queryd);
?>
<link rel="stylesheet" href="cssbasico.css">
<script language="javascript" src="js/jquery-3.4.1.min.js" ></script>

<script language="javascript">
    $(document).ready(function(){
				$("#departamento").change(function () {
					$("#departamento option:selected").each(function () {
						id_dpato = $(this).val();
						$.post("probar/getciudad.php", { id_dpato: id_dpato }, function(data){
							$("#ciudad").html(data);
						});            
					});
				})
			});
</script>
<body>

<center>
    <table>
    <form action="validarprov.php" method="POST" enctype="multipart/form-data">
        <label>Nombre</label>
        <input type="text" name="nombre" required="" placeholder="ingrese el nombre"></p>
        <label>departamento</label>
        <select name="departamento" id="departamento">
        <option value="0">seleccionar </option>
            <?php

            while ($datos = $resultado->fetch_assoc()) {
                ?>
                <option value="<?php echo $datos['id_dpto'] ?>"> <?php echo $datos['nom_dpto'] ?> </option>

            <?php
            }
            ?>

        </select>
        <label>ciudad</label>
        <select name="ciudad" id="ciudad">
        
        </select>
        </p>
        <label>Direccion</label>
        <select name="dir1">
            <option>'seleccionar'</option>
            <option>avenida</option>
            <option>carrera</option>
            <option>calle</option>
            <option>pasaje</option><input name="dir2" type="text" required=""> # <input name="dir3" type="text" required=""> - <input name="dir4" type="text" class="num" required=""></p>
        </select>
        <label>Telefono</label>
        <input type="text" name="telefono" required=""></p>
        <label>Correo</label>
        <input type="text" name="correo" required=""></p>
        <label>Imagen</label>
        <input type="file" name="imagen"></p>
        <label>estado</label>
        <select name="est">

            <?php

            while ($dato = mysqli_fetch_array($quer)) {
                ?>
                <option value="<?php echo $dato['id_est'] ?>"> <?php echo $dato['desc_est'] ?> </option>

            <?php
            }
            ?>


        </select>
        </p>
        <input type=reset value="borrar"> <input type="submit" value="agregar" name="add">
    </form>
        </table>
</center>
</body>
<?php
include("../plantillas/piePagina.php");
?>