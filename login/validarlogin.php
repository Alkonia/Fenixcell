<?php 
if (isset($_POST['password']) && $_POST['user']!=''){  //utilizamos el metodo if y la variable post para identificar y las variables que vamos a utilizar para iniciar sesion
session_start();
 $user=$_POST['user'];
 $password=$_POST['password'];
 $con = mysqli_connect('localhost', 'root', '', 'fenixx');
 $consulta=mysqli_query($con,"SELECT * FROM usuario WHERE correo='$user'");
 if ( $f2=mysqli_fetch_array($consulta))  { 
     if (md5($password)==$f2['clave'] && $f2['rol']>0) {
        $_SESSION['id_usu'] = $f2['id_usu']; 
        $_SESSION['pri_nom_usu'] = $f2['pri_nom_usu']; 
        $_SESSION['rol'] = $f2['rol'];
        $_SESSION['pri_ape_usu'] = $f2['pri_ape_usu'];?> 
       <!--Valida cliente-->
       <script>location.href='../index/index.php?idUsuarios=<?php echo $_SESSION['id_usu'] ;?>'</script> 
          <?php 
      }else{
          echo "<div class='alert alert-danger' role ='alert'>
          correo o contraseña incorreta </div>";
      }
    }
}
?> 
