<?php 
    $id_rep=$_GET['id_rep'];
    $sql= "DELETE FROM reporte WHERE id_rep = $id_rep"; 
    if ($con->query($sql) === true) { 
        echo "Record deleted successfully"; 
    } else { 
        echo "Error deleting record: " . $con->error;
    } 
    header("location:listaReporte.php"); 
    ?> 



























        
    ]
 ?>