<!-- Modal -->
<div class="modal fade" id="accesorio_eq_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

        <h1 class="modal-title pt-3 pb-1 text-center fs-5" id="titulo-acc-equipo"></h1>
    
      <div class="modal-body">

        <form id="form_accesorios_equipo" enctype="multipart/form-data" method="POST">

            <div id="acciones-acc-e"></div>

            <div class="row mb-2">

                <label for="" class="col-sm-2 col-form-label">Equipo</label>

                <div class="col-sm-10">

                    <select class="form-select mb-3" aria-label="Default select example" id="equipo" name="equipo_m" required>

                        <option value="" selected>Seleccione un equipo</option>
                            <?php 
                                $equipos = $conectado->prepare("SELECT * FROM Equipos ORDER BY N_equipo ASC");
                                $equipos->execute();
                                while ($datos = $equipos->fetch()):
                            ?>
                            <option value="<?php echo $datos['ID_Equipo'] ?>"><?php echo $datos['N_Equipo'];?></option>
                        <?php endwhile ?>

                    </select>

                </div>
            </div>

            <div class="row mb-2">

                <label for="" class="col-sm-2 col-form-label">Accesorio</label>

                <div class="col-sm-10">

                    <select class="form-select mb-3" aria-label="Default select example" id="accesorio-eq" name="accesorio_eq" required>

                        <option value="" selected>Seleccione un accesorio</option>
                            <?php 
                                $accesorio = $conectado->prepare("SELECT * FROM Accesorios ORDER BY N_Accesorio");
                                $accesorio->execute();
                                while ($datos = $accesorio->fetch()):
                            ?>
                            <option value="<?php echo $datos['ID_Accesorio'] ?>"><?php echo $datos['N_Accesorio'];?></option>
                        <?php endwhile ?>

                    </select>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_registro_acc_eqq" value="registro" id="boton-acc-e" class="btn btn-primary"></button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>