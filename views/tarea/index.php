<?php include_once '../../includes/header.php'; ?>
<?php
require '../../models/Aplicacion.php';

$app = new Aplicacion();
$Aplicaciones = $app->buscar();

?>

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE TAREAS</h1>
  <div class="row justify-content-center mt-2">
    <form  class="border border-primary rounded p-3 bg-light col-md-6" id="formulario">
    <input type="hidden" name="tar_id" id="tar_id">
      <div class="form-group">
        <label for="tar_app">Seleccione una aplicación:</label>
        <select class="form-select" name="tar_app" id="tar_app" required>
          <option selected>Seleccionar aplicación</option>
          <?php foreach ($Aplicaciones as $app) { ?>
            <option value="<?= $app['APL_ID']; ?>"><?= $app['APL_NOMBRE']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="tar_descripcion">Descripción de la tarea:</label>
        <textarea class="form-control" name="tar_descripcion" id="tar_descripcion" rows="4"></textarea>
      </div>
      <div class="form-group">
        <label for="tar_fecha">Fecha de asignación:</label>
        <input type="date" class="form-control" name="tar_fecha" id="tar_fecha" required>
      </div>
      <div class="row mt-3">
                                    <div class="col">
                                        <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" id="btnModificar" class="btn btn-secondary w-100">Modificar</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
                                    </div>
                                    <div class="col">
                                        <button type="reset" id="btnLimpiar" class="btn btn-warning w-100">Limpiar</button>
                                    </div>
                                </div>
    </form>
  </div>

  <div class="row justify-content-center">
        <div class="col-lg-12 table-responsive">
            <h2 class="text-center mt-3">Listado de programadores</h2>
            <table class="table table-bordered table-hover" id="tablaTareas">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>App</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                         <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9" class="text-center">No hay tareas disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script defer src="/formaD_conJS/src/funciones.js"></script>
<script defer src="/formaD_conJS/src/js/tarea/index.js"></script>
<?php include_once '../../includes/footer.php'; ?>
