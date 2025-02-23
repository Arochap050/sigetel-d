<div class="modal fade" id="ActUsuaria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content bg-secondary">

      <div class="">

        <h1 class="modal-title text text-center mt-3 mb-2 fs-5" id="exampleModalLabel">Estado</h1>

      </div>

      <div class="modal-body">

        <form id="editar_estatus" action="" method="post">

                <input type="hidden" id="id_usuario_st" name="id_usuario" value="">
                <input type="hidden" id="" name="accion" value="editar_estado">

                <div class="">

                <select id="status_usuario" class="form-select mb-2" style="width: 100%;" name="newestado">
                
                    <!-- <option value="">prueba</option> -->
                    <?php
                        $estado = $conectado->prepare("SELECT * FROM estado_usuarios WHERE estado_usuario <> 'Bloqueado'");
                        $estado->execute();

                        while ($status = $estado->fetch()):
                    ?> 

                    <option class="text text-center" value="<?php echo $status["id_status_user"] ?>" ><?php echo $status["estado_usuario"] ?></option>

                    <?php endwhile ?>

                </select>

                </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn_actualizar_status_ususario" value="actestadouser" class="btn btn-primary me-4">Actualizar</button>

            </div>

        </form>

      </div>
    </div>
  </div>
</div>