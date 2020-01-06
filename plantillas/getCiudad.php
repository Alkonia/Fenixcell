<?php 
$con = mysqli_connect('localhost', 'root', '', 'fenixx');
$id_dep = $_POST['id_'];
$queryc = "SELECT id_ciu, nom_ciu FROM ciudad WHERE id_dpto1_FK='$id_dep'";
while ($rowC = mysqli_fetch_array($queryc)) {
$html = "<option value='".$rowC['id_ciu']."'>".$rowC['nom_ciu']."</option>";
}
echo $html;

?>