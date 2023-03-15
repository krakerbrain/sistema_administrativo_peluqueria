<?php

require '../config.php';
include "../partials/header.php";
$indice = "estadisticas";
$titulo_pagina = "Estadísticas de Servicios";
?>
  <style>
    label {
      padding-top: 5px;
    }

    input {
      margin-bottom: 5px;
    }
    @media screen and (max-width: 55em) and (min-width: 34em){
      table{
        font-size:12px
      }
    }
    @media screen and (max-width: 35em) {
      table{
        width:100%
      }
        table tr{
          display: flex;
          flex-direction: column;
          border: 1px solid grey;
          padding: 1em
        }
        table thead{
          display:none
        }
        table td[data-titulo]{
          display:flex;
        }
        table td[data-titulo]::before{
          content: attr(data-titulo);
          width: 130px;
          color: silver;
          font-weight: bold
        }

    }
  </style>
<body>
<div class="container px-0" style="max-width:850px">
  <?php include __DIR__."/../partials/navbar.php"; ?>
  <div>
<fieldset style="margin-top:20px">
            <legend style="font-size:1em;cursor:pointer" class="align-items-center bg-danger d-flex justify-content-between p-1 text-light" onclick="ocultaFieldset(tabla_servicios_realizados, icono_fieldset_servicios)">
                <span>Estadísticas de Servicios</span>
                <div class="ocultaRutas">
                    <i id="icono_fieldset_servicios" class="bi bi-caret-down-square-fill"></i>
                </div>
            </legend>
            <div id="tabla_servicios_realizados" style="display:block">
              <table id="tabla_servicios" >
                <thead>
                  <tr>
                    <td>Fecha</td>
                    <td>Estilista</td>
                    <td>Cliente</td>
                    <td>Servicio</td>
                    <td>Largo</td>
                    <td>Volumen</td>
                    <td>Monto cobrado</td>
                    <td>Pago estilista</td>
                    <td>Costo Productos</td>
                    <td>Gastos Fijos</td>
                    <td>Ganancia Aprox</td>
                  </tr>
                </thead>
                <tbody id="registros_servicios"></tbody>
              </table>
            </div>
</fieldset>
</div>
</div>
</body>

<?php include "../partials/boostrap_script.php" ?>

<script type="text/javascript">

    window.onload = function () {
      servicios_realizados();
    };

    if(window.outerWidth > 400){
      document.getElementById("tabla_servicios").classList.add('table')      
      document.getElementById("tabla_servicios").classList.add('table-striped')      
    }

    function servicios_realizados(){

      $.post("conexiones.php", {
        ingresar: "servicios_realizados",
        dataType: "json"
      }).done(function(data,error){
          let datos = JSON.parse(data);
          datos.forEach(element => {
            registros_servicios.innerHTML += `<tr>
            <td data-titulo = "Fecha Servicio">${element.fecha}</td>
            <td data-titulo = "Estilista">${element.nombre_estilista}</td>
            <td data-titulo = "Cliente">${element.nombre_cliente}</td>
            <td data-titulo = "Servicio">${element.nombre_servicio}</td>
            <td data-titulo = "Largo cabello">${element.largo_cabello}</td>
            <td data-titulo = "Volumen cabello">${element.volumen_cabello}</td>
            <td data-titulo = "Monto">$${element.monto_cobrado}</td>
            <td data-titulo = "Pago Estilista">$${element.pago_estilista}</td>
            <td data-titulo = "Costo">$${element.costo_servicio}</td>
            <td data-titulo = "Costo">$${element.gastos_fijos}</td>
            <td data-titulo = "Ganancia">$${element. ganancia_aprox }</td>
            </tr>
            `
          })
      }).fail(function() {
        alert( "error" );
      });

    }
    function ocultaFieldset(tabla, icono){  
    if(tabla.style.display == "block"){
      tabla.style.display = "none"
      icono.classList.add("bi-caret-up-square-fill");
      icono.classList.remove("bi-caret-down-square-fill");
    }else{
      tabla_servicios_realizados.style.display = "block"
      icono.classList.add("bi-caret-down-square-fill");
      icono.classList.remove("bi-caret-up-square-fill");
    }
}

</script>