<?php

require '../config.php';
include "../partials/header.php";
$indice = "servicios";
?>
  <style>
    label {
      padding-top: 5px;
    }

    input {
      margin-bottom: 5px;
    }
  </style>
<body class="container">
<?php include __DIR__."/../partials/navbar.php"; ?>
<input type="hidden" name="idservicio" id="idservicio">
<h4>Ingreso de Servicios</h4>
    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%">
        <label for="nombre_servicio">Nombre Servicio</label>
        <input type="text" name="nombre_servicio" id="nombre_servicio">

        <?php include "../partials/tipo_cabello.php" ?>


        <label for="costo_servicio">Costo Servicio</label>
        <input type="number" name="costo_servicio" id="costo_servicio">
        <input type="button" value="Guardar" onclick="agrega_servicio()">
    </form>
    <div>
      <h4>Listado de Servicios</h4>
        <table class="table table-fixed">
          <thead>
            <tr>
              <th class="col-sm-2">Servicio</th>
              <th class="col-sm-2">Largo</th>
              <th class="col-sm-2">Volumen</th>
              <th class="col-sm-2">Precio</th>
              <th class="col-sm-2">Gasto Aprox</th>
              <th class="col-sm-2">Ganancia Aprox</th>
              <th class="col-sm-2">Eliminar</th>
            </tr>
          </thead>
          <tbody id="servicios"></tbody>
        </table>
    </div>
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alertaEliminaServicio">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="alertaEliminaServicio" tabindex="-1" aria-labelledby="alertaEliminaServicioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="alertaEliminaServicioLabel">Se eliminará el servicio</h4>
      </div>
      <div class="modal-body">
        Esta acción eliminará todos los registros relacionados a este servicio incluyendo las fórmulas. <br>
        ¿Está seguro de querer Eliminar el Servicio?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="elimina_servicio()">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</body>

<?php include "../partials/boostrap_script.php" ?>

<script type="text/javascript">

    window.onload = function () {
      creacion_tabla_servicios();
    };

    function agrega_servicio(){
      $.post("conexiones.php", {
      ingresar: "agrega_servicio",
      nombre:nombre_servicio.value,
      costo: costo_servicio.value
    }).done(function(data,error){
      creacion_tabla_servicios();
    }).fail(function() {
      alert( "error" );
    });
    }

    function creacion_tabla_servicios(){
       servicios.innerHTML = ""
      $.post("conexiones.php", {
        ingresar: "obtener_servicios",
        dataType: "json"
      }).done(function(data,error){
          let datos = JSON.parse(data);
          console.log(datos);
          datos.forEach(element => {
            servicios.innerHTML += `<tr>
            <td>${element.nombre_servicio}</td>
            <td>Largo</td>
            <td>Abundante</td>
            <td>${element.costo_servicio}</td>
            <td>0</td>
            <td>0</td>
            <td style='cursor:pointer' class='text-center' data-toggle="modal" data-target="#alertaEliminaServicio"  onclick='guardaId(this)' data-idservicio="${element.idservicios}">
                <i class='fa-solid fa-xmark text-danger'></i>
            </td>
            </tr>
            `
          })
      }).fail(function() {
        alert( "error" );
      });

    }

    function guardaId(event){
      idservicio.value=event.dataset.idservicio;
    } 

    function elimina_servicio(){
      $.post("conexiones.php", {
        ingresar: "elimina_servicio",
        idservicio:idservicio.value
      }).done(function(data,error){
        creacion_tabla_servicios();
      }).fail(function() {
        alert( "error" );
      });
    }


</script>