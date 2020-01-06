<?php
include("../plantillas/plantilla.php");
?>

       <?php
           $id_usu = $_SESSION['id_usu'];
        $sql = "SELECT * from usuario WHERE id_usu = '$id_usu'";
        $rs = mysqli_query($con, $sql);

            $result = mysqli_query($con,$sql);

            if ($result == null) {
                echo "No hay clientes";
            } else 
                 ($mostrar = mysqli_fetch_array($result)) 
                     

        
                
    ?>
    <!DOCTyPE html>

    <html>
    <head>
    <body>
    
    <center>
    
  
    <a href="../cliente/historial.php"><input type="button" id="bt1" value="Historial de compras"></a>
<center><h1>Perfil De Usuario</h1></center> 
<a href="plantilla.php">volver</a> 
<?php while ($mos = mysqli_fetch_array($rs)) {
    ?>
<table border=1>
<thead>

<tr><td><label for="">Primer nombre</label></tr></td> 
<tr><td><input type="text" name="pri_nom_usu" readonly="readonly" value="<?php echo $mos['pri_nom_usu'];?> "id=""><br></tr></td>  

<tr><td><label for="">Segundo nombre</label></tr></td> 
<tr><td><input type="text" name="seg_nom_usu" readonly="readonly" value="<?php echo $mos['seg_nom_usu'];?> "id=""><br></tr></td> 

<tr><td><label for="">Primer apellido</label></tr></td> 
<tr><td><input type="txt" name="pri_ape_usu" readonly="readonly" value="<?php echo $mos['pri_ape_usu'];?> " id=""><br></tr></td>  

<tr><td><label for="">Segundo apellido</label></tr></td>
<tr><td><input type="txt" name="seg_ape_usu" readonly="readonly" value="<?php echo $mos['seg_ape_usu'];?> " id=""><br></tr></td>

<tr><td><label for="">Tide</label></tr></td>  
<tr><td><input type="text" name="tide" readonly="readonly" value="<?php echo $mos['tide'];?> "id=""><br></tr></td> 
 
<tr><td><label for="">Numero de documento</label></tr></td>  
<tr><td><input type="text" name="num_doc_usu" readonly="readonly" value="<?php echo $mos['num_doc_usu'];?> "id=""><br></tr></td>
  
<tr><td><label for="">Genero</label></tr></tr></td>  
<tr><td><input type="txt" name="gen_usu" readonly="readonly" value="<?php echo $mos['gen_usu'];?> " id=""><br></tr></td> 

<tr><td><label for="">Fecha de nacimiento</label></tr></td>  
<tr><td><input type="txt" name="fna_usu" readonly="readonly" value="<?php echo $mos['fna_usu'];?> " id=""><br></tr></td>  
 
<tr><td><label for="">Rol</label></tr></td> 
<tr><td><input type="text" name="rol" readonly="readonly" value="<?php echo $mos['rol'];?> "id=""><br></tr></td>  
  
<tr><td><label for="">Correo</label></tr></td>  
<tr><td><input type="text" name="correo" readonly="readonly" value="<?php echo $mos['correo'];?> "id=""><br></tr></td>  
  
<tr><td><label for="">Clave</label></tr></td>  
<tr><td><input type="password" name="clave" readonly="readonly" value="<?php echo $mos['clave'];?> " id=""><br></tr></td>  
 
<tr><td><label for="">Direccion</label></tr></td>  
<tr><td><input type="txt" name="dir_usu" readonly="readonly" value="<?php echo $mos['dir_usu'];?> " id=""><br></tr></td>  
 
<tr><td><label for="">Telefono</label></tr></td>  
<tr><td><input type="text" name="tel_usu" readonly="readonly" value="<?php echo $mos['tel_usu'];?> "id=""><br></tr></td> 
  

<td><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($mos['img_usu']); ?>" /></td>
<td><a href="../usuario/modificarusu.php?id_usu=<?php echo $mos['id_usu'] ?>"><input type="button" name="modificar" value="Modificar"></a></td>
<input type="hidden" name="id_rep" value="<?php echo $row['id_rep']; ?>"> 
</head>
</body> 
</thead>
</tr>
</table>
</center>


        <?php
                    
}
include("../plantillas/piePagina.php");

            
        ?>