<!-- Modal registro division -->
<div class="modal fade" id="registrodivision" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-secondary">

      <div class="modal-header">

        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar division</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <form action="" method="post">

        <div class="row mb-2">
                <label for="gerencia" class="col-sm-2 col-form-label">Gerencia</label>
                <div class="col-sm-10">
                    <select class="form-select mb-3" aria-label="Default select example" id="gerencia" name="gerencia">

                        <option value="" selected>Seleccione una gerencia</option>

                        <?php
                        
                        $query = $connect->query("SELECT * FROM Gerencia");

                        while ($gerencias = mysqli_fetch_array($query)){
                            ?>

                            <option value="<?php echo $gerencias['ID_gerencia'] ?>"><?php echo $gerencias['N_gerencia'];?></option>

                        <?php } ?>

                    </select>
                </div>
            </div>

            <div class="row mb-2">

                <label for="division" class="col-sm-2 col-form-label">Division</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="division" name="division" placeholder="escriba una division" required>

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_divisiones" value="btn-registrar" class="btn btn-primary">Registrar</button>

            </div>

        </form>

      </div>
    </div>
  </div>

</div>