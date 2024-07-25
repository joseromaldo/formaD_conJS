<?php include_once '../../includes/header.php' ?>
<div class="container mt-5">
  <h1 class="text-center mb-4 text-black">Grado Oficiales</h1>
  <div class="row justify-content-center">
    <form id="formulario" class="col-lg-8 bg-white p-4 shadow rounded">
    <input type="hidden" name="gra_id" id="gra_id">
      <div class="mb-3">
        <label for="gra_nombre" class="form-label">Ingrese un grado</label>
        <input type="text" name="gra_nombre" id="gra_nombre" class="form-control" placeholder="Ej. Capitán" required>
      </div>
      <div class="row">
      <div class="col d-grid">
        <button type="submit" id="btnGuardar" class="btn btn-primary btn-lg"><i class="bi bi-floppy me-2"></i>Guardar</button>
      </div>
      <div class="col d-grid">
        <button type="submit" id="btnBuscar" class="btn btn-info btn-lg"><i class="bi bi-search me-3"></i>Buscar</button>
      </div>
      <div class="col d-grid">
        <button type="submit" id="btnLimpiar" class="btn btn-warning btn-lg"><i class="bi bi-trash me-2"></i>Limpiar</button>
      </div>
      </div>
    </form>
  </div>

  <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center mt-3">Listado de grados</h2>
            <table class="table table-bordered table-hover" id="tablaGrados">
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
                        <td colspan="5" class="text-center">No hay grados disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script defer src="/formaD_conJS/src/js/funciones.js"></script>
<script defer src="/formaD_conJS/src/js/grado/index.js"></script>
<?php include_once '../../includes/footer.php' ?>
