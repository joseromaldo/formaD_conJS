<?php include_once '../../includes/header.php'?>
<?php

require '../../models/Asignar.php';
$nombre = new Asignar();

$nombres = $nombre->buscar();

?>



<?php include_once '../../includes/footer.php'?>