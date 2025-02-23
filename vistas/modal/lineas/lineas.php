<!-- Modal -->
<div class="modal fade" id="registroLineamodal" tabindex="-1" aria-labelledby="registromarcaEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">
            
            <div class="">
                
                <h5 class="modal-title text-center mt-4 mb-3" id="registroEmodalLabel">Registrar Linea</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            
            <div class="modal-body">
                <div class="">

                    <form action="" enctype="multipart/form-data" method="POST">

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Operadora</label>
                            <div class="col-sm-10">
                                <select class="form-select mb3" aria-label="Default select examplr" name="operadora" id="operadoraR">
                                    <option value="" selected>Operadora</option>

                                    <?php

                                        $sql = $connect->query("SELECT * FROM Operadoras");
                                        while ($datos = mysqli_fetch_array($sql)) {?>

                                        <option value="<?php echo $datos["ID_Operadora"] ?>"><?php echo $datos["N_Operadora"] ?></option>

                                        <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="" class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="tiposs" name="t_tecnologia">
                                <option value="" selected>Seleccione un tipo de linea</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nùmero</label>
                             <div class="col-sm-10">
                                    <input type="number" class="form-control" id="numero" name="numero" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">CodPuk</label>
                             <div class="col-sm-10">
                                    <input type="text" class="form-control" id="codpuk" name="codpuk" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">PIN</label>
                             <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pin" name="pin" required>
                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" value="info" name="btn-linea" class="btn btn-primary">Registrar</button>

                        </div>

                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>