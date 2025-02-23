<div class="modal fade" id="Actualizarcargo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

        <h1 class="text-center modal-title pt-4 pb-3 fs-5" id="exampleModalLabel">Actualizar cargo</h1>

      <div class="modal-body">

        <form action="" method="post">
            <input name="idcargoact" id="id_cargo" value="" type="hidden">

            <div class="row mb-2">
                <label for="gerencia" class="col-sm-2 col-form-label">Gerencia</label>
                <div class="col-sm-10">
                    <select class="form-select mb-3" aria-label="Default select example" id="gerencia_act" name="">
                        
                        <option value="">Seleccione una Gerencia</option>

                        <?php

                        $gerencia = $connect->query("SELECT * FROM Gerencia");

                        while ($gerencias = $gerencia->fetch_assoc()):

                        ?>

                        <option value="<?php echo $gerencias["ID_gerencia"]?>"> <?php echo $gerencias["N_gerencia"]?></option>

                        <?php endwhile ?>

                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="Division" class="col-sm-2 col-form-label">Division</label>
                <div class="col-sm-10">
                    <select class="form-select mb-3" aria-label="Default select example" id="Division_act" name="division_act">
                        
                        <option value="">Seleccione una division</option>

                    </select>
                </div>
            </div>

            <div class="row mb-2">

                <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="cargo_act" name="cargoact" placeholder="escriba un cargo" value="" >

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_cargo_a" value="btn_actualizar" class="btn btn-primary">Actualizar</button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>