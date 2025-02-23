<!-- Modal registro division -->
<div class="modal fade" id="registrotipolinea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content bg-secondary">

        <h1 class="text-center modal-title fs-5 pt-4 pb-3" id="exampleModalLabel">Registrar un tipo de linea</h1>

      <div class="modal-body">

        <form action="" method="post">

        <div class="row mb-2">

                <label for="Operadora" class="col-sm-2 col-form-label">Operadora</label>

                <div class="col-sm-10">

                    <select class="form-select mb-3" aria-label="Default select example" id="Operadora" name="Operadora">

                        <option selected>Seleccione una Operadora</option>

                        <?php
                        
                        $query = $connect->query("SELECT * FROM Operadoras");

                        while ($Operadora = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?php echo $Operadora['ID_Operadora'] ?>"><?php echo $Operadora['N_Operadora'];?></option>

                        <?php } ?>

                    </select>

                </div>

            </div>

            <div class="row mb-2">

                <label for="tipolinea" class="col-sm-2 col-form-label">Tipo</label>

                <div class="col-sm-10">

                <input type="text" class="form-control" id="tipolinea" name="tipolinea" placeholder="Escriba un tipo de linea" required>

                </div>

            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btntipolinea" value="info" class="btn btn-primary">Registrar</button>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>