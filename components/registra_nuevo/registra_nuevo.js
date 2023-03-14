function registra_nuevo(campo1, campo2, id, tabla, input_desplegable) {
  let campo1_reg = campo1 != "" ? document.getElementById(campo1) : "";
  let campo2_reg = campo2 != "" ? document.getElementById(campo2) : "";
  let id_reg = document.getElementById(id);
  $.post("../components/registra_nuevo/controlador.php", {
    tabla: tabla,
    campo1: campo1_reg.value,
    campo2: campo2_reg.value,
  })
    .done(function (data, error) {
      document.getElementById(input_desplegable).value = campo1_reg.value;
      id_reg.value = data;
      registro_nuevo.reset();
      li_nuevo.style.display = "none";
      removeElements();
    })
    .fail(function (e) {
      console.log("error", e);
    });
}
