      <label for="largo_cabello">Largo de Cabello</label>
      <div id="largo_cabello">
        <input type="radio" name="largo_cabello" id="cabello_largo" value="largo" <?= isset($formula) ? "onclick='habilita_seleccion_volumen()' disabled" : ""?>>
        <label for="cabello_largo">Largo</label>
        <input type="radio" name="largo_cabello" id="cabello_medio" value="medio" <?= isset($formula) ? "onclick='habilita_seleccion_volumen()' disabled" : ""?>>
        <label for="cabello_medio">Medio</label>
        <input type="radio" name="largo_cabello" id="cabello_corto" value="corto" <?= isset($formula) ? "onclick='habilita_seleccion_volumen()' disabled" : ""?>>
        <label for="cabello_corto">Corto</label>
      </div>
      <label for="volumen_cabello">Volumen de Cabello</label>
      <div id="volumen_cabello">
        <input type="radio" name="volumen_cabello" id="volumen_normal" value="normal" <?= isset($formula) ? "onclick='obtiene_formula()' disabled" : ""?>>
        <label for="volumen_normal">Normal</label>        
        <input type="radio" name="volumen_cabello" id="volumen_abundante" value="abundante" <?= isset($formula) ? "onclick='obtiene_formula()' disabled" : ""?>>
        <label for="volumen_abundante">Abundante</label>
      </div>