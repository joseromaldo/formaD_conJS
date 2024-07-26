<?php include_once '../../includes/header.php' ?>
<?php
require '../../models/Aplicacion.php';
require '../../models/Programador.php';
try {

  $aplicacion = new Aplicacion();

  $Aplicaciones = $aplicacion->buscar();
} catch (PDOException $e) {
  $error = $e->getMessage();
} catch (Exception $e2) {
  $error = $e2->getMessage();
}


try {

  $programador = new Programador();


  $programadores = $programador->buscar();
  

} catch (PDOException $e) {
  $error = $e->getMessage();
} catch (Exception $e2) {
  $error = $e2->getMessage();
}

?>

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE APLICACIONES</h1>
  <div class="row justify-content-center mt-2">
    <form id="formulario" class="border border-primary rounded p-3 bg-light col-md-6">
    <input type="hidden" name="asi_id" id="asi_id">  

    <div class="form-group">
        <label for="aplicacion">Seleccione un programador</label>
        <select class="form-select" name="asi_pro" id="asi_pro" required>
          <option value="">Seleccionar..</option>
          <?php foreach ($programadores as $programador) { ?>
            <option value="<?php echo $programador['PRO_ID']; ?>"><?php echo $programador['PRO_NOMBRE']; ?></option>
          <?php } ?>
        </select>
      </div>

    <div class="form-group">
        <label for="asi_app">Seleccione una aplicación:</label>
        <select class="form-select" name="asi_app" id="asi_app" required>
          <option value="">Seleccionar..</option>
          <?php foreach ($Aplicaciones as $aplicacion1) { ?>
            <option value="<?php echo $aplicacion1['APL_ID']; ?>"><?php echo $aplicacion1['APL_NOMBRE']; ?></option>
          <?php } ?>
        </select>
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
            <h2 class="text-center mt-3">Listado de asignaciones</h2>
            <table class="table table-bordered table-hover" id="tablaAsigs">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Programador</th>
                        <th>Apellido</th>
                        <th>App</th>
                         <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">No hay asignaciones disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/formaD_conJS/src/funciones.js"></script>
<script defer src="/formaD_conJS/src/js/asignar/index.js"></script>

<?php include_once '../../includes/footer.php' ?>