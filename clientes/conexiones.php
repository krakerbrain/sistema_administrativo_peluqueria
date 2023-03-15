<?php

include('../config.php');
/**Se recibe un parámetro que ejecuta el switch según lo que se recibe */
$ingresar   = $_POST['ingresar'];
switch ($ingresar) {
    case 'registra_servicio': 
        $fecha=         $_POST["fecha"];
        $estilista=     $_POST["estilista"];
        $idcliente=     $_POST["idcliente"];
        $idservicio=    $_POST["idservicio"];
        $largo=         $_POST["largo"];
        $volumen=       $_POST["volumen"];
        $monto=         $_POST["monto"];
        $costo_servicio = costo_servicio($con, $idservicio, $largo, $volumen);

        $sql = $con->prepare("INSERT INTO servicios_registro(fecha,id_estilista, id_cliente, id_servicio, largo_cabello, volumen_cabello, monto_cobrado, costo_servicio, gastos_fijos) VALUES (:fecha,:estilista,:idcliente,:idservicio,:largo,:volumen,:monto, $costo_servicio,0)");
        $sql->bindParam(':fecha',$fecha);
        $sql->bindParam(':estilista',$estilista);
        $sql->bindParam(':idcliente',$idcliente);
        $sql->bindParam(':idservicio',$idservicio);
        $sql->bindParam(':largo',$largo);
        $sql->bindParam(':volumen',$volumen);
        $sql->bindParam(':monto',$monto);
        if($sql->execute()){
            gasto_fijo($con,$fecha);
        }
        
        break;
        case 'selecciona_cliente':
        $inicial  = $_POST['inicial'];
            $sql = $con->prepare("SELECT idcliente,nombre_cliente FROM clientes_registro WHERE nombre_cliente like concat(:inicial,'%')");
            $sql->bindParam(':inicial',$inicial);
            $sql->execute();
            $datos = $sql->fetchAll(PDO::FETCH_NAMED);
            $json = json_encode($datos);
            echo $json; 

        break;    
    default:
        # code...
        break;
}

function costo_servicio($con, $idservicio, $largo, $volumen){
    $sql = $con->prepare("SELECT sum(cantidad) as total from formulas where id_servicio = :idservicio and largo_cabello = :largo and volumen_cabello = :volumen;");
    $sql->bindParam(':idservicio',$idservicio);
    $sql->bindParam(':largo',$largo);
    $sql->bindParam(':volumen',$volumen);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $datos){
        return $datos['total'] == NULL ? 0 : intval($datos['total']);
    }
}

function gasto_fijo($con, $fecha){
    $sql = $con->prepare("SELECT COUNT(*) AS servicios_realizados FROM servicios_registro WHERE fecha = :fecha GROUP BY fecha");
    $sql->bindParam(':fecha', $fecha);
    if($sql->execute()){
        $resultado = $sql->fetchColumn();
        $sql2 = $con->prepare("UPDATE servicios_registro SET gastos_fijos = (SELECT SUM(monto)/24/$resultado FROM gastos_fijos) WHERE fecha = :fecha");
        $sql2->bindParam(':fecha', $fecha);
        $sql2->execute();
    }
}


?>