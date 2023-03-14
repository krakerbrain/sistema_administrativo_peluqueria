<?php

include('../config.php');
/**Se recibe un parámetro que ejecuta el switch según lo que se recibe */
$ingresar   = $_POST['ingresar'];
switch ($ingresar) {
    case 'obtener_servicios':
        $sql = $con->prepare("SELECT * FROM servicios");
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($datos);
        echo $json;
        break;
    case 'obtener_productos':
        $sql = $con->prepare("SELECT * FROM productos");
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($datos);
        echo $json;
        break;
    // case 'obtener_formula':
    //     $idservicio = $_POST['idservicio'];
    //     $sql = $con->prepare("SELECT s.nombre_servicio, p.nombre_producto, f.cantidad, p.unidad_medida, (p.peso_neto * f.cantidad/p.costo_producto) AS costo FROM formulas f 
    //                         JOIN productos p 
    //                         ON p.idproducto = f.id_producto 
    //                         JOIN servicios s
    //                         ON s.idservicios = f.id_servicio
    //                         WHERE id_servicio = :idservicio");
    //     $sql->bindParam(':idservicio', $idservicio);   
    //     $sql->execute();
    //     $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
    //     $json = json_encode($datos);
    //     echo $json; 
    //     # code...
    //     break;
    case 'agrega_formula': 
        $idservicio       = $_POST['servicio'];
        $idproducto       = $_POST['producto'];
        $cantidad       = $_POST['cantidad'];
        $unidad_medida         = $_POST['medida'];
        $sql = $con->prepare("INSERT INTO formulas(id_servicio, id_producto, cantidad, unidad_medida) VALUES (:idservicio,:idproducto,:cantidad,:unidad_medida)");
        $sql->bindParam(':idservicio', $idservicio);
        $sql->bindParam(':idproducto', $idproducto);
        $sql->bindParam(':cantidad', $cantidad);
        $sql->bindParam(':unidad_medida', $unidad_medida);
        $sql->execute();
        break;
    default:
        # code...
        break;
}

?>