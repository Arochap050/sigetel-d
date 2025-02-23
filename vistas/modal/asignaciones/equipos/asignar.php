<!-- Modal de asignar equipo-->
<div class="modal fade" id="modal-equipo-asg-pres" tabindex="-1" aria-labelledby="tituloAsignacion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <div class="modal-body">

                <form method="post" id="form_asg_pres">

                    <div class="" style="box-sizing: content-box;" >
                        
                        <h5 class="modal-title text-center mt-2 mb-4" id="titulo_modal_asg"></h5>
                        
                    </div>
                    
                    <div id="accion-acc"></div>
                    <input type="hidden" value="asignar-prestar" name="accion">
                    <input type="hidden" value="" id="equipo_asig" name="equipo" readonly>


                        <div class="row mb-4">
                            <label for="equipo" class="col-sm-2 col-form-label">Equipo</label>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" id="equipoasg" value="" name="" readonly>

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

                                <select class="form-select mb-3" aria-label="Default select example" id="gerencia" name="" required>
                                    
                                    <option value="">Seleccione una Gerencia</option>

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

                                <select class="form-select mb-3" aria-label="Default select example" id="Division" name="" required>
                                    
                                    <option value="">Seleccione una division</option>

                                </select>

                            </div>

                        </div>

                        <div class="row mb-4">

                            <label for="empleado" class="col-sm-2 col-form-label">Empleado</label>

                            <div class="col-sm-10">

                                <select class="form-select" aria-label="Default select example" id="Empleado" name="empleado" required>
                                    
                                    <option value="">Seleccione un empleado</option>

                                </select>

                            </div>

                        </div>

                        <h6 class=" text-center mb-3" style="color: #6C7293;" id="registroEmodalLabel" >Accesorios</h6>

                        <div id="accesorios_cargar_asig" class="row mb-4 ps-3">

                        </div>

                        <div class="form-floating mb-3">

                            <textarea class="form-control" name="observacion" placeholder="Leave a comment here"
                                id="floatingTextarea" style="height: 150px;"></textarea>
                            <label for="floatingTextarea">Observacion</label>

                        </div>

                    <div class="text-center" id="boton-acc">

                    </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>