<!-- Modal de recepcion de lineas-->
<div class="modal fade" id="retornolinea" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <div class="modal-body">

                <form id="lineas_form" action="" method="post">

                <div class="" style="box-sizing: content-box;" >

                <h5 class="modal-title text-center mt-2 mb-4" id="registroEmodalLabel">Recepcion de linea</h5>

                </div>

                    <input type="hidden" value="" name="idlinea-inv" id="idlinea-inv" readonly>
                    <input type="hidden" value="<?php echo $usuario ?>" id="id_usuario_ret" readonly>
                    <input type="hidden" value="" name="idlinea-asg-ret"  id="idlinea-asg-ret" readonly>

                    <div class="row mb-4">

                        <label for="linea" class="col-sm-2 col-form-label">Linea</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="linea-ret" value="" name="" readonly>
                        </div>

                    </div>

                    <div class="row mb-4">
                        <label for="numero-ret" class="col-sm-2 col-form-label">Numero</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="numero-ret" value="" name="bnacional" readonly>
                        </div>
                    </div>

                    <div class="row mb-4">

                        <label for="empleado-ret" class="col-sm-2 col-form-label">Empleado</label>

                        <div class="col-sm-10">

                            <input type="text" class="form-control" id="empleado-ret" value="" name="" readonly>

                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="empleado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">

                            <select class="form-select mb-3" aria-label="Default select example" id="estado-ret" name="estadoinv" required>
                        
                                <option value="">Estado de la linea</option>

                                <?php

                                $estadoEquipo = $conectado->prepare("SELECT * FROM estado_linea where ID_Estado_linea <> 6 and ID_Estado_linea <> 5 ");
                                $estadoEquipo->execute();

                                while ($Estado = $estadoEquipo->fetch()):

                                ?>

                                <option value="<?php echo $Estado["ID_Estado_linea"]?>"><?php echo $Estado["N_estado_linea"]?></option>

                                <?php endwhile ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-floating mb-3">

                        <textarea class="form-control" name="observacion" id="observacion-ret" style="height: 150px;"></textarea>

                        <label for="observacion-ret">Observacion</label>

                    </div>

                    <button id="boton-retorno" type="button" class="btn btn-primary" name="btn_recep_equipo" value="boton"><i class="fa-solid fa-right-to-bracket"></i></button>

                </form>
            </div>
        </div>
    </div>
</div>

