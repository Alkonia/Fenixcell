<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=../index/index.php">
SU PETICION SE REALIZO CON EXITO.
<?php 
    //Conexion a base de datos
	$conexion=mysqli_connect('localhost','root','','fenixx');

    //Se declara que el nombre de los formularios es igual a las nuevas variables
    $asu=$_POST['asunto'];
    $desc=$_POST['textarea'];
    $tip_rep=$_POST['tipRep'];
    //Comando para guardarlo en los atributos date
    $hoy=date("Y-m-d");
    
    //Comando de MYSQL para insertar datos en la entidad respectiva
    $msqli="INSERT INTO reporte VALUES('','$hoy', '$asu', '$desc', '$tip_rep','1')";
    $resultado=mysqli_query($conexion,$msqli) or die ("error");
 ?>