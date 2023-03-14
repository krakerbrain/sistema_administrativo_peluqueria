function selecciona_lista(e, condicion, tabla, campo1, campo2) {
  $.post("../components/lista_desplegable/controlador.php", {
    inicial: e.target.value,
    condicion: condicion,
    tabla: tabla,
    campo1: campo1,
    campo2: campo2,
  })
    .done(function (data, error) {
      console.log(data);
      let datos = JSON.parse(data);
      if (datos.length == 0 && e.keyCode >= 65 && e.keyCode <= 90) {
        li_nuevo.style.display = "block";
        li_nuevo.style.marginTop = "-6px";
      } else {
        li_nuevo.style.display = "none";
      }
      removeElements();
      if (document.getElementById(condicion).value != "") {
        datos.forEach((element) => {
          if ((e.keyCode >= 65 && e.keyCode <= 90) || e.keyCode == 8) {
            crea_lista(Object.values(element)[0], Object.values(element)[1], campo1, campo2);
          }
        });
      }
    })
    .fail(function () {
      alert("error");
    });
}

function crea_lista(id, nombre, idoculto, campo2) {
  let input_desplegable = document.getElementById(campo2);
  li_nuevo.style.display = "block";
  li_nuevo.style.marginTop = "-1px";
  lista_nombres.style.border = "solid 1px #838383";
  lista_nombres.style.marginTop = "-6px";
  let list_item = document.createElement("li");
  list_item.classList.add("list_items");
  list_item.style.cursor = "pointer";
  list_item.setAttribute("onclick", "displayNames(" + `"${nombre}", "${id}", "${campo2}", "${idoculto}"` + ")");
  let word = "<b>" + nombre.substr(0, input_desplegable.value.length) + "</b>";
  word += nombre.substr(input_desplegable.value.length);
  list_item.innerHTML = word;
  lista_nombres.appendChild(list_item);
}

function displayNames(nombre, id, campo, idoculto) {
  document.getElementById(campo).value = nombre;
  document.getElementById(idoculto).value = id;
  removeElements();
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
