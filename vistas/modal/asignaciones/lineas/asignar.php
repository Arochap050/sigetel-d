<!-- Modal de asignar/prestar lineas-->
<div class="modal fade" id="modal-linea-asg-pres" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <div class="modal-body">
                
                <form id="form_asg_pres_linea" enctype="multipart/form-data" method="POST">

                <div class="" style="box-sizing: content-box;" >

                <h5 class="modal-title text-center mt-2 mb-4" id="titulo_modal_asg"></h5>

                </div>

                    <input type="hidden" value="" id="lineaasignar" name="linea">
                    <input type="hidden" value="" id="tipo" name="tipo">
                    <input type="hidden" value="asignar-prestar" name="accion">

                    <div class="row mb-4">
                        <label for="lineaasg" class="col-sm-2 col-form-label">Linea</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lineaasg" value="" name="" readonly>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="numeroasg" class="col-sm-2 col-form-label">Numero</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="numeroasg" value="" name="bnacional" readonly>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="tecnico" class="col-sm-2 col-form-label">Tecnico</label>
                        <div class="col-sm-10">

                            <?php

                            $user = $conectado->prepare("SELECT * FROM Usuarios join Empleados ON Empleados.ID_empleado = Usuarios.FKEY_empleado where ID_usuario = $usuario");
                            $user->execute();
                            $rowuser = $user->fetch();

                            ?>
                            
                            <input type="hidden" name="tecnico" value="<?php echo $usuario ?>" >

                            <input type="text" class="form-control" id="tecnico" value="<?php echo $rowuser["p_Nombre_empleado"]." ".$rowuser["p_Apellido_empleado"]?>" name="" readonly>

                        </div>
                    </div>

                    <div class="row mb-2">

                        <label for="gerencia" class="col-sm-2 col-form-label">Gerencia</label>

                        <div class="col-sm-10">

                            <select class="form-select mb-3" aria-label="Default select example" id="gerencia" name="">
                                
                                <option value=" ">Seleccione una Gerencia</option>

                                    <?php

                                    $gerencia = $conectado->prepare("SELECT * FROM Gerencia ORDER BY N_gerencia ASC");
                                    $gerencia->execute();

                                    while ($gerencias = $gerencia->fetch()):

                                    ?>

                                    <option value="<?php echo $gerencias["ID_gerencia"]?>"> <?php echo $gerencias["N_gerencia"]?></option>

                                    <?php endwhile ?>

                            </select>

                        </div>

                    </div>

                    <div class="row mb-2">

                        <label for="Division" class="col-sm-2 col-form-label">Division</label>

                        <div class="col-sm-10">

                            <select class="form-select mb-3" aria-label="Default select example" id="Division" name="">
                                
                                <option value=" ">Seleccione una Gerencia</option>


                            </select>

                        </div>

                    </div>

                    <div class="row mb-2">

                        <label for="empleado" class="col-sm-2 col-form-label">Empleado</label>

                        <div class="col-sm-10">

                            <select class="form-select mb-3" aria-label="Default select example" id="Empleadoo" name="empleado">
                                
                                <option value=" ">Seleccione una Gerencia</option>


                            </select>

                        </div>

                    </div>

                    <!-- una entrada de ubicacion mientras tanto -->

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="observacion" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Observacion</label>
                    </div>

                    <div id="boton-acc" class="text text-center">

                    <!-- <button type="submit" class="btn btn-success letf" name="btn_asignar_lineas" value="asignar" >Asignar</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

