<?php include_once '../../includes/header.php' ?>
<div class="container">
  <h1 class="text-center mt-5">Aplicaciones</h1>
  <div class="row justify-content-center mb-3">
    <div class="col-lg-8">
      <div class="card border-0 shadow-lg">
        <div class="card-body">
          <form id="formulario">
            <input type="hidden" name="apl_id" id="apl_id">
            <div class="row mb-3">
              <div class="col">
                <label for="apl_nombre" class="form-label">Ingrese nombre de la App</label>
                <input type="text" name="apl_nombre" id="apl_nombre" class="form-control" placeholder="Facebook" required>
              </div>
            </div>
            <div class="row mb-3">
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
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-lg-8 table-responsive">
      <h2 class="text-center mt-3">Listado de Apps</h2>
      <table class="table table-bordered table-hover" id="tablaApps">
        <thead class="thead-dark">
          <tr>
            <th>No.</th>
            <th>Nombre</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="4" class="text-center">No hay apps disponibles</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>
<script defer src="/formaD_conJS/src/funciones.js"></script>
<script defer src="/formaD_conJS/src/js/aplicacion/index.js"></script>
<?php include_once '../../includes/footer.php' ?>