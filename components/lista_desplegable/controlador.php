<?php
include('C:\xampp\htdocs\costos-adri\config.php');
        
$inicial    = $_POST['inicial'];
$condicion  = $_POST['condicion'];
$tabla      = $_POST['tabla'];
$campo1      = $_POST['campo1'];
$campo2      = $_POST['campo2'];
$query = "SELECT ".$campo1.",".$campo2." FROM ".$tabla." WHERE ".$condicion." like concat('".$inicial."','%')";
// var_dump($query);
$sql = $con->prepare($query);
$sql->execute();
$datos = $sql->fetchAll(PDO::FETCH_NAMED);
$json = json_encode($datos);
echo $json;

?>

