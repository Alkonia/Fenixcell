<?php
$usuario = "root";
$password = "";
$server = "localhost";
$basedatos ="fenixcell-final";

 $conexion = mysqli_connect ($server,$usuario,$password,$basedatos)
?>
<table border="2">
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
    $con ="select * from proveedor";
    $rs = mysqli_query($conexion,$con);

    while ($mos = mysqli_fetch_array($rs)) {
        ?>
    <tr>
        <td><?php echo $mos['id_prov']?></td>
        <td><?php echo $mos['nom_prov']?></td>
        <td><?php echo $mos['id_ciu_1']?></td>
        <td><?php echo $mos['dir_prov']?></td>
        <td><?php echo $mos['tel_prov']?></td>
        <td><?php echo $mos['ema_prov']?></td>
        <td><?php echo $mos['img_prov']?></td>
        <td><?php echo $mos['id_est_4']?></td>
    </tr>
    
</table> <input type=submit name="addprov" value="add">
<?php
    }
    ?>