<!-- Modal de retorno equipo-->
<div class="modal fade" id="retornoEquipo" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <div class="modal-body">

                <form method="post">

                <div class="" style="box-sizing: content-box;" >

                <h5 class="modal-title text-center mt-2 mb-4" id="registroEmodalLabel">Recepcion de Equipo</h5>

                </div>

                    <input type="hidden" value="" id="idequipo-ret" name="idequipo-ret" readonly>
                    
                    <input type="hidden" value="" id="idequipoinv-ret" name="idequipoinv-ret" readonly>

                    <input type="hidden" value="<?php echo $usuario ?>" id="id_usuario-ret" readonly>

                    <div class="row mb-4">

                        <label for="equipo" class="col-sm-2 col-form-label">Equipo</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="equipo-ret" value="" name="" readonly>
                        </div>

                    </div>

                    <div class="row mb-4">

                        <label for="tecnico" class="col-sm-2 col-form-label">Empleado</label>

                        <div class="col-sm-10">

                            <input type="text" class="form-control" id="empleado-ret" value="" name="" readonly>

                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="empleado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <select class="form-select mb-3" aria-label="Default select example" id="estado-ret" name="estadoinv">
                                
                                <option value="">Como se encuentra el equipo??</option>

                                <?php

                                $estadoEquipo = $conectado->prepare("SELECT * FROM Estado_equipo where ID_Estado <> 1 and ID_Estado <> 4 ");
                                $estadoEquipo->execute();

                                while ($Estado = $estadoEquipo->fetch()):

                                ?>

                                <option value="<?php echo $Estado["ID_Estado"]?>"><?php echo $Estado["Estado"]?></option>

                                <?php endwhile ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-floating mb-3">

                        <textarea class="form-control" name="observacion" placeholder="Leave a comment here"
                            id="observacion-ret" style="height: 150px;"></textarea>

                        <label for="observacion-ret">Observacion</label>

                    </div>

                    <button id="boton-retorno" type="button" class="btn btn-primary" name="btn_recep_equipo" value="boton_retorno" ><i class="fa-solid fa-right-to-bracket"></i></button>

                </form>
            </div>
        </div>
    </div>
</div>

