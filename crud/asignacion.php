<?php
include '../cado/clase_asignacion.php';
$oc = new Asignacion();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
		$idcuadrilla = $_POST['txtidcuadrilla'];
        $idmedidor = $_POST['txtidmedidor'];
        $fecha= $_POST['txtfecha'];

        
        foreach($idmedidor as $valor){
            $oc->registrar($idcuadrilla,$valor,$fecha);
            $oc->entregado($valor);
        }
        header('Location: ../asignacion.php?e=1');
        break;

        case 'modificar':
            $id = $_POST['txtid'];
            $idcuadrilla = $_POST['txtidcuadrilla'];
        $idmedidor = $_POST['txtidmedidor'];
        $fecha= $_POST['txtfecha'];
        $oc->espera($idmedidor);
            $oc->modificar($id,$idcuadrilla,$idmedidor,$fecha);
            header('Location: ../asignacion.php?e=3');
            break;
    case 'eliminar':
        try{
        $id = $_POST['txtid2'];
        $idmedidor = $_POST['txtidmedidor1'];
        $oc->espera($idmedidor);
        $oc->eliminar($id);
        header('Location: ../asignacion.php?e=4');
        }catch(Exception $error){
        header('Location: ../asignacion.php?e=2');
        }    
        break;    
}

?>
