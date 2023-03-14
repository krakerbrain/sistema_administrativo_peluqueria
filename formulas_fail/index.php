<?php

require '../config.php';
include "../partials/header.php";
$indice = "formulas";
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
  <h4>Creación de fórmulas</h4>
    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%">
        <!-- <label for="servicio">Servicio</label>
        <select name="servicio" id="servicio" onchange="creacion_tabla(value)"></select> -->
        <label for="servicio">Servicio</label>
      <input type="hidden" name="idservicio" id="idservicio">
      <input type="text" name="nombre_servicio" id="nombre_servicio" placeholder ="Escriba el nombre aquí..." onkeyup="selecciona_lista(event,'nombre_servicio','servicios_principales', 'idservicio', 'nombre_servicio')" />
      <ul id="lista_nombres" class="lista_nombres">
        <li id="li_nuevo" style="display:none;background:#dc354566;cursor:pointer" data-toggle="modal" data-target="#creaNuevoServicio">Crear nuevo servicio</li>
      </ul>

      <?php 
      $formula = true;
      include "../partials/tipo_cabello.php" 
      ?>

        <label for="producto">Producto</label>
        <select name="producto" id="producto"></select>
        <div>
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad">
        <label for="unidad_medida">Unidad de Medida</label>
        <select name="unidad_medida" id="unidad_medida">
          <option value="gr">gramos</option>
        </select>
        </div>
        <input type="button" value="Guardar" onclick="agrega_formula()">
    </form>
    <div id="titulo"></div>
    <?php
    $titulo = "Crear nuevo servicio";
    $campo1 = '<label for="nombre_servicio_nuevo" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre_servicio_nuevo">' ;   
    $id_modal = 'creaNuevoServicio';   
    $funcion = "registra_nuevo('nombre_servicio_nuevo', '', 'idservicio', 'registro_servicio', 'nombre_servicio')";     
    include("../components/registra_nuevo/modal.php");
    ?>
</body>

<?php include "../partials/boostrap_script.php" ?>
<script src="../components/lista_desplegable/lista_desplegable.js"></script>
<script type="text/javascript">
  window.onload = function () {
    obtener_productos();
  };

function obtiene_formula(){
  titulo.innerHTML = `<h5>${nombre_servicio.value} / Largo ${document.querySelector('input[name="largo_cabello"]:checked').value} / Volumen ${document.querySelector('input[name="volumen_cabello"]:checked').value}</h5>`

  // $.post("conexiones.php", {
  //     ingresar: "agrega_formula",
  //     servicio:servicio.value,
  //     producto: producto.value,
  //     cantidad: cantidad.value,
  //     medida: unidad_medida.value
  //   }).done(function(data,error){
  //       creacion_tabla(servicio.value);
  //   }).fail(function() {
  //     alert( "error" );
  //   });
}
  function obtener_productos(){
    $.post("conexiones.php", {
      ingresar: "obtener_productos",
      dataType: "json"
    }).done(function(data,error){
      let datos = JSON.parse(data);
      datos.forEach(element => {
        producto.innerHTML += `<option value="${element.idproducto}">${element.nombre_producto}</option>`;
      });
    }).fail(function() {
      alert( "error" );
    });
  }
    function agrega_formula(){
      $.post("conexiones.php", {
      ingresar: "agrega_formula",
      servicio:servicio.value,
      producto: producto.value,
      cantidad: cantidad.value,
      medida: unidad_medida.value
    }).done(function(data,error){
        creacion_tabla(servicio.value);
    }).fail(function() {
      alert( "error" );
    });
    }


</script>