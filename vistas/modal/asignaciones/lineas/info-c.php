<!-- Modal de infromacion linea reincorporada-->
<div class="modal fade" id="infolineasCerr<?php echo $lineaDev["ID_Linea_asignada"]?>" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <div class="modal-body">
                
                <form>

                <div class="" style="box-sizing: content-box;" >

                <h5 class="modal-title text-center mt-2 mb-4" id="registroEmodalLabel">Informacion de la linea</h5>

                </div>

                    <input type="hidden" value="<?php echo $lineaDev["ID_Detalle_Equipo"]?>" name="equipo">

                    <div class="row mb-4">
                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="estado" value="<?php echo $lineaDev["N_Estado"]?>" name="" readonly>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="cod" class="col-sm-2 col-form-label">codigo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cod" value="<?php echo $lineaDev["Cod_puk"] ?>" name="" readonly>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="tecnico" class="col-sm-2 col-form-label">Tecnico</label>
                        <div class="col-sm-10">

                        <input type="text" class="form-control" id="tecnico" value="<?php echo $lineaDev["usuario"]?>" name="" readonly>

                        </div>
                    </div>

                    <div class="row mb-4">

                        <label for="tecnico" class="col-sm-2 col-form-label">Empleado</label>

                        <div class="col-sm-10">
                    

                            <input type="text" class="form-control" id="empleado" value="<?php echo $lineaDev["p_Nombre_empleado"]." ".$lineaDev["p_Apellido_empleado"]?>" name="" readonly>

                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="observacion" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 150px;" readonly><?php echo $lineaDev["observacion_rec"] ?></textarea>
                        <label for="floatingTextarea">Observacion</label>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

