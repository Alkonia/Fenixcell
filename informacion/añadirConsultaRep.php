<?php
include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");
?>
<center>
    <!--Se usa el metodo post para llevar la información almacenada al php-->
    <form action="../reporte/insertarReporte.php" method="POST" name="form">
        <table id="tabla">
            <tr>
                <TD>
                    <H1>CONSULTA</H1>
                </TD>
            </tr>
            <tr>
                <td><select name="tipRep">
                        <option values="Emergencia">Reparacion</option>
                    </select>
                </td>
            </tr>
            <TR>
                <TD>
                    <p>Asunto</p>
                    <input type="textArea" name="asunto" placeholder="Inserte el asunto" size="47">
                </TD>
            </TR>
            <tr>
                <td>
                    <p>DESCRIPCION DEL PROBLEMA</p>

                    <textarea name="textarea" name="desc" rows="5" cols="50" placeholder="Especificación del reporte">

            </textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="ENVIAR" value="ENVIAR">
                </td>

            </tr>
        </table>
    </form>
</center>
<?php
include("../plantillas/piePagina.php");
?>