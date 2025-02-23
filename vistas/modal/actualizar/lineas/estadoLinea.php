<div class="modal fade" id="estadoLineaAct<?php echo $estado["ID_Estado_linea"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

        <h1 class="text-center modal-title fs-5 pt-4 pb-3" id="exampleModalLabel">Actualizar un estado</h1>

      <div class="modal-body">

        <form action="" method="post">

        <input type="hidden" name="idestado" value="<?php echo $estado["ID_Estado_linea"] ?>">

            <div class="row mb-2">

                <label for="status" class="col-sm-2 col-form-label">Estados</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="status" name="status" value="<?php echo $estado["N_estado_linea"] ?>" required>

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_act_estado_l" value="actualizar" class="btn btn-primary">Actualizar</button>

            </div>

        </form>

      </div>


    </div>

  </div>

</div>

