<?php

include('../config.php');
/**Se recibe un parámetro que ejecuta el switch según lo que se recibe */
$ingresar   = $_POST['ingresar'];
switch ($ingresar) {
    case 'agrega_producto': 
        $nombre_producto   = $_POST['nombre'];
        $costo_producto    = floatval($_POST['costo']);
        $peso_neto         = $_POST['peso'];
        $unidad_medida     = $_POST['medida'];
        $costo_unitario     = $costo_producto*1000/$peso_neto;
        $sql = $con->prepare("INSERT INTO productos(nombre_producto, costo_producto, peso_neto, unidad_medida,costo_unitario) VALUES (:nombre_producto,:costo_producto,:peso_neto,:unidad_medida,:costo_unitario)");
        $sql->bindParam(':costo_producto', $costo_producto,PDO::PARAM_STR);
        $sql->bindParam(':nombre_producto', $nombre_producto);
        $sql->bindParam(':peso_neto', $peso_neto);
        $sql->bindParam(':unidad_medida', $unidad_medida);
        $sql->bindParam(':costo_unitario', $costo_unitario,PDO::PARAM_STR);
        $sql->execute();
        $LAST_ID = $con->lastInsertId();
        echo $LAST_ID;
        break;
    case 'actualiza_producto': 
        $id_producto = $_POST['idproducto'];
        $nombre_producto   = $_POST['nombre'];
        $costo_producto    = floatval($_POST['costo']);
        $peso_neto         = $_POST['peso'];
        $unidad_medida     = $_POST['medida'];
        $costo_unitario     = $costo_producto*1000/$peso_neto;
        $sql = $con->prepare("UPDATE productos SET nombre_producto = :nombre_producto, costo_producto = :costo_producto, peso_neto = :peso_neto, unidad_medida = :unidad_medida, costo_unitario = :costo_unitario WHERE idproducto = :idproducto");
        $sql->bindParam(':idproducto', $id_producto);
        $sql->bindParam(':costo_producto', $costo_producto,PDO::PARAM_STR);
        $sql->bindParam(':nombre_producto', $nombre_producto);
        $sql->bindParam(':peso_neto', $peso_neto);
        $sql->bindParam(':unidad_medida', $unidad_medida);
        $sql->bindParam(':costo_unitario', $costo_unitario,PDO::PARAM_STR);
        $sql->execute();
        $LAST_ID = $con->lastInsertId();
        echo $LAST_ID;
        break;
    case 'obtener_productos':
        $id_producto = isset($_POST['idproducto']) ? $_POST['idproducto'] : "";
        if($id_producto != ""){
            $sql = $con->prepare("SELECT * FROM productos WHERE idproducto = :idproducto");
            $sql->bindParam(':idproducto', $id_producto);
        }else{
            $sql = $con->prepare("SELECT * FROM productos");
        }
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($datos);
        echo $json; 
        break;    
  
    case 'elimina_producto':
        $id_producto = $_POST['idproducto'];
        $sql = $con->prepare("DELETE FROM productos WHERE idproducto = :idproducto");
        $sql->bindParam(':idproducto', $id_producto);
        $sql->execute();
        break;    
    default:
        # code...
        break;
}

?>