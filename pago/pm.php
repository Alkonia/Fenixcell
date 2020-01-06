<?php
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
require_once('../cliente/class.pCarrito.php');
require_once("../plantillas/plantilla.php");
if (isset($_SESSION["carrito"])) {
    $car = $_SESSION["carrito"];
}
?>
<table class="listProd">
    <thead>
        <th>
            Escoge metodo de pago
        </th>
    </thead>
    <tr>
        <td>
            <a href="pm.php">Pago de mentiritas</a>
        </td>
    </tr>
</table>
<?php
    include("../plantillas/piePagina.php");
    ?>