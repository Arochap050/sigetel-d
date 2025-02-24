<div class="modal fade" id="registroUsuariosmodal" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">
            
            <div>
                <h5 class="modal-title text-center mt-4 mb-3" id="registroEmodalLabel">Registrar usuario</h5>
            </div>
            
            <div class="modal-body">
                <div class="">

                    <form action="" id="registro_usuarios" enctype="multipart/form-data" method="POST">

                    <input id="accion" name="accion" value="registrar" type="hidden" readonly>

                        <div class="row mb-4">
                            <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="gerencia" class="col-sm-2 col-form-label">Gerencia</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="gerencia" name="">

                                    <option value="">Seleccione una Gerencia</option>

                                    <?php

                                    $gerencia = $conectado->prepare("SELECT * FROM Gerencia");
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

                                    <option value="">Seleccione una division</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="empleado" class="col-sm-2 col-form-label">Empleado</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" id="Empleadoo" name="empleado">

                                    <option value="">Seleccione un empleado</option>

                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="t_usuario" class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" id="t_usuario" name="t_usuario" required>

                                    <option value="">Seleccione un tipo de usuario</option>

                                    <?php

                                    $empleado = $conectado->prepare("SELECT * FROM Roles ");

                                    while ($datos = $empleado->fetch()){

                                    ?>

                                    <option value="<?php echo $datos["ID_rol"]?>"><?php echo $datos["Rol_user"]?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" value="ok" class="btn btn-primary letf" name="btn_registrar_usuario">Registrar</button>

                        </div>

                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
