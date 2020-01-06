<?php 
  include("../plantillas/plantilla.php");  
  include("../plantillas/seguridad.php");


  $hoy=date("Y-m-d"); 
  $mot_rep=$_POST['mot_rep'];
  $des_rep=$_POST['des_rep'];
  $tip_rep=$_POST['tip_rep'];
  $estado=$_POST['estado'];
  $id_rep=$_POST['id_rep'];
  $query = "UPDATE `reporte` SET `mot_rep` = '$mot_rep', `des_rep` = '$des_rep', `tip_rep` = '$tip_rep' WHERE `reporte`.`id_rep` = $id_rep"; 
$resultado=mysqli_query($con, $query) or die ("error");
  ?> 
<center> 
    <?php 
    if($resultado > 0){
        ?> 
        <h1>Reporte modificado</h1>
        <a href="listaReporte.php"> <input type="submit" value="Ok"> </a>
        <?php
    }else{
        ?> 
        <h1>Error al modificar el usuario</h1> 
        <?php
    }
    ?> 
    <p></p> 
     
 </center> 
 <?php
include("../plantillas/piePagina.php");
?>
