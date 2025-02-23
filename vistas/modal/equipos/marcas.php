<!-- Modal -->
<div class="modal fade" id="marca_modal" tabindex="-1" aria-labelledby="registromarcaEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">
            
            <div >
                
                <h5 class="modal-title text-center mt-4 mb-3" id="titulo_modal"></h5>

            </div>
            
            <div class="modal-body">

                <div class="">

                    <form id="form_marcas" enctype="multipart/form-data" method="POST">

                        <div id="accion"></div>
    
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label ">Marca</label>
                             <div class="col-sm-10">
                                    <input type="text" class="form-control" id="marca" name="marca" placeholder="Escriba el nombre de la Marca" required>
                            </div>
                        </div>
                     
                        <!-- <div class="mb-4">
                            <label for="formFile" class="form-label">Seleccioone una imagen</label>
                            <input class="form-control bg-dark" type="file" id="imagenMarca" name="imagenMarca" > 
                        </div> -->
                        
                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" id="btn_accion" name="btnregistrarmarca" value="registrar" class="btn btn-primary"></button>

                        </div>

                    </form>

                </div>  
            </div>
        </div>
    </div>
</div>