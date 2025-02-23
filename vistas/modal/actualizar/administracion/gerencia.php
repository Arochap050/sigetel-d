
<!-- Modal -->
<div class="modal fade" id="actualizargerencia<?php echo $gerencia["ID_gerencia"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

      <div class="modal-header">

        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar gerencia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <form action="" method="post">

        <input type="hidden" name="gerenciaid" value="<?php echo $gerencia["ID_gerencia"] ?>">

            <div class="row mb-2">

                <label for="actgerencia" class="col-sm-2 col-form-label">Gerencia</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="actgerencia" name="Actgerencia" value="<?php echo $gerencia["N_gerencia"] ?>" required>

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_actualizar_gerencia" value="actualizar" class="btn btn-primary">Actualizar</button>

            </div>

        </form>

      </div>


    </div>

  </div>

</div>

