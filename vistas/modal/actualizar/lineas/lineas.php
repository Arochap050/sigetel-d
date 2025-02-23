<div class="modal fade" id="actualizarLineamodal<?php echo $row["ID_Linea"]?>" tabindex="-1" aria-labelledby="registromarcaEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">
            
            <div>
                <h5 class="modal-title text-center mt-4 mb-3" id="registroEmodalLabel">Actualizar Linea</h5>
            </div>
            
            <div class="modal-body">
                <div class="">

                    <form action="" enctype="multipart/form-data" method="POST">

                    <input type="hidden" id="lineaaCT" value="<?php echo $row["ID_Linea"]?>" name="idlinea">

                        <div class="row mb-3">
                            <label for="operadoraAct" class="col-sm-2 col-form-label">Operadora</label>
                            <div class="col-sm-10">
                                <select class="form-select mb3" aria-label="Default select examplr" name="operadoraAct" id="operadoraAct">
                                    <?php

                                    $sql = $connect->query("SELECT * FROM Operadoras");
                                    while ($datos = mysqli_fetch_array($sql)) {?>

                                    <option value="<?php echo $datos["ID_Operadora"] ?>"><?php echo $datos["N_Operadora"] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipoActt" class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="tipoActt" name="tipoAct">
                                <option selected>Seleccione un tipo de linea</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="numeroact" class="col-sm-2 col-form-label">Nùmero</label>
                             <div class="col-sm-10">
                                <input type="number" class="form-control" id="numeroact" name="numeroact" value="" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="codpukact" class="col-sm-2 col-form-label">CodPuk</label>
                             <div class="col-sm-10">
                                    <input type="text" class="form-control" id="codpukact" name="codpukact" value="" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pinact" class="col-sm-2 col-form-label">PIN</label>
                             <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pinact" name="pinact" value="" required>
                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" name="actualizar_linea" value="actualizar_l" class="btn btn-primary">Actualizar</button>

                        </div>

                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>