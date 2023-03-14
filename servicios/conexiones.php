<?php

include('../config.php');
/**Se recibe un parámetro que ejecuta el switch según lo que se recibe */
$ingresar   = $_POST['ingresar'];
switch ($ingresar) {
    case 'agrega_servicio': 
        $nombre_servicio   = $_POST['nombre'];
        $costo_servicio    = $_POST['costo'];
        $sql = $con->prepare("INSERT INTO servicios(nombre_servicio, costo_servicio) VALUES (:nombre_servicio,:costo_servicio)");
        $sql->bindParam(':costo_servicio', $costo_servicio);
        $sql->bindParam(':nombre_servicio', $nombre_servicio);
        $sql->execute();
        break;
    case 'obtener_servicios':
        $sql = $con->prepare("SELECT * FROM servicios_principales");
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($datos);
        echo $json; 
        break;        
    case 'elimina_servicio':
        $idservicio   = $_POST['idservicio'];
        $sql = $con->prepare("DELETE FROM servicios WHERE idservicios = :idservicio");
        $sql->bindParam(':idservicio', $idservicio);
        $sql->execute();
        break;        
    default:
        # code...
        break;
}

?>