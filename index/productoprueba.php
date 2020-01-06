<?php

include("carrito.php");
 echo $mensaje;
?>
<div>
<?php
$conjetura = "select * from producto";
$rs3 = mysqli_query($con,$conjetura);
while ($datos = mysqli_fetch_array($rs3)) {
    ?>
    <div>
    <?php echo $mensaje; ?>
    <div>
        <img 
        title=<?php echo $datos['nomb_prod']; ?>
        alt=<?php echo $datos['nomb_prod']; ?>
        data-toggle ="popever"
        data-trigger="hover"
        data-content="<?php echo $datos['desc_prod']; ?>"
        height="307px"
        src="data:image/jpg;base64,<?php echo base64_encode($datos['img_prod']); ?>">
        <div>
        <span><?php echo $datos['nomb_prod']; ?></span>
            <h5>$<?php echo $datos['Pre_Compra']; ?></h5>
           <form method="post" action="">
           <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($datos['id_prod'],COD,KEY);?>">
           <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($datos['nomb_prod'],COD,KEY);?>">
           <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($datos['Pre_Compra'],COD,KEY);?>">
           <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
           <button class="btn btn-primary" type="submit" name="btnAccion" value="Agregar" >
             Agregar al carrito </button>
           </form>
             
        </div>
    </div>
    
    </div>
    <?php
}
?>
</div>
<script> 
$(function () {
  $('[data-toggle="popover"]').popover()
})

</script>