<!-- Modal -->
<div class="modal fade" id="modal_inventario" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <div id="titulomodal_inventario">

            </div>

            <div class="modal-body">
                <div class="">

                    <form id="registrarInventario" method="POST" enctype="multipart/form-data" >

                        <div id="accion"></div>

                        <div class="row mb-2">
                            <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="marca" name="marca" required>
 
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="equipo" class="col-sm-2 col-form-label">Equipo</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="equipo" name="equipo" required>

                                    <option value="">Seleccione una marca!!</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="modelo" name="modelo" required>

                                    <option value="">Seleccione un modelo!!</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="serial" class="col-sm-2 col-form-label">Serial</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control" id="serial" name="serial" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bnacional" class="col-sm-2 col-form-label ">Bien nacional</label>
                             <div class="col-sm-10">
                                    <input type="text" class="form-control" id="bnacional" name="bien_nacional" required>
                            </div>
                        </div>
                     
                        <div class="mb-4">
                            <label for="imgen" class="form-label">Seleccioone una imagen</label>
                            <input class="form-control bg-dark" type="file" id="imagen" name="foto"> 
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" value="ok" id="boton_inv" class="btn btn-primary letf" name="btn_registrar_equipo"></button>

                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>