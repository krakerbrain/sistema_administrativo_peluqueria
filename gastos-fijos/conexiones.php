<?php

include('../config.php');
/**Se recibe un parámetro que ejecuta el switch según lo que se recibe */
$ingresar   = $_POST['ingresar'];
switch ($ingresar) {
    case 'agrega_gasto_fijo': 
        $gasto_fijo   = $_POST['descripcion'];
        $monto   = $_POST['monto'];
        $sql = $con->prepare("INSERT INTO gastos_fijos(descripcion,monto) VALUES (:gasto_fijo, :monto)");
        $sql->bindParam(':gasto_fijo', $gasto_fijo);
        $sql->bindParam(':monto', $monto);
        $sql->execute();
        break;
        case 'obtener_gastos_fijos':
            $sql = $con->prepare("SELECT * FROM gastos_fijos");
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