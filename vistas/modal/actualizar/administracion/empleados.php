<!-- Actualizar empleados -->
<div class="modal fade" id="actualizarEmpleado" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">
            <h5 class="modal-title text-center mt-4 mb-3" id="registroEmodalLabel">Actualizar</h5>
        
            <div class="modal-body">
            
                <form action="" enctype="multipart/form-data" method="POST">
                
                    <input type="hidden" name="idempleadoact" id="idempleadoact" value="">
                    <input type="hidden" name="imgact" id="imgact" value="">

                    <div class="row mb-4">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombres</label>
                        <input type="text" class="formp form-control" id="nombre" placeholder="Primer Nombre" name="nombre" required>
                        <!-- <label for="apellido" class="col-sm-2 col-form-label"></label> -->
                        <input type="text" class="formp form-control" id="nombre" placeholder="Segundo Nombre" name="nombre" required>
                    </div>
                    <div class="row mb-4">
                        <label for="nombre" class="col-sm-2 col-form-label">Apellidos</label>
                        <input type="text" class="formp form-control" id="apellido" placeholder="Primer Apellido" name="apellido" required>
                        <!-- <label for="apellido" class="col-sm-2 col-form-label"></label> -->
                        <input type="text" class="formp form-control" id="apellido" placeholder="Segundo Apellido" name="apellido" required>
                    </div>

                    <div class="row mb-4">
                        <label for="cedulaact" class="col-sm-2 col-form-label">Cedula</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cedulaact" name="cedulaact" value="<?php echo $empleados["cedula"] ?>" required>
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <label for="gerenciaact" class="col-sm-2 col-form-label">Gerencia</label>
                        <div class="col-sm-10">
                            <select class="form-select mb-3" aria-label="Default select example" id="gerenciaact" name="gerenciaact">

                                <?php
                                $gerencia = $connect->query("SELECT * FROM Gerencia ");
                                while ($datos = $gerencia->fetch_assoc()){ ?>

                                <option value="<?php echo $datos["ID_gerencia"]?>"><?php echo $datos["N_gerencia"]?></option>

                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="divisionact" class="col-sm-2 col-form-label">Division</label>
                        <div class="col-sm-10">
                            <select class="form-select mb-3" aria-label="Default select example" id="divisionact" name="divisionact">
                                
                                <option value="">Seleccione una division</option>

                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <label for="cargoact" class="col-sm-2 col-form-label">Cargo</label>
                        <div class="col-sm-10">
                            <select class="form-select mb-3" aria-label="Default select example" id="cargoact" name="cargoact">

                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="telefonoAct" class="col-sm-2 col-form-label">Telefono</label>
                        <input type="text" class="forms form-control" id="telefonoAct" name="Telefono" required>
                        <label for="extensionAct" class="col-sm-2 col-form-label">Extension</label>
                        <input type="text" class="forms form-control" id="extensionAct" name="Extension" required>
                    </div>

                    <div class="row mb-4">
                        <label for="correoact" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correoact" name="correoact" value="<?php echo $empleados["correo"] ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="fotoact" class="form-label">Seleccione una Foto</label>
                        <input type="file" class="form-control bg-dark" id="fotoact" name="fotoact">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" value="actualizar_empleado" class="btn btn-primary letf" name="btn_actualizar_empleado">Actualizar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>