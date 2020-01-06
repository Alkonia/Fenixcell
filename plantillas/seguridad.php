<?php 
    if($_SESSION==null){
        header('location: ../index/index.php');
    }
	elseif($_SESSION['rol'] <= 1) {
        header('location: ../index/index.php');
    }
    else{}
?>