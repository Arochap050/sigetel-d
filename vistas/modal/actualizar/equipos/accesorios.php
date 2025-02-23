<!-- Modal -->
<div class="modal fade" id="actualizarAcesorio<?php echo $dato["ID_Accesorio"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

        <h1 class="modal-title pt-3 pb-1 text-center fs-5" id="exampleModalLabel">Actualizar accesorio</h1>
    
      <div class="modal-body">

      <form action="" enctype="multipart/form-data" method="POST">

      <input type="hidden" name="actualizar_acc_id" value="<?php echo $dato["ID_Accesorio"] ?>">

            <div class="row mb-2">

                <label for="" class="col-sm-2 col-form-label">Nombre</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="accesorio" name="accesorio_act" value="<?php echo $dato["N_Accesorio"] ?>" placeholder="Nombre del accesorio" required>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="actualizar_acc" value="registro" class="btn btn-primary">Actualizar</button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>