<?php

require '../config.php';
include "../partials/header.php";
$indice = "gastos-fijos";
$titulo_pagina = "Gastos Fijos";
?>

<body class="container px-0" style="max-width:850px">
    <?php include __DIR__."/../partials/navbar.php"; ?>
    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%">
        <label for="tipo_gasto">Tipo de Gasto</label>
        <input type="text" name="tipo_gasto" id="tipo_gasto">
        <label for="monto_gasto">Monto</label>
        <input type="number" name="monto_gasto" id="monto_gasto">
        <input class="my-4" type="button" value="Guardar" id="btn_guardar_gasto_fijo" onclick="agrega_gasto_fijo()">
    </form>
    <div>
        <div class="d-flex justify-content-between">
            <h5>Listado de Gastos Fijos</h5>
            <h5>Total $<span id="total_gastos"></span></h5>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Monto</th>
            </tr>
          </thead>
          <tbody id="lista_gastos">

          </tbody>
        </table>
    </div>
</body>
<?php include "../partials/boostrap_script.php" ?>
<script>

window.onload = function () {
    creacion_tabla_gastos_fijos();
    };
function agrega_gasto_fijo(){
      $.post("conexiones.php", {
      ingresar: "agrega_gasto_fijo",
      descripcion:tipo_gasto.value,
      monto:monto_gasto.value  
    }).done(function(data,error){
        creacion_tabla_gastos_fijos()
    }).fail(function() {
      alert( "error" );
    });
}

function creacion_tabla_gastos_fijos(){
        lista_gastos.innerHTML = "";
        total_gastos.innerHTML = "";
      $.post("conexiones.php", {
        ingresar: "obtener_gastos_fijos",
        dataType: "json"
      }).done(function(data,error){
        console.log(data)
          let datos = JSON.parse(data);
          let gastos_totales = datos.reduce((acumulador, actual) => acumulador + actual.monto, 0);
          total_gastos.innerHTML  = gastos_totales.toLocaleString("en");  
          datos.forEach(element => {
            
            lista_gastos.innerHTML += `<tr>
            <td>${element.descripcion}</td>
            <td>$${element.monto.toLocaleString("en")}</td>
            </tr>
            `
          })

      }).fail(function() {
        alert( "error" );
      });

    }
</script>