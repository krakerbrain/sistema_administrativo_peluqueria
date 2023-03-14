<?php
include('../config.php');

$ingresar   = $_POST['ingresar'];
switch ($ingresar) {
    case 'selecciona_lista':
        $inicial    = $_POST['inicial'];
        $query = "SELECT idservicio, nombre_servicio FROM servicios_principales WHERE nombre_servicio like concat('".$inicial."','%')";
        $sql = $con->prepare($query);
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_NAMED);
        $json = json_encode($datos);
        echo $json;
        break;
    case 'selecciona_lista_prod':
        $inicial    = $_POST['inicial'];
        $query = "SELECT idproducto, nombre_producto FROM productos WHERE nombre_producto like concat('".$inicial."','%')";
        $sql = $con->prepare($query);
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_NAMED);
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
     case 'obtener_formula':
        $idservicio = $_POST['idservicio'];
        $largo       = $_POST['largo'];
        $volumen       = $_POST['volumen'];
        $sql = $con->prepare("SELECT p.nombre_producto,f.idformula,f.largo_cabello, f.volumen_cabello,f.cantidad, f.unidad_medida,cast((p.costo_unitario * f.cantidad/1000) as float) AS costo from formulas f 
                                join productos p 
                                on f.id_producto = p.idproducto 
                                where f.id_servicio = :idservicio
                                and f.largo_cabello = :largo
                                and f.volumen_cabello = :volumen");
        $sql->bindParam(':idservicio', $idservicio);
        $sql->bindParam(':largo', $largo);
        $sql->bindParam(':volumen', $volumen);  
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($datos);
        echo $json; 
        # code...
        break;       
     case 'obtener_producto_formula':
        $idformula = $_POST['idformula'];
        $sql = $con->prepare("SELECT p.nombre_producto,f.idformula,f.cantidad, f.unidad_medida from formulas f 
                                join productos p 
                                on f.id_producto = p.idproducto 
                                where f.idformula = :idformula");
        $sql->bindParam(':idformula', $idformula);
        $sql->execute();
        $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($datos);
        echo $json; 
        # code...
        break;       
        case 'agrega_formula': 
            $idservicio       = $_POST['idservicio'];
            $largo       = $_POST['largo'];
            $volumen       = $_POST['volumen'];
            $idproducto       = $_POST['idproducto'];
            $cantidad       = $_POST['cantidad'];
            $unidad_medida         = $_POST['medida'];
            $sql = $con->prepare("INSERT INTO formulas(id_servicio, largo_cabello, volumen_cabello, id_producto, cantidad, unidad_medida) VALUES (:idservicio, :largo, :volumen, :idproducto,:cantidad,:unidad_medida)");
            var_dump($largo);
            $sql->bindParam(':idservicio', $idservicio);
            $sql->bindParam(':largo', $largo);
            $sql->bindParam(':volumen', $volumen);
            $sql->bindParam(':idproducto', $idproducto);
            $sql->bindParam(':cantidad', $cantidad);
            $sql->bindParam(':unidad_medida', $unidad_medida);
            $sql->execute();
            break;
        case 'elimina_producto_formula':
            $idformula = $_POST['idformula'];
            $sql = $con->prepare("DELETE FROM formulas WHERE idformula = :idformula");
            $sql->bindParam(':idformula', $idformula);
            $sql->execute();
            break; 
    
    default:
        # code...
        break;
}

?>