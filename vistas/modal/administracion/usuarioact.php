<div class="modal fade" id="ActUsuario" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">
            
            <div>
                <h5 class="modal-title text-center mt-4 mb-3" id="registroEmodalLabel">Actualizar usuario</h5>
            </div>
            
            <div class="modal-body">
                <div class="">

                    <form action="" id="editar_usuarios" enctype="multipart/form-data" method="POST">

                    <input type="hidden" id="accion" value="editar" name="accion" readonly>
                    <input type="hidden" id="idusuario" value="" name="id_usuario" readonly>

                        <div class="row mb-4">
                            <label for="nuseract" class="col-sm-2 col-form-label">Usuario</label>
                            <div class="col-sm-10">
                                <input id="usuario_act" type="text" class="form-control"  value="" name="usuario">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="tipouseract" class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-10">
                                <select id="tipouseract" class="form-select mb-3" aria-label="Default select example" name="t_usuario">
                                    
                                    <?php

                                    $rol = $conectado->prepare("SELECT * FROM Roles ");
                                    $rol->execute();

                                    while ($datos = $rol->fetch()){

                                    ?>

                                    <option value="<?php echo $datos["ID_rol"]?>"><?php echo $datos["Rol_user"]?></option>

                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <input type="hidden" name="tipo_udt" value="editar_r">

                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="button" id="boton_clave" name="boton" value="clave" title="Vtv123456*" class="btn btn-info">Clave</button>

                            <button type="submit" name="boton" value="editar_r" class="btn btn-primary">Actualizar</button>

                        </div>

                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
