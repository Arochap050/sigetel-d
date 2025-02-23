<!-- Modal registro division -->

<div class="modal fade" id="actdivision<?php echo $divisiones["ID_division"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

      <div class="modal-header">

        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar division</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <form action="" method="post">

        <input type="hidden" name="idDivision" value="<?php echo $divisiones["ID_division"] ?>">

        <div class="row mb-2">

                <label for="gerenciact" class="col-sm-2 col-form-label">Gerencia</label>
                <div class="col-sm-10">

                    <select class="form-select mb-3" aria-label="Default select example" id="gerenciact" name="gerenciaact">

                        <?php
                        
                        $query = $connect->query("SELECT * FROM Gerencia");

                        while ($gerencias = mysqli_fetch_array($query)){

                            ?>

                            <option <?php echo $gerencias["N_gerencia"] === (string) $divisiones["N_gerencia"] ? "selected = selected": "" ?> value="<?php echo $gerencias['ID_gerencia'] ?>"><?php echo $gerencias['N_gerencia'];?></option>

                        <?php } ?>

                    </select>
                </div>
            </div>

            <div class="row mb-2">

                <label for="divisionact" class="col-sm-2 col-form-label">Division</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="divisionact" name="divisionact" placeholder="escriba una division" value="<?php echo $divisiones["N_division"] ?>" required>

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_actualizar" value="btn_actualizar" class="btn btn-primary">Actualizar</button>

            </div>

        </form>

      </div>
    </div>
  </div>

</div>