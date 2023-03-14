<?php

include('../config.php');
/**Se recibe un parámetro que ejecuta el switch según lo que se recibe */
$ingresar   = $_POST['ingresar'];
switch ($ingresar) {
    case 'agrega_estilista': 
        $nombre_estilista   = $_POST['nombre'];
        $porcentaje         = $_POST['porcentaje'];
        $sql = $con->prepare("INSERT INTO estilistas(nombre_estilista, porcentaje_ganancia) VALUES (:nombre_estilista, :porcentaje)");
        $sql->bindParam(':nombre_estilista', $nombre_estilista);
        $sql->bindParam(':porcentaje', $porcentaje);
        $sql->execute();
        break;
    case 'obtener_estilistas':
        $idestilista = isset($_POST['idestilista']) ? $_POST['idestilista'] : "";
        if($idestilista != ""){
            $sql = $con->prepare("SELECT * FROM estilistas where idestilista = :idestilista");
            $sql->bindParam(':idestilista', $idestilista);
        }else{
            $sql = $con->prepare("SELECT * FROM estilistas where activa = true");
        }
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($datos);
        echo $json; 
        break; 
    case 'actualiza_estilista':
        $idestilista = $_POST['idestilista'];
        $nombre_estilista   = $_POST['nombre'];
        $porcentaje         = $_POST['porcentaje'];
        $sql = $con->prepare("UPDATE estilistas SET nombre_estilista = :nombre_estilista, porcentaje_ganancia = :porcentaje WHERE idestilista = :idestilista");
        $sql->bindParam(':idestilista', $idestilista);
        $sql->bindParam(':nombre_estilista', $nombre_estilista);
        $sql->bindParam(':porcentaje', $porcentaje);
        $sql->execute();
        break;
    case 'elimina_estilista':
        $idestilista = $_POST['idestilista'];
        $sql = $con->prepare("UPDATE estilistas SET activa = false WHERE idestilista = :idestilista");
        $sql->bindParam(':idestilista', $idestilista);
        $sql->execute();
        break;       
    default:
        # code...
        break;
}

?>