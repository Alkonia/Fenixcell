<?php
include("../plantillas/plantilla.php");
include("../plantillas/seguridad.php");
//enero

$date1 = date("2019-01-00");
$date2 = date("2019-02-00");
$query1 = "SELECT toVenta FROM venta WHERE fecVenta >'$date1' AND fecVenta <'$date2'";
$result1 = mysqli_query($con, $query1);
$suma1=0;
while($mostrar1 = mysqli_fetch_array($result1)){
$suma1 = array_sum($mostrar1)+$suma1;
}
$mostrar1 = $suma1 / 2;

//febrero

$date3 = date("2019-03-00");
$query2 = "SELECT toVenta FROM venta WHERE fecVenta >'$date2' AND fecVenta <'$date3'";
$result2 = mysqli_query($con, $query2);
$suma2=0;
while($mostrar2 = mysqli_fetch_array($result2)){
$suma2 = array_sum($mostrar2)+$suma2;
}
$mostrar2 = $suma2 / 2;

//marzo

$date4 = date("2019-04-00");
$query3 = "SELECT toVenta FROM venta WHERE fecVenta >'$date3' AND fecVenta <'$date4'";
$result3 = mysqli_query($con, $query3);
$suma3=0;
while($mostrar3 = mysqli_fetch_array($result3)){
$suma3 = array_sum($mostrar3)+$suma3;
}
$mostrar3 = $suma3 / 2;

//abril

$date5 = date("2019-05-00");
$query4= "SELECT toVenta FROM venta WHERE fecVenta >'$date4' AND fecVenta <'$date5'";
$result4 = mysqli_query($con, $query4);
$suma4=0;
while($mostrar4 = mysqli_fetch_array($result4)){
$suma4 = array_sum($mostrar4)+$suma4;
}
$mostrar4 = $suma4 / 2;

//mayo

$date6 = date("2019-06-00");
$query5= "SELECT toVenta FROM venta WHERE fecVenta >'$date5' AND fecVenta <'$date6'";
$result5 = mysqli_query($con, $query5);
$suma5=0;
while($mostrar5 = mysqli_fetch_array($result5)){
$suma5 = array_sum($mostrar5)+$suma5;
}
$mostrar5 = $suma5 / 2;


//junio

$date7 = date("2019-07-00");
$query6= "SELECT toVenta FROM venta WHERE fecVenta >'$date6' AND fecVenta <'$date7'";
$result6 = mysqli_query($con, $query6);
$suma6=0;
while($mostrar6 = mysqli_fetch_array($result6)){
$suma6 = array_sum($mostrar6)+$suma6;
}
$mostrar6 = $suma6 / 2;

//julio

$date8 = date("2019-08-00");
$query7= "SELECT toVenta FROM venta WHERE fecVenta >'$date7' AND fecVenta <'$date8'";
$result7 = mysqli_query($con, $query7);
$suma7=0;
while($mostrar7 = mysqli_fetch_array($result7)){
$suma7 = array_sum($mostrar7)+$suma7;
}
$mostrar7 = $suma7 / 2;

//agosto

$date9 = date("2019-09-00");
$query8= "SELECT toVenta FROM venta WHERE fecVenta >'$date8' AND fecVenta <'$date9'";
$result8 = mysqli_query($con, $query8);
$suma8=0;
while($mostrar8 = mysqli_fetch_array($result8)){
$suma8 = array_sum($mostrar8)+$suma8;
}
$mostrar8 = $suma8 / 2;

//septiembre

$date10 = date("2019-10-00");
$query9= "SELECT toVenta FROM venta WHERE fecVenta >'$date9' AND fecVenta <'$date10'";
$result9 = mysqli_query($con, $query9);
$suma9=0;
while($mostrar9 = mysqli_fetch_array($result9)){
$suma9 = array_sum($mostrar9)+$suma9;
}
$mostrar9 = $suma9 / 2;

//octubre

$date11 = date("2019-11-00");
$query10= "SELECT toVenta FROM venta WHERE fecVenta >'$date10' AND fecVenta <'$date11'";
$result10 = mysqli_query($con, $query10);
$suma10=0;
while($mostrar10 = mysqli_fetch_array($result10)){
$suma10 = array_sum($mostrar10)+$suma10;
}
$mostrar10 = $suma10 / 2;

//noviembre

$date12 = date("2019-12-00");
$query11= "SELECT toVenta FROM venta WHERE fecVenta >'$date11' AND fecVenta <'$date12'";
$result11 = mysqli_query($con, $query11);
$suma11=0;
while($mostrar11 = mysqli_fetch_array($result11)){
$suma11 = array_sum($mostrar11)+$suma11;
}
$mostrar11 = $suma11 / 2;

//diciembre

$date13 = date("2019-12-31");
$query12= "SELECT toVenta FROM venta WHERE fecVenta >'$date12' AND fecVenta <'$date13'";
$result12 = mysqli_query($con, $query12);
$suma12=0;
while($mostrar12 = mysqli_fetch_array($result12)){
$suma12 = array_sum($mostrar12)+$suma12;
}
$mostrar12 = $suma12 / 2;

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Highcharts Example</title>

    <style type="text/css">

    </style>
</head>

<body>
    <script src="code/highcharts.js"></script>
    <script src="code/modules/exporting.js"></script>
    <script src="code/modules/export-data.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Reporte de ventas mensual'
            },

            xAxis: {
                categories: [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Dinero en pesos ($)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} $</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Ventas',
                data: [<?php echo ($mostrar1) ?>, <?php echo ($mostrar2) ?>,<?php echo ($mostrar3) ?>, <?php echo ($mostrar4) ?>, <?php echo ($mostrar5) ?>, <?php echo ($mostrar6) ?>, <?php echo ($mostrar7) ?>,<?php echo ($mostrar8) ?>, <?php echo ($mostrar9) ?>, <?php echo ($mostrar10) ?>, <?php echo ($mostrar11) ?>, <?php echo ($mostrar12) ?>,]
            }, ]
        });
    </script>
    <?php
    include("../plantillas/piePagina.php");
    ?>