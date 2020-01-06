<?php 
include("../plantillas/plantilla.php"); 
include("../plantillas/seguridad.php");
$id_rep=$_GET['id_rep']; 
$query="SELECT id_rep, fec_rep, mot_rep, des_rep, tip_rep, estado FROM reporte WHERE id_rep = '$id_rep'"; 
$resultado=$con->query($query); 
$row=$resultado->fetch_assoc();
?> 

<center><h1>modificar reporte</h1></center> 
<a href="listaReporte.php">volver</a> 
<form method="post" action="modificar_reporte.php">

Modifique el nombre <input type="text" name="mot_rep" value="<?php echo $row['mot_rep'];?>"><br>  

<tr>
    <td>
        <p>Añada una descripcion</p>

            <textarea name="textarea" name="des_rep" value="<?php echo $row['des_rep'];?>" rows="5" cols="50">
                
            </textarea>
    </td>
</tr> 
<p>
<label for="">Modifique el tipo y estado de reporte</label> 
<select name="tip_rep">
	<option>Filtrar reportes</option>
	<option>Emergencia</option>
	<option>Devolucion</option>
	<option>Opinion</option>
    <option>Garantia</option>
    <option>Venta</option>
    <option>Reparacion</option>
    <option>Mantenimiento</option><br> 
<p>
<label for="">Digite estado de reporte</label> 
<input type="txt" name="estado" value="<?php echo $row['estado'];?> " id=""><br> 

<input type="submit" value="guarda" /></center>
<a href="listaReporte.php"> <input type="button" value="Cancelar" /> </center> </a>  
<input type="hidden" name="id_rep" value="<?php echo $row['id_rep']; ?>"> 
</form> 
<?php
include("../plantillas/piePagina.php");
?>