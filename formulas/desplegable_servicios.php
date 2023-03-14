
      <input type="hidden" name="idservicio" id="idservicio">
      <input type="text" name="nombre_servicio" id="nombre_servicio" placeholder ="Escriba el nombre aquí..." onkeyup="selecciona_lista(event)" />
      <ul id="lista_nombres" class="lista_nombres">
        <li id="li_nuevo" style="display:none;background:#dc354566;cursor:pointer" data-toggle="modal" data-target="#creaNuevoServicio">Crear nuevo servicio</li>
      </ul>
<script>
function selecciona_lista(e) {
  $.post("conexiones.php", {
    ingresar: "selecciona_lista",
    inicial: e.target.value
  })
    .done(function (data, error) {
      let datos = JSON.parse(data);
      if (datos.length == 0 && e.keyCode >= 65 && e.keyCode <= 90) {
        li_nuevo.style.display = "block";
        li_nuevo.style.marginTop = "-6px";
      } else {
        li_nuevo.style.display = "none";
      }
      removeElements();
      if (nombre_servicio.value != "") {
        datos.forEach((element) => {
          if ((e.keyCode >= 65 && e.keyCode <= 90) || e.keyCode == 8) {
            crea_lista(element.idservicio, element.nombre_servicio);
          }
        });
      }
    })
    .fail(function () {
      alert("error");
    });
}

function crea_lista(id, nombre) {
  li_nuevo.style.display = "block";
  li_nuevo.style.marginTop = "-1px";
  lista_nombres.style.border = "solid 1px #838383";
  lista_nombres.style.marginTop = "-6px";
  let list_item = document.createElement("li");
  list_item.classList.add("list_items");
  list_item.style.cursor = "pointer";
  list_item.setAttribute("onclick", "displayNames(" + `"${nombre}", "${id}"` + ")");
  let word = "<b>" + nombre.substr(0, nombre_servicio.value.length) + "</b>";
  word += nombre.substr(nombre_servicio.value.length);
  list_item.innerHTML = word;
  lista_nombres.appendChild(list_item);
}

function displayNames(nombre, id) {
  habilita_largo_cabello()
  nombre_servicio.value = nombre;
  idservicio.value = id;
  removeElements();
}

function habilita_largo_cabello(){
  document.getElementsByName('largo_cabello').forEach(element => {
    element.disabled = false
  });
}

function habilita_seleccion_volumen(){
  document.getElementsByName('volumen_cabello').forEach(element => {
    element.disabled = false
  });
}

function removeElements() {
  let items = document.querySelectorAll(".list_items");
  items.forEach((item) => {
    item.remove();
    li_nuevo.style.display = "none";
    li_nuevo.style.marginTop = "";
    lista_nombres.style = "";
  });
}
</script>