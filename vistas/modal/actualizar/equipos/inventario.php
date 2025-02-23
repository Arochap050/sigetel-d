<!-- Modal -->
<div class="modal fade" id="actregistro" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <div class="">

                <h5 class="modal-title text-center mt-4 mb-3" id="registroEmodalLabel">Actualizar equipo</h5>

            </div>

            <div class="modal-body">
                <div class="">

                    <form action="" enctype="multipart/form-data" method="POST">

                    <input type="hidden" id="registro" value="" name="idregistroact">
                    <input type="hidden" id="imgregistro" value="" name="rutaimgact">

                    <div class="row mb-2">
                            <label for="marca-a" class="col-sm-2 col-form-label">Marca</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="marca-a" name="marca_a" required>
 
                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="equipo-a" class="col-sm-2 col-form-label">Equipo</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" id="equipo-a" name="equipo_a" required>
                                <option value="" selected>seleccione</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="modelo-a" class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" id="modelo-a" name="modelo_a" required>
                                
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="" class="col-sm-2 col-form-label">Serial</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="aserial" name="serialact" value="" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Bien nacional</label>
                             <div class="col-sm-10">
                                <input type="text" class="form-control" id="nacional" name="bien_nacionalact" value="" readonly>
                            </div>
                        </div>


                        <div class="mb-4">
                            <!-- <label for="imgen" class="form-label">Seleccioone una imagen</label> -->
                            <input class="form-control bg-dark" type="file" id="imgen"  name="nuevaimagenact"  readonly> 
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" class="btn btn-primary letf" value="actualizar" name="btn_actualizar_equipo">Actualizar</button>

                        </div>

                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>

