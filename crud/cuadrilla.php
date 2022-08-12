<?php
include '../cado/clase_cuadrilla.php';
$oc = new Cuadrilla();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
		$idpersona = $_POST['txtidpersona'];
        $nombre= $_POST['txtnombre'];
        $oc->registrar($idpersona,$nombre);
        header('Location: ../cuadrilla.php?e=1');
        break;

        case 'modificar':
            $id = $_POST['txtid'];
            $idpersona = $_POST['txtidpersona'];
            $nombre= $_POST['txtnombre'];
            $oc->modificar($id,$idpersona,$nombre);
            header('Location: ../cuadrilla.php?e=3');
            break;
    case 'eliminar':
        try{
        $id = $_POST['txtid2'];
        $oc->eliminar($id);
        header('Location: ../cuadrilla.php?e=4');
        }catch(Exception $error){
        header('Location: ../cuadrilla.php?e=2');
        }    
        break;
       
     
}

?>
