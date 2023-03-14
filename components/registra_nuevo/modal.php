

<div class="modal fade" id="<?=$id_modal?>" tabindex="-1" aria-labelledby="<?=$id_modal?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="<?=$id_modal?>"><?= $titulo ?></h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="registro_nuevo">
            <?= isset($campos) ? $campos : "<div></div>" ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="<?= $funcion ?>"  data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script src="../components/registra_nuevo/registra_nuevo.js"></script>

