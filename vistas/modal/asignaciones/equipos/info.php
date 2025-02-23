<!-- Modal de informacion equipo-->
<div class="modal fade" id="infoEquipo" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <div class="modal-body">
                
                <form>

                <div class="" style="box-sizing: content-box;" >

                <h5 class="modal-title text-center mt-2 mb-4" id="registroEmodalLabel">Informacion del Equipo</h5>

                </div>

                    <input type="hidden" value="" name="equipo">

                    <div class="row mb-4">
                        <label for="equipo" class="col-sm-2 col-form-label">Equipo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="equipo-info" value="" name="" readonly>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="bnacional" class="col-sm-2 col-form-label">B_nacional</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="bnacional-info" value="" name="bnacional" readonly>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="tecnico" class="col-sm-2 col-form-label">Tecnico</label>
                        <div class="col-sm-10">

                        <input type="text" class="form-control" id="tecnico-info" value="" name="" readonly>

                        </div>
                    </div>

                    <div class="row mb-4">

                        <label for="tecnico" class="col-sm-2 col-form-label">Empleado</label>

                        <div class="col-sm-10">

                            <input type="text" class="form-control" id="empleado-info" value="" name="" readonly>

                        </div>
                    </div>


                    <div class="row" id="status_eq_dev">

                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="observacion" placeholder="Leave a comment here"
                            id="observacion-info" style="height: 150px;" readonly></textarea>
                        <label for="observacion-info">Observacion</label>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

