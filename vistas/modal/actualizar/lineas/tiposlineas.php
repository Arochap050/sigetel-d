<div class="modal fade" id="actipolinea<?php echo $tipoLinea["ID_tipolinea"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

        <h1 class="text-center modal-title fs-5 pt-4 pb-3" id="exampleModalLabel">Registrar un tipo de linea</h1>

      <div class="modal-body">

        <form action="" method="post">

        <input type="hidden" name="idtipolinea" value="<?php echo $tipoLinea["ID_tipolinea"] ?>" >

        <div class="row mb-2">
                <label for="Operadora" class="col-sm-2 col-form-label">Operadora</label>
                <div class="col-sm-10">
                    <select class="form-select mb-3" aria-label="Default select example" id="Operadora" name="Operadora" required >

                        <?php
                        
                        $query = $connect->query("SELECT * FROM Operadoras");

                        while ($Operadora = mysqli_fetch_assoc($query)){
                            ?>

                            <option <?php echo $Operadora["N_Operadora"] === (string) $tipoLinea["N_Operadora"] ? "selected = selected": "" ?> value="<?php echo $Operadora['ID_Operadora'] ?>"><?php echo $Operadora['N_Operadora'];?></option>

                        <?php } ?>

                    </select>
                </div>
            </div>

            <div class="row mb-2">

                <label for="tipolinea" class="col-sm-2 col-form-label">Tipo</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="tipolinea" name="tipolinea" value="<?php echo $tipoLinea["N_tipolinea"] ?>" required>

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_act_tipo_linea" value="actualizar" class="btn btn-primary">Actualizar</button>

            </div>

        </form>

      </div>
    </div>
  </div>

</div>