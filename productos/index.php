<?php

require '../config.php';
include "../partials/header.php";
$indice = "productos";
$titulo_pagina = "Registro de Productos";
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
    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%" id="formulario_producto">
        <input type="hidden" name="idproducto" id="idproducto" value="">
        <label for="nombre_producto">Nombre Producto</label>
        <input type="text" name="nombre_producto" id="nombre_producto">
        <label for="costo_producto">Costo Producto</label>
        <input type="number" name="costo_producto" id="costo_producto">
        <div>
        <label for="peso_neto">Peso Neto</label>
        <input type="number" name="peso_neto" id="peso_neto">
        <label for="unidad_medida">Unidad de Medida</label>
        <select name="unidad_medida" id="unidad_medida">
          <option value="gr">gramos</option>
        </select>
        </div>
        <input type="button" value="Guardar" onclick="agrega_producto()">
    </form>
    <div>
      <h4>Listado de Productos</h4>
        <table class="table">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Peso Neto</th>
              <th>Unidad medida</th>
              <th>Costo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="productos">

          </tbody>
        </table>
    </div>
</body>

<?php include "../partials/boostrap_script.php" ?>

<script type="text/javascript">
    window.onload = function () {
      creacion_tabla_productos();
    };
    function agrega_producto(){
      let accion = idproducto.value == "" ? "agrega_producto" : "actualiza_producto";
      $.post("conexiones.php", {
      ingresar: accion,
      idproducto: idproducto.value,
      nombre:nombre_producto.value,
      costo: costo_producto.value,
      peso: peso_neto.value,
      medida: unidad_medida.value
    }).done(function(data,error){
      creacion_tabla_productos()
    }).fail(function() {
      alert( "error" );
    });
    }

    function creacion_tabla_productos(){
       formulario_producto.reset()
       productos.innerHTML = ""
      $.post("conexiones.php", {
        ingresar: "obtener_productos",
        dataType: "json"
      }).done(function(data,error){
          let datos = JSON.parse(data);
          datos.forEach(element => {
            productos.innerHTML += `<tr>
            <td>${element.nombre_producto}</td>
            <td>${element.peso_neto}</td>
            <td>${element.unidad_medida}</td>
            <td>${element.costo_producto}</td>
            <td>
              <a style="cursor:pointer" onclick='cargaProducto(${element.idproducto})'>Editar</a> |
              <a style="cursor:pointer" onclick='eliminaProducto(${element.idproducto})'>Borrar</a>
            </td>
            </tr>
            `
          })
      }).fail(function() {
        alert( "error" );
      });

    }
    function cargaProducto(id){
      $.post("conexiones.php", {
        ingresar: "obtener_productos",
        idproducto: id
      }).done(function(data,error){
        let datos = JSON.parse(data);
          datos.forEach(element => {
            idproducto.value = element.idproducto;
            nombre_producto.value = element.nombre_producto;
            costo_producto.value = element.costo_producto;
            peso_neto.value = element.peso_neto;
          })
      }).fail(function() {
        alert( "error" );
      });
    }

    function eliminaProducto(id){
      $.post("conexiones.php", {
        ingresar: "elimina_producto",
        idproducto: id
      }).done(function(data,error){
        if(data != ""){
          alert("Este producto no puede ser borrado ya que está asociado a una fórmula")
        }else{
          if(confirm("Este producto será eliminado. ¿Está seguro?")){
            creacion_tabla_productos();
          }
        }
      }).fail(function() {
        alert( "error" );
      });
    }

</script>