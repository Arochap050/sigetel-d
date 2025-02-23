
<!-- Modal -->
<div class="modal fade" id="actualizarOperadora<?php echo $operadoras["ID_Operadora"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

        <h1 class="text-center modal-title fs-5 pt-4 pb-3" id="exampleModalLabel">Registrar operadora</h1>

      <div class="modal-body">

        <form action="" method="post">

            <input type="hidden" name="idoperadora" value="<?php echo $operadoras["ID_Operadora"] ?>" >

            <div class="row mb-2">

                <label for="operadora" class="col-sm-2 col-form-label">Operadora</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="operadora" name="operadora" value="<?php echo $operadoras["N_Operadora"] ?>" required>

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btnActoperadora" value="info" class="btn btn-primary">Actualizar</button>

            </div>

        </form>

      </div>


    </div>

  </div>

</div>

