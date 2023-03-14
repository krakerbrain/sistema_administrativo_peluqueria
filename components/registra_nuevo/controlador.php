<?php
include('C:\xampp\htdocs\costos-adri\config.php');
$tabla = $_POST["tabla"];

switch ($tabla) {
    case 'registro_cliente':
        $nombre_cliente   = $_POST['campo1'];
        $correo_cliente   = $_POST['campo2'];
        $sql = $con->prepare("INSERT INTO clientes_registro(nombre_cliente, correo_cliente, fecha_creacion) VALUES (:nombre_cliente,:correo_cliente, now())");
        $sql->bindParam(':nombre_cliente', $nombre_cliente);
        $sql->bindParam(':correo_cliente', $correo_cliente);
        $sql->execute();
        $LAST_ID = $con->lastInsertId();
        echo $LAST_ID;
        break;
    case 'registro_servicio':
        $nombre_servicio  = $_POST['campo1'];
        $sql = $con->prepare("INSERT INTO servicios_principales(nombre_servicio, fecha_creacion_servicio) VALUES (:nombre_servicio, now())");
        $sql->bindParam(':nombre_servicio', $nombre_servicio);
        $sql->execute();
        $LAST_ID = $con->lastInsertId();
        echo $LAST_ID;
        break;
    
    default:
        # code...
        break;
}



?>