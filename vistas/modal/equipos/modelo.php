<!-- Modal -->
<div class="modal fade" id="modelo_modal" tabindex="-1" aria-labelledby="registroMODELOmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-secondary">
            <div class="">
                <h5 class="modal-title text-center mt-4 mb-3" id="titulo_modal"></h5>
            </div>
            
            <div class="modal-body">
                <div class="">

                    <form id="form_modelo" enctype="multipart/form-data" method="POST">

                    <div id="accion"></div>

                    <div class="row mb-2">

                            <label for="" class="col-sm-2 col-form-label">Marca</label>

                            <div class="col-sm-10">

                                <select class="form-select mb-3" aria-label="Default select example" id="marca" name="marca" required>

                                    <option value="" selected>Seleccione una marca</option>

                                    <?php 
                                    
                                    $query = $conectado->prepare("SELECT * FROM Marcas");
                                    $query->execute();
                                    while ($valores = $query->fetch()):
                                        ?>
                                        <option value="<?php echo $valores['id_Marca'] ?>"><?php echo $valores['N_Marca'];?></option>
                                    <?php endwhile ?>
 
                                </select>

                            </div>
                        </div>

                        <div class="row mb-2">

                            <label for="" class="col-sm-2 col-form-label">Equipo</label>

                            <div class="col-sm-10">

                                <select class="form-select mb-3" aria-label="Default select example" id="equipo" name="equipo" required>

                                    <option value="" selected>Seleccione un equipo</option>
                                        <?php 
                                            $equipos = $conectado->prepare("SELECT * FROM Equipos");
                                            $equipos->execute();
                                            while ($datos = $equipos->fetch()):
                                        ?>
                                        <option value="<?php echo $datos['ID_Equipo'] ?>"><?php echo $datos['N_Equipo'];?></option>
                                    <?php endwhile ?>

                                </select>

                            </div>
                        </div>

                        <div class="row mb-4">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Modelo</label>

                            <div class="col-sm-10">

                                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Escriba el modelo" required>
                                    
                            </div>
                        </div>
                 
                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" id="boton" value="info" name="btn_registrar_modelo" class="btn btn-primary"></button>

                        </div>

                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>