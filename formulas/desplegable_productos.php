<label for="producto">Producto</label>
        <input type="hidden" name="idproducto" id="idproducto">
        <input type="text" name="nombre_producto_form" id="nombre_producto_form" placeholder ="Escriba el nombre aquí..." onkeyup="selecciona_lista_prod(event)" disabled/>
        <ul id="lista_nombres_prod" class="lista_nombres_prod">
          <li id="li_nuevo_prod" style="display:none;background:#dc354566;cursor:pointer" data-toggle="modal" data-target="#creaNuevoProducto">Crear nuevo producto</li>
        </ul>

        <script>
            function selecciona_lista_prod(e) {
  $.post("conexiones.php", {
    ingresar: "selecciona_lista_prod",
    inicial: e.target.value
  })
    .done(function (data, error) {
      console.log(data);
      let datos = JSON.parse(data);
      if (datos.length == 0 && e.keyCode >= 65 && e.keyCode <= 90) {
        li_nuevo_prod.style.display = "block";
        li_nuevo_prod.style.marginTop = "-6px";
      } else {
        li_nuevo_prod.style.display = "none";
      }
      removeElements_prod();
      if (nombre_producto_form.value != "") {
        datos.forEach((element) => {
          if ((e.keyCode >= 65 && e.keyCode <= 90) || e.keyCode == 8) {
            crea_lista_prod(element.idproducto, element.nombre_producto);
          }
        });
      }
    })
    .fail(function () {
      alert("error");
    });
}

function crea_lista_prod(id, nombre) {
  li_nuevo_prod.style.display = "block";
  li_nuevo_prod.style.marginTop = "-1px";
  lista_nombres_prod.style.border = "solid 1px #838383";
  lista_nombres_prod.style.marginTop = "-6px";
  let list_item = document.createElement("li");
  list_item.classList.add("list_items");
  list_item.style.cursor = "pointer";
  list_item.setAttribute("onclick", "displayNames_prod(" + `"${nombre}", "${id}"` + ")");
  let word = "<b>" + nombre.substr(0, nombre_producto_form.value.length) + "</b>";
  word += nombre.substr(nombre_producto_form.value.length);
  list_item.innerHTML = word;
  lista_nombres_prod.appendChild(list_item);
}

function displayNames_prod(nombre, id) {
  cantidad.disabled = false;
  unidad_medida.disabled = false;
  nombre_producto_form.value = nombre;
  idproducto.value = id;
  removeElements_prod();
}

function removeElements_prod() {
  let items = document.querySelectorAll(".list_items");
  items.forEach((item) => {
    item.remove();
    li_nuevo_prod.style.display = "none";
    li_nuevo_prod.style.marginTop = "";
    lista_nombres_prod.style = "";
  });
}
        </script>