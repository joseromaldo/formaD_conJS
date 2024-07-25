<?php include_once '../../includes/header.php' ?>
<div class="container mt-5">
  <h1 class="text-center mb-4 text-black">Grado Oficiales</h1>
  <div class="row justify-content-center">
    <form id="formulario" class="col-lg-8 bg-white p-4 shadow rounded">
      <div class="mb-3">
        <label for="gra_nombre" class="form-label">Ingrese un grado</label>
        <input type="text" name="gra_nombre" id="gra_nombre" class="form-control" placeholder="Ej. Capitán" required>
      </div>
      <div class="row">
      <div class="col d-grid">
        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-floppy me-2"></i>Guardar</button>
      </div>
      <div class="col d-grid">
        <button type="submit" class="btn btn-info btn-lg"><i class="bi bi-search me-3"></i>Buscar</button>
      </div>
      <div class="col d-grid">
        <button type="submit" class="btn btn-warning btn-lg"><i class="bi bi-trash me-2"></i>Limpiar</button>
      </div>
      </div>
    </form>
  </div>
</div>
<?php include_once '../../includes/footer.php' ?>
