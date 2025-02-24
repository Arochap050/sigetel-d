<div class="modal fade" id="modalEmpleado" tabindex="-1" aria-labelledby="registroEmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">

            <h5 class="modal-title text-center mt-4 mb-3" id="titulomodal_empleados"></h5>

            <div class="modal-body">

                <form id="formulario_empleado" enctype="multipart/form-data" method="POST">

                    <div id="funciones"></div>

                    <div class="row mb-4">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombres</label>
                        <input type="text" class="formp form-control" id="pnombre" placeholder="Primer Nombre" name="pnombre" required>
                        <!-- <label for="apellido" class="col-sm-2 col-form-label"></label> -->
                        <input type="text" class="formp form-control" id="snombre" placeholder="Segundo Nombre" name="snombre">
                    </div>
                    <div class="row mb-4">
                        <label for="nombre" class="col-sm-2 col-form-label">Apellidos</label>
                        <input type="text" class="formp form-control" id="papellido" placeholder="Primer Apellido" name="papellido" required>
                        <!-- <label for="apellido" class="col-sm-2 col-form-label"></label> -->
                        <input type="text" class="formp form-control" id="sapellido" placeholder="Segundo Apellido" name="sapellido">
                    </div>

                    <div class="row mb-4">
                        <label for="cedula" class="col-sm-2 col-form-label">Cedula</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" placeholder="Ej: 123456789" id="cedula" name="cedula" >
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="" class="col-sm-2 col-form-label">Gerencia</label>
                        <div class="col-sm-10">
                            <select class="form-select mb-3" aria-label="Default select example" id="gerencia" name="gerencia">

                                <!-- <option value="">Seleccione una gerencia</option> -->

                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="division" class="col-sm-2 col-form-label">Division</label>
                        <div class="col-sm-10">
                            <select class="form-select mb-3" aria-label="Default select examplef" id="division" name="division">

                                <option value="">Seleccione una division</option>

                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                        <div class="col-sm-10">
                            <select class="form-select mb-3" aria-label="Default select example 2 " id="cargo" name="cargo">

                                <!-- <option value="">Seleccione un cargo</option> -->
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <input type="number" class="forms form-control" placeholder="Ej: 04240000000" id="telefono" name="telefono" required>

                        <label for="extension" class="col-sm-2 col-form-label">Extension</label>
                        <input type="number" class="forms form-control" placeholder="Ej: 1234" id="extension" name="extension" required>
                    </div>

                    <div class="row mb-4">
                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="SIGETEL@vtv.gob.ve" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label">Seleccione una Foto</label>
                        <input type="file" class="form-control bg-dark" id="foto" name="foto">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="boton_inv" value="registro_empleado" class="btn btn-primary letf" name="btn_registro_empleado"></button>
                    </div>

                </form>
            </div>  
        </div>
    </div>
</div>
