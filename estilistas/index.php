<?php

require '../config.php';
include "../partials/header.php";
$indice = "estilistas";
$titulo_pagina = "Estilistas";
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
<h4>Ingreso de Estilista</h4>
    <form action="" method="post" style="display: flex; flex-direction: column; width: 50%">
        <input type="hidden" name="idestilista" id="idestilista" value="">
        <label for="nombre_estilista">Nombre Estilista</label>
        <input type="text" name="nombre_estilista" id="nombre_estilista">
        <label for="porcentaje_ganancia">Porcentaje de ganancia</label>
        <input type="text" name="porcentaje_ganancia" id="porcentaje_ganancia" oninput="agregaPorcentaje(this)" placeholder="0%">
        <input type="button" value="Guardar" onclick="agrega_estilista()">
    </form>
    <div>
      <h4>Listado de Estilistas</h4>
        <table class="table">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Porcentaje Ganancia</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="estilistas">

          </tbody>
        </table>
    </div>
</body>

<?php include "../partials/boostrap_script.php" ?>

<script type="text/javascript">

    window.onload = function () {
      creacion_tabla_estilistas();
    };

  function agregaPorcentaje(campo){
      campo.value = campo.value.replace(/[^\d\.]/g, '') + '%';
      let end = campo.value.length;
      campo.setSelectionRange(end, end-1);
      campo.focus();
  }

    function agrega_estilista(){
      let accion = idestilista.value == "" ? "agrega_estilista" : "actualiza_estilista";
      $.post("conexiones.php", {
      ingresar: accion,
      idestilista: idestilista.value,
      nombre:nombre_estilista.value,
      porcentaje: Number(porcentaje_ganancia.value.slice(0,-1))
    }).done(function(data,error){
      console.log(data)
      creacion_tabla_estilistas();
    }).fail(function() {
      alert( "error" );
    });
    }

    function creacion_tabla_estilistas(){
       estilistas.innerHTML = ""
      $.post("conexiones.php", {
        ingresar: "obtener_estilistas",
        dataType: "json"
      }).done(function(data,error){
          let datos = JSON.parse(data);
          datos.forEach(element => {
            estilistas.innerHTML += `<tr>
            <td>${element.nombre_estilista}</td>
            <td>${element.porcentaje_ganancia}%</td>
            <td>
              <a onclick="eliminaEstilista(${element.idestilista})">Eliminar</a> |
              <a onclick="editaEstilista(${element.idestilista})">Editar</a>
            </td>
            </tr>
            `
          })
      }).fail(function() {
        alert( "error" );
      });

    }

    function eliminaEstilista(id){
      $.post("conexiones.php", {
        ingresar: "elimina_estilista",
        idestilista: id
      }).done(function(data,error){
          if(confirm("Esta estilista ya no se mostrará en esta tabla pero sus datos no serán borrados. ¿Está seguro?")){
            creacion_tabla_estilistas();
          }
      }).fail(function() {
        alert( "error" );
      });
    }

    function editaEstilista(id){
      $.post("conexiones.php", {
        ingresar: "obtener_estilistas",
        idestilista: id
      }).done(function(data,error){
        let datos = JSON.parse(data);
          datos.forEach(element => {
            idestilista.value = element.idestilista;
            nombre_estilista.value = element.nombre_estilista;
            porcentaje_ganancia.value = element.porcentaje_ganancia + '%';
          })
      }).fail(function() {
        alert( "error" );
      });
    }

</script>