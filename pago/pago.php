<?php
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
require_once('../cliente/class.pCarrito.php');
require_once("../plantillas/plantilla.php");
if (isset($_SESSION["carrito"])) {
    $car = $_SESSION["carrito"];
    }
$id_usu = $_SESSION['id_usu'];
$total = $_POST['total'];
?><head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<table class="listProd">
</head>
    <thead>
        <th>
            Escoge metodo de pago
        </th>
    </thead>
    <tr>
        <td>
            <form action="#" method="POST">
                <select name="mp" id="">
                    <option value="falso">falso</option>
                    <option value="pay">Paypal</option>
                </select>
            <input type="hidden" name="total" value="<?php echo $total ?>">
            <input type="submit" value="Elegir">
            </form>
        </td>
    </tr>
</table>
<?php
if (isset($_POST["mp"])) {
$mp=$_POST['mp'];

switch ($mp) {
    case 'falso':
        ?>
        <table class="listProd">
            <form action="procVenta.php" method="post">
            <?php
                date_default_timezone_set('America/Bogota');
                $fecha_actual=date("Y-m-d H:i:s");

                ?>
            <tr>
                <td>
                    <select name="tar" id="">
                        <option value="">Viza</option>
                        <option value="">Masterkarl</option>
                        <option value="">Suamerican Express</option>
                    </select>
                    <br>
                    N° tarjeta
                    <br>
                    <input type="numer" name="tarjeta" id="">
                    <br>
                    CVV
                    <br>
                    <input type="number" whidth="50px" name="" id="">
                    <br>
                    <label for="">$ <?php echo $total ?> </label>
                    <input type="hidden" name="total" value="<?php echo $total ?>" id="">
                    <br>
                    <input type="text" name="fecha" style="display:none" value="<?= $fecha_actual ?>">
                    <input type="submit" value="Pagar">
                </td>
            </tr>
            </form>
        </table>
        <?php
        break;
        case 'pay':
            ?>
            <form action="paypal.php" method="POST">
    <?php
            date_default_timezone_set('America/Bogota');
            $fecha_actual=date("Y-m-d H:i:s");
       echo "$total <br/>";
       $total = (int)$total;
       $to = $total/3500;
        $to = (int)$to;
        ?>

<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
<div class="jumbotron">
    <h1 class="display-4">¡Paso Final !</h1>
    <hr class="my-4">
    <p class="lead">estas a punto de pagar con paypal la cantidad de :
    <h4>$<?php echo number_format($to,2); ?></h4></p>
    
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
                            value: '<?php echo $to; ?>' , currency:'USD'}

                    }]
                });
            },
            client:{
            sandbox:  'AXg9h4dlayQsIULuXzeV5zGuDS6uR9Xi7DRZusLvjRk1Vpb4oM8yDddZCrXkSl_5l89XN9XECJ29v_Zv',
            production: '<insert production client id>'


            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    console.log(data);
                    window.location="paypal.php?total=<?php echo $to; ?>&tiempo=<?php echo $fecha_actual;?>"
                });
            }


        }).render('#paypal-button-container');
    </script>
    <?php

      break;
    default:
        break;
}
}
?>
<?php
    include("../plantillas/piePagina.php");
    ?>