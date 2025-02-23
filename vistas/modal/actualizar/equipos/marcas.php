<!-- Modal -->
<div class="modal fade" id="Actmarca<?php echo $datos['id_Marca']; ?>" tabindex="-1" aria-labelledby="registromarcaEmodalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

        <div class="modal-content bg-secondary">
            
            <div class="">
                
                <h5 class="modal-title text-center mt-4 mb-3" id="registroEmodalLabel">Actualizar marca</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            
            <div class="modal-body">

                <div class="">

                    <form action="" enctype="multipart/form-data" method="POST">

                        <input type="hidden" name="idmarcaAct" value="<?php echo $datos['id_Marca']; ?>" >

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Marca</label>
                             <div class="col-sm-10">
                                    <input type="text" class="form-control" id="marcaa" name="marcaAct" value="<?php echo $datos['N_Marca']; ?>" required>
                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" name="btn_actualizar_marca" value="actualizar" class="btn btn-primary">Actualizar</button>

                        </div>

                    </form>

                </div> 

            </div>

        </div>

    </div>

</div>