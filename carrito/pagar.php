<?php
require_once('class.pCarrito.php');
require_once("../plantillas/plantilla.php");
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
$TOTAL=0;
if (isset($_SESSION["carrito"])) {
    $car = $_SESSION["carrito"];
 foreach ($car as $c) {
        echo "<br>";
        $sql="SELECT * FROM producto where id_prod ='$c->id_prod'";
        $rs = mysqli_query($con, $sql);
        while ($mosP = mysqli_fetch_array($rs)) { 
            $nombre = $mosP['nomb_prod'];
            if ($c->can_prod>0) {
            $subTotal =$mosP['Pre_neto'] * $c->can_prod;
        }else{$subTotal=$mosP['Pre_neto'];}
        $TOTAL = $TOTAL + $subTotal;
    }
 }
}
if ($_POST) {
   
   
    
    $email = $_POST['email'];
}


?>
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
<div class="jumbotron">
    <h1 class="display-4">¡Paso Final !</h1>
    <hr class="my-4">
    <p class="lead">estas a punto de pagar con paypal la cantidad de :
    <h4>$<?php echo number_format($TOTAL,2); ?></h4></p>
    
    <p>esto no mas es una prueba; no todo lo que brilla es oro</p>
</div>
<div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $TOTAL; ?>' , currency:'USD'
                        }
                    }]
                });
            },
            client:{
            sandbox:  'AXg9h4dlayQsIULuXzeV5zGuDS6uR9Xi7DRZusLvjRk1Vpb4oM8yDddZCrXkSl_5l89XN9XECJ29v_Zv',
            production: '<insert production client id'


            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>