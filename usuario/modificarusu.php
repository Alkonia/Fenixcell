<?php
include("../plantillas/plantilla2.php");
$id = $_GET['id_usu'];
$asd = "SELECT * FROM usuario where id_usu=$id";
$rs = mysqli_query($con,$asd);
while ($mosusu = mysqli_fetch_array($rs)) { ?>
<form action="aditandousu.php?id_usu=<?php echo $mosusu['id_usu'] ?>" method="POST" enctype="multipart/form-data">
<table border=1>
<thead>

<tr><td><label >Primer nombre</label></tr></td> 
<tr><td><input type="text" name="nom_usu" value="<?php echo $mosusu['pri_nom_usu']?>" id=""><br></tr></td>  

<tr><td><label >Segundo nombre</label></tr></td> 
<tr><td><input type="text" name="seg_nom_usu" value="<?php echo $mosusu['seg_nom_usu']?> "id=""><br></tr></td> 

<tr><td><label >Primer apellido</label></tr></td> 
<tr><td><input type="text" name="ape_usu" value="<?php echo $mosusu['pri_ape_usu']?> " id=""><br></tr></td>  

<tr><td><label >Segundo apellido</label></tr></td>
<tr><td><input type="text" name="seg_ape_usu" value="<?php echo $mosusu['seg_ape_usu']?> " id=""><br></tr></td>

<tr><td><label >Tipoo de identificacion</label></tr></td>
<tr><td><select name="tide">
									<option value="C.C">C.C </option>
									<option value="T.I">T.I </option>
									<option value="C.E">C.E</option>
									<option value="P.S">P.S</option>
                                    </select></tr></td>

 
<tr><td><label >Numero de documento</label></tr></td>  
<tr><td><input type="text" name="num_doc_usu" value="<?php echo $mosusu['num_doc_usu']?> "id=""><br></tr></td>
  
<tr><td><label >Genero</label></tr></tr></td>  
<tr><td><select name="gen">
										<option>Genero</option>
										<option value="M">masculino</option>
										<option value="F">femenino</option>
										<option value="O">Otro</option>
                                        </select><br></tr></td> 

<tr><td><label >Fecha de nacimiento</label></tr></td>  
<tr><td><input type="date" name="fna_usu" value="<?php echo $mosusu['fna_usu']?> " id=""><br></tr></td>  
 
<tr><td><label >Rol</label></tr></td> 
<tr><td><input type="text" name="rol" readonly="readonly" value="<?php echo $mosusu['rol']?> "id=""><br></tr></td>  
  
<tr><td><label >Correo</label></tr></td>  
<tr><td><input type="text" name="correo" value="<?php echo $mosusu['correo']?> "id=""><br></tr></td>  
  
<tr><td><label >Clave</label></tr></td>  
<tr><td><input type="password" name="clave" value="<?php echo $mosusu['clave']?> " id=""><br></tr></td>  
 
<tr><td><label >Direccion</label></tr></td>  
<tr><td><input type="text" name="dir_usu" value="<?php echo $mosusu['dir_usu']?> " id=""><br></tr></td>  
 
<tr><td><label >Telefono</label></tr></td>  
<tr><td><input type="text" name="tel_usu" value="<?php echo $mosusu['tel_usu']?> "id=""><br></tr></td> 
<tr><td><input type="file" name="imagen_usu" id=""> <br></tr></td>  
<td><input type="submit" name="editar" value="Editar"></td> 
</thead>
</table>
</form>
<?php
}
?>