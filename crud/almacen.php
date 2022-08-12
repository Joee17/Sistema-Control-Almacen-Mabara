<?php
include '../cado/clase_almacen.php';
$oc = new Almacen();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
		$nombre= $_POST['txtnombre'];
        $oc->registrar($nombre);
        header('Location: ../inicio.php');
        break;
}

?>
