<!-- Modal -->
<div class="modal fade" id="modal_equipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

        <h1 class="text-center pt-4 pb-2 modal-title fs-5" id="titulo_modal"></h1>

    <div class="modal-body">

      	<form id="form_equipo" enctype="multipart/form-data" method="POST">

       		<div id="accion"></div>

            <div class="row mb-2">

                <label for="" class="col-sm-2 col-form-label">Equipo</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="equipo" name="equipo" placeholder="Escriba que equipo desea registrar" required>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_registro_eq" id="boton" value="registro" class="btn btn-primary"></button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>