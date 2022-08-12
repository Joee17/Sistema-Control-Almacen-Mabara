<?php
include '../cado/clase_materialcuadrilla.php';
$oc = new MaterialCuadrilla();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
        
        $idcuadrilla = $_POST['txtidcuadrilla'];
		$idequipo = $_POST['txtidequipo'];
        $cantidad= $_POST['txtcantidad'];
        $fecha= $_POST['txtfecha'];
        $oc->restar($idequipo,$cantidad);
        $oc->registrar($idcuadrilla,$idequipo,$cantidad,$fecha);
        header('Location: ../materialcuadrilla.php?e=1');
        foreach($cliente as $valor){
        }
        break;
        case 'modificar':
            $id = $_POST['txtid'];
            $idcuadrilla = $_POST['txtidcuadrilla'];
            $idequipo = $_POST['txtidequipo'];
            $cantidad= $_POST['txtcantidad'];
            $fecha= $_POST['txtfecha'];

            $oc->modificar($id,$idcuadrilla,$idequipo,$cantidad,$fecha);
            header('Location: ../materialcuadrilla.php?e=3');
            foreach($cliente as $valor){
            }
            break;
            case 'eliminar':
                try{
                    $id= $_POST['txtid2'];
                    $idequipo = $_POST['txtidequipo'];
                    $cantidad= $_POST['txtcantidad'];
                  
        
                        $oc->eliminar($id);
                        $oc->sumar($idequipo,$cantidad);
                   
                    
                   header('Location: ../materialcuadrilla.php?e=4');
              }
                  catch(Exception $error){
                  header('Location: ../materialcuadrilla.php?e=2');
                      }
             
                break;
       
     
}

?>
