<!-- Modal -->
<div class="modal fade" id="accesorio-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content bg-secondary">

        <h1 class="modal-title pt-3 pb-1 text-center fs-5" id="titulo-accesorio"></h1>

      <div class="modal-body">

      <form id="form_accesorios" enctype="multipart/form-data" method="POST">

        <div id="acciones"></div>

            <div class="row mb-2">

                <label for="accesorio" class="col-sm-2 col-form-label">Nombre</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="accesorio" name="accesorio" placeholder="Nombre del accesorio" required>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_registrar_accesorio" value="registro" id="boton" class="btn btn-primary"></button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>