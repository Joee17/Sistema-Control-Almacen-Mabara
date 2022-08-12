<?php
include '../cado/clase_equipos.php';
$oc = new Equipo();
session_start();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
        
        $nombre = $_POST['txtnombre'];  
		$tipo = $_POST['txttipo'];
        $medida= $_POST['txtmedida'];
       
        $oc->registrar($nombre,$tipo,$medida,$_SESSION["idalmacen"]);
        header('Location: ../equipos.php?e=1');
        break;
            case 'eliminar':
                try{
                    $id = $_POST['txtid2'];
                    $oc->eliminar($id);
                   header('Location: ../equipos.php?e=4');
              }
                  catch(Exception $error){
                  header('Location: ../equipos.php?e=2');
                      }
             
                break;
                case 'modificar':
                    $id= $_POST['txtid'];
                    $nombre = $_POST['txtnombre'];  
                    $tipo = $_POST['txttipo'];
                    $medida= $_POST['txtmedida'];
                   
                    $oc->modificar($id,$nombre,$tipo,$medida);
                    header('Location: ../equipos.php?e=3');
                    break;
       
     
}

?>
