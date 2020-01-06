<?php
include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");
?>
<link rel="stylesheet" type="text/css" href="fenixcel.css">
<div class="opcAdmin">
    <table>
        <tr>
            <td>
                <a href="../cliente/Inventario.php"><input type="button" value="Inventario"></a>

            </td>
            <td>
                <a href="../reporte/listaReporte.php"><input type="button" value="Consultas"></a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="../usuario/listaEmpleado.php"><input type="button" value="Empleados"></a>
            </td>
            <td>
                <a href="../usuario/listaCliente.php"><input type="button" value="Clientes"></a>
            </td>
        </tr>
        <?php
        if ($_SESSION['rol'] == 3) {


            ?>
            <tr>
                <td>
                    <a href="../proveedor/verprov.php"><input type="button" value="Proveedores"></a>
                </td>
                <td>
                    <a href="../usuario/listaAdministrador.php"><input type="button" value="Administradores"></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="../producto/crudPro.php"><input type="button" value="Productos"></a>
                </td>
                <td>
                    <a href="../ReporteVentas/mensual.php"><input type="button" value="Reportes"></a>
                </td>
            </tr>
        <?PHP
        }
        ?>
    </table>
</div>
<?php
include("../plantillas/piePagina.php");
?>