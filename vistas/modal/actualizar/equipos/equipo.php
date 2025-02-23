<!-- Modal -->
<div class="modal fade" id="equipoAct<?php echo $datos['ID_Equipo'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content bg-secondary">

      <div class="modal-header">

        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">
          
          <form action="" enctype="multipart/form-data" method="POST">
              
            <input type="hidden" name="idequipo" value="<?php echo $datos['ID_Equipo'] ?>" >
            
            <div class="row mb-2">

                <label for="equipo" class="col-sm-2 col-form-label">Equipo</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="equipo" name="actequipo" value="<?php echo $datos['N_Equipo'] ?>" required>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_actualizar_eq" value="actualizar" class="btn btn-primary">Actualizar</button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>