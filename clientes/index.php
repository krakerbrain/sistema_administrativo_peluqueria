<?php

require '../config.php';
include "../partials/header.php";
$indice = "clientes";
$titulo_pagina = "Registro Clientes";
?>
  <style>
    label {
      padding-top: 5px;
    }

    input {
      margin-bottom: 5px;
    }
  </style>
  <body>
    <div class="container px-0" style="max-width:850px">
    <?php include "../partials/navbar.php" ?>
    <form class="px-1" action="" method="post" style="display: flex; flex-direction: column; ">
      <label for="fecha_servicio">Fecha Servicio</label>
      <input type="date" name="fecha_servicio" id="fecha_servicio" value=""/>
      <label for="estilista">Estilista</label>
      <select name="estilista" id="estilista"></select>
      <label for="nombre_cliente">Nombre cliente</label>
      <input type="hidden" name="idcliente" id="idcliente">
      <input type="text" name="nombre_cliente" id="nombre_cliente" placeholder ="Escriba el nombre aquí..." onkeyup="selecciona_lista(event,'nombre_cliente','clientes_registro', 'idcliente', 'nombre_cliente')" />
      <ul id="lista_nombres" class="lista_nombres">
        <li id="li_nuevo" style="display:none;background:#dc354566;cursor:pointer" data-toggle="modal" data-target="#creaNuevoCliente">Crear nuevo cliente</li>
      </ul>
      <label for="servicios">Seleccione un servicio</label>
      <select name="servicio" id="servicio"></select>
      <?php include "../partials/tipo_cabello.php" ?>
      <label for="montoServicio">Monto</label>
      <input type="number" name="monto_servicio" id="monto_servicio" placeholder="Ejemplo: 45000"/>
      <input type="button" value="Guardar" onclick="registra_servicio()"/>
    </form>
    <!-- Modal -->
    <?php
    $titulo = "Crear nuevo cliente";
    $campos = '<label for="nombre_cliente_nuevo" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="nombre_cliente_nuevo">
                <label for="correo_cliente" class="col-form-label">Correo:</label>
                  <input type="mail" class="form-control" id="correo_cliente"></input>';
    $id_modal = 'creaNuevoCliente';
    $funcion = "registra_nuevo('nombre_cliente_nuevo', 'correo_cliente', 'idcliente', 'registro_cliente', 'nombre_cliente')";
    include("../components/registra_nuevo/modal.php");
    ?>
</div>
  </body>
  <?php include "../partials/boostrap_script.php" ?>
  <script src="../components/lista_desplegable/lista_desplegable.js"></script>
  <script type="text/javascript">
    window.onload = function () {
      obtener_estilistas();
      obtener_servicios();
  };
   
    const date = new Date;
    // Get year, month, and day part from the date
    let year = date.toLocaleString("default", { year: "numeric" });
    let month = date.toLocaleString("default", { month: "2-digit" });
    let day = date.toLocaleString("default", { day: "2-digit" });
    // Generate yyyy-mm-dd date string
    let formattedDate = `${year}-${month}-${day}`;
    document.getElementById('fecha_servicio').value = formattedDate;
   
   function obtener_servicios(){
      $.post("../servicios/conexiones.php", {
      ingresar: "obtener_servicios",
      dataType: "json"
    }).done(function(data,error){
      console.log(data);
      let datos = JSON.parse(data);
      datos.forEach(element => {
        servicio.innerHTML += `<option value="${element.idservicio}">${element.nombre_servicio}</option>`;
      });
     
    }).fail(function() {
      alert( "error" );
    });
  }


    function obtener_estilistas(){
       estilista.innerHTML = ""
      $.post("../estilistas/conexiones.php", {
        ingresar: "obtener_estilistas",
        dataType: "json"
      }).done(function(data,error){
          let datos = JSON.parse(data);
          datos.forEach(element => {
            estilista.innerHTML += `<option value="${element.idestilista}">${element.nombre_estilista}</option>`
          })
      }).fail(function() {
        alert( "error" );
      });

    }
    function registra_servicio(){
       let largo_cabello = document.querySelector('input[name="largo_cabello"]:checked').value;
       let volumen_cabello = document.querySelector('input[name="volumen_cabello"]:checked').value;
      $.post("conexiones.php", {
        ingresar:   "registra_servicio",
        fecha:      fecha_servicio.value,
        estilista:  estilista.value,
        idcliente:  idcliente.value,
        idservicio: servicio.value,
        largo:      largo_cabello,
        volumen:    volumen_cabello,
        monto:      monto_servicio.value,
        dataType: "json"
      }).done(function(data,error){
        console.log(data);
      }).fail(function() {
        alert( "error" );
      });

    }


  
  </script>

</html>
