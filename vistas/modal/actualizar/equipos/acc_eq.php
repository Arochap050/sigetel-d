<div class="modal fade" id="act_accesorio_equipo<?php echo $equipo_ac["ID_Equipo_accesorio"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

        <h1 class="modal-title pt-3 pb-1 text-center fs-5" id="exampleModalLabel">Actualizar equipo</h1>
    
      <div class="modal-body">

        <form action="" enctype="multipart/form-data" method="POST">

            <input type="hidden" value="<?php echo $equipo_ac["ID_Equipo_accesorio"] ?>" name="accesorio_eq_id">

            <div class="row mb-2">

                <label for="" class="col-sm-2 col-form-label">Equipo</label>

                <div class="col-sm-10">

                    <select class="form-select mb-3" aria-label="Default select example" name="equipo_mact">

                        <?php 
                            $equipos = $connect->query("SELECT * FROM Equipos");
                            while ($datos = $equipos->fetch_assoc()){
                        ?>

                            <option <?php echo $datos["N_Equipo"] === (string) $equipo_ac["N_Equipo"] ? "selected = selected": "" ?> value="<?php echo $datos['ID_Equipo'] ?>"><?php echo $datos['N_Equipo'];?></option>
                        <?php } ?>

                    </select>

                </div>
            </div>

            <div class="row mb-2">

                <label for="" class="col-sm-2 col-form-label">Nombre</label>

                <div class="col-sm-10">

                    <select class="form-select mb-3" aria-label="Default select example" name="accesorio_eqact">

                        <option selected>Seleccione un equipo</option>
                            <?php 
                                $equipos = $connect->query("SELECT * FROM Accesorios");
                                while ($datos = mysqli_fetch_assoc($equipos)):
                            ?>
                            <option <?php echo $datos["N_Accesorio"] === $equipo_ac["N_Accesorio"] ? "selected = selected": "" ?> value="<?php echo $datos['ID_Accesorio'] ?>"><?php echo $datos['N_Accesorio'];?></option>
                        <?php endwhile ?>

                    </select>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="act_ac_equipo" value="actualizar" class="btn btn-primary">Registrar</button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>