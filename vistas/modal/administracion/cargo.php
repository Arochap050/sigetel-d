<div class="modal fade" id="modal_cargo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

      <h1 class="text-center modal-title fs-5 pt-4 pb-3" id="exampleModalLabel">Registrar cargo</h1>

      <div class="modal-body">

        <form action="" method="post">

            <div class="row mb-2">
                <label for="gerencia" class="col-sm-2 col-form-label">Gerencia</label>
                <div class="col-sm-10">
                    <select class="form-select mb-3" aria-label="Default select example" id="gerencia" name="">
                        
                        <option value="">Seleccione una Gerencia</option>

                        <?php

                        $gerencia = $conectado->prepare("SELECT * FROM Gerencia");
                        $gerencia->execute();
                        while ($gerencias = $gerencia->fetch()):

                        ?>

                        <option value="<?php echo $gerencias["ID_gerencia"]?>"> <?php echo $gerencias["N_gerencia"]?></option>

                        <?php endwhile ?>

                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="Division" class="col-sm-2 col-form-label">Division</label>
                <div class="col-sm-10">
                    <select class="form-select mb-3" aria-label="Default select example" id="Division" name="division_r">
                        
                        <option value="">Seleccione una division</option>
                    </select>
                </div>
            </div>

            <div class="row mb-2">

                <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Escriba el nombre del cargo" required>

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_cargo_r" value="btn_registro" class="btn btn-primary">Registrar</button>

            </div>

        </form>

      </div>

    </div>
  </div>

</div>