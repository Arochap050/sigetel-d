<div class="modal fade" id="actModelo<?php echo $datos['ID_Modelo'] ?>" tabindex="-1" aria-labelledby="registromarcaEmodalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">

        <div class="modal-content bg-secondary">
            
            <div class="">
                
                <h5 class="modal-title text-center mt-4 mb-3" id="registroEmodalLabel">Actualizar modelo</h5>

            </div>

            <div class="modal-body">

                <div class="">

                <form action="" enctype="multipart/form-data" method="POST">

                    <input type="hidden" name="idmodelo" value="<?php echo $datos['ID_Modelo'] ?>" >
                    <input type="hidden" name="marca_equipo" value="<?php echo $datos['FK_Marca_equipo'] ?>" >

                    <div class="row mb-2">

                            <label for="" class="col-sm-2 col-form-label">Marca</label>

                            <div class="col-sm-10">

                                <select class="form-select mb-3" aria-label="Default select example" name="marca_m">

                                    <?php 
                                    include "../../BD/bd.php"; 

                                    $query = $connect->query("SELECT * FROM Marcas");
                                    while ($valores = mysqli_fetch_array($query)){ ?>

                                        <option <?php echo $valores["N_Marca"] === $datos["N_Marca"] ? "selected = selected": "" ?> value="<?php echo $valores['id_Marca'] ?>"><?php echo $valores['N_Marca'];?></option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>

                        <div class="row mb-2">

                            <label for="" class="col-sm-2 col-form-label">Equipo</label>

                            <div class="col-sm-10">

                                <select class="form-select mb-3" aria-label="Default select example" name="equipo_m">

                                    <?php

                                        $equipos = $connect->query("SELECT * FROM Equipos");

                                        while ($equipo = mysqli_fetch_assoc($equipos)){
                                    ?>

                                    <option <?php echo $equipo["N_Equipo"] === $datos["N_Equipo"] ? "selected = selected": "" ?> value="<?php echo $equipo['ID_Equipo'] ?>"><?php echo $equipo['N_Equipo'];?></option>

                                    <?php } ?>

                                </select>

                            </div>

                        </div>

                        <div class="row mb-4">

                            <label for="inputEmail3" class="col-sm-2 col-form-label">Modelo</label>

                            <div class="col-sm-10">

                                <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $datos['N_Modelo'] ?>" required>

                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                            <button type="submit" name="btn-actmodelo" value="info" class="btn btn-primary">Actualizar</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>