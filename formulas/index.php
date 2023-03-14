<?php

require '../config.php';
include "../partials/header.php";
$indice = "formulas";
$titulo_pagina = "Fórmulas";
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
<form action="" method="post" style="display: flex; flex-direction: column; width: 50%">
      <label for="servicio">Servicio</label>
      <?php 
      include "desplegable_servicios.php"; 
      $formula = true;
      include "../partials/tipo_cabello.php";
      include "desplegable_productos.php"; 
      ?>
        <?php
          $titulo = "Crear nuevo producto";
          $campos = '<div class="form-group">
                      <label for="nombre_producto">Nombre Producto</label>
                      <input type="text" name="nombre_producto" id="nombre_producto">
                      </div>
                      <div class="form-group">
                      <label for="costo_producto">Costo Producto</label>
                      <input type="number" name="costo_producto" id="costo_producto">
                      </div>
                      <div class="form-group">
                      <label for="peso_neto">Peso Neto</label>
                      <input type="number" name="peso_neto" id="peso_neto">
                      </div>
                      <div class="form-group">
                      <label for="unidad_medida">Unidad de Medida</label>
                      <select name="unidad_medida_modal" id="unidad_medida_modal">
                      <option value="gr">gramos</option>
                      </select>
                      </div>
                      ' ;   
          $id_modal = 'creaNuevoProducto';   
          $funcion = "agrega_producto()";     
          include("../components/registra_nuevo/modal.php");
        ?>
        <div>
        <input type="hidden" name="idproducto_formula" id="idproducto_formula" value="">
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" onchange="habilita_guardar()" onkeyup="habilita_guardar()" disabled>
        <label for="unidad_medida">Unidad de Medida</label>
        <select name="unidad_medida" id="unidad_medida" disabled>
          <option value="gr">gramos</option>
        </select>
        </div>
        <input type="button" value="Guardar" id="btn_guardar" onclick="agrega_formula()" disabled>
</form>
<?php
    $titulo = "Crear nuevo servicio";
    $campos = '<div class="form-group">
                <label for="nombre_servicio_nuevo" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre_servicio_nuevo">
                </div>' ;   
    $id_modal = 'creaNuevoServicio';   
    $funcion = "registra_nuevo('nombre_servicio_nuevo', '', 'idservicio', 'registro_servicio', 'nombre_servicio')";     
    include("../components/registra_nuevo/modal.php");
    ?>

    <div>
      <div >
        <h4 id="titulo_formula"></h4>
        <h5 id="costo_total_formula"></h5>
        <!-- <h4>Balayage | Largo | Abundante</h4> -->
      </div>
      <table class="table">  
        <thead>
          <tr>
            <td>Nombre Producto</td>
            <td>Cantidad</td>
            <td>Costo</td>
            <td>Acciones</td>
          </tr>
        </thead>
        <tbody id="tabla_formula">
          <!-- <tr>
            <td>Shampoo</td>
            <td>900gr</td>
            <td>2000</td>
          </tr> -->
        </tbody>
      </table>
    </div>
</body>

<?php include "../partials/boostrap_script.php" ?>

<script>
function obtiene_formula(){
  titulo_formula.innerHTML = ""
  tabla_formula.innerHTML = ""
  nombre_producto_form.disabled = false;

  $.post("conexiones.php", {
      ingresar: "obtener_formula",
      idservicio:idservicio.value,
      largo: document.querySelector('input[name="largo_cabello"]:checked').value,
      volumen: document.querySelector('input[name="volumen_cabello"]:checked').value,
    }).done(function(data,error){
      let datos = JSON.parse(data);
      datos.forEach(element => {
        titulo_formula.innerHTML = `${nombre_servicio.value} | ${element.largo_cabello} | ${element.volumen_cabello}`;
        tabla_formula.innerHTML += `<tr>
                                      <td>${element.nombre_producto}</td>
                                      <td>${element.cantidad} ${element.unidad_medida}</td>
                                      <td>${element.costo.toFixed(2)}</td>
                                      <td>
                                        <a onclick='cargaProductoFormula(${element.idformula})'>Editar</a> |
                                        <a onclick='borrarProductoFormula(${element.idformula})'>Borrar</a>
                                      </td>
                                    </tr>`;

      });
    }).fail(function() {
      alert( "error" );
    });
}

function borrarProductoFormula(idformula){
  $.post("conexiones.php", {
        ingresar: "elimina_producto_formula",
        idformula: idformula
      }).done(function(data,error){
        obtiene_formula();
      }).fail(function() {
        alert( "error" );
      });
}

function cargaProductoFormula(idformula){
      $.post("conexiones.php", {
        ingresar: "obtener_producto_formula",
        idformula: idformula
      }).done(function(data,error){
        let datos = JSON.parse(data);
          datos.forEach(element => {
            idproducto_formula.value = element.idformula;
            nombre_producto_form.value = element.nombre_producto;
            cantidad.value = element.cantidad;
            cantidad.disabled = false;
            unidad_medida.value = element.unidad_medida;

            habilita_guardar();
          })
      }).fail(function() {
        alert( "error" );
      });
    }

function agrega_formula(){

  
  $.post("conexiones.php", {
    ingresar: "agrega_formula",
    idservicio:idservicio.value,
    idproducto: idproducto.value,
    largo: document.querySelector('input[name="largo_cabello"]:checked').value,
    volumen: document.querySelector('input[name="volumen_cabello"]:checked').value,
    cantidad: cantidad.value,
    medida: unidad_medida.value
  }).done(function(data,error){
    obtiene_formula()
//Quiero eliminar el producto editado y agregarlo con los nuevos valores

    if(idproducto_formula.value != ""){
      borrarProductoFormula(idproducto_formula.value)
    }
    }).fail(function() {
      alert( "error" );
    });
  
}


function agrega_producto(){
      $.post("../productos/conexiones.php", {
      ingresar: "agrega_producto",
      nombre:nombre_producto.value,
      costo: parseFloat(costo_producto.value),
      peso: peso_neto.value,
      medida: unidad_medida_modal.value
    }).done(function(data,error){

      nombre_producto_form.value = nombre_producto.value;
      idproducto.value = data;
      removeElements_prod();
    }).fail(function() {
      alert( "error" );
    });
    }

function habilita_guardar(){
  if(cantidad.value != ""){
    btn_guardar.disabled = false
  }else{
    btn_guardar.disabled = true
  }
}
</script>