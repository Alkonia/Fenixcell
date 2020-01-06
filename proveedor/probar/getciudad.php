<?php $con = mysqli_connect('localhost', 'root', '', 'fenixx'); 
$id_dpato = $_POST['id_dpato'];
	
$queryM = "SELECT id_ciu, nom_ciu FROM ciudad WHERE id_dpto1_FK = '$id_dpato' ORDER BY nom_ciu";
$resultadoM = $con->query($queryM);

$html= "<option value='0'>Seleccionar ciudad</option>";

while($rowM = $resultadoM->fetch_assoc())
{
    $html.= "<option value='".$rowM['id_ciu']."'>".$rowM['nom_ciu']."</option>";
}

echo $html;

?>