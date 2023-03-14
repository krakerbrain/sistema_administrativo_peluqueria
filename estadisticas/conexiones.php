<?php

include('../config.php');
/**Se recibe un parámetro que ejecuta el switch según lo que se recibe */
$ingresar   = $_POST['ingresar'];
switch ($ingresar) {
    case 'servicios_realizados':
        $sql = $con->prepare("SELECT * FROM vw_servicios_realizados");
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($datos);
        echo $json; 
        break;        
    default:
        # code...
        break;
}

?>