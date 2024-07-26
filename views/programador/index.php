<?php include_once '../../includes/header.php' ?>
<?php include_once '../../models/Grado.php' ?>
<?php include_once '../../models/Arma.php' ?>
<?php
try {
    $grado = new Grado($_GET);
    $Grados = $grado->buscar();

    $arma = new Arma($_GET);
    $Armas = $arma->buscar();

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<div class="container">
    <h1 class="text-center mt-5">Programadores</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <form id="formulario">
                        <input type="hidden" name="pro_id" id="pro_id">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="pro_grado" class="fs-5">Grado:</label>
                                    <select class="form-select" name="pro_grado" id="pro_grado" required>
                                        <option value="">Seleccionar grado</option>
                                        <?php foreach ($Grados as $grado) : ?>
                                            <option value="<?= $grado['GRA_ID'] ?>"><?= $grado['GRA_NOMBRE'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pro_arma" class="fs-5">Arma:</label>
                                    <select class="form-select" name="pro_arma" id="pro_arma" required>
                                        <option value="">Seleccionar arma</option>
                                        <?php foreach ($Armas as $arma) : ?>
                                            <option value="<?= $arma['ARMA_ID'] ?>"><?= $arma['ARMA_NOMBRE'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pro_nombre" class="fs-5">Nombre</label>
                                    <input type="text" class="form-control" name="pro_nombre" id="pro_nombre" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pro_apellido" class="fs-5">Apellido</label>
                                    <input type="text" class="form-control" name="pro_apellido" id="pro_apellido" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pro_dpi" class="fs-5">DPI</label>
                                    <input type="text" class="form-control" name="pro_dpi" id="pro_dpi" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pro_correo" class="fs-5">Correo</label>
                                    <input type="email" class="form-control" name="pro_correo" id="pro_correo" required>
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
        <div class="col-lg-12 table-responsive">
            <h2 class="text-center mt-3">Listado de programadores</h2>
            <table class="table table-bordered table-hover" id="tablaPros">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Grado</th>
                        <th>Arma</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DPI</th>
                        <th>Correo</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9" class="text-center">No hay programadores disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script defer src="/formaD_conJS/src/funciones.js"></script>
<script defer src="/formaD_conJS/src/js/programador/index.js"></script>
<?php include_once '../../includes/footer.php' ?>