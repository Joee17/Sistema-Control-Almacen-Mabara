<?php
include '../cado/clase_equipos.php';
$oc = new Equipo();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
        
        $nombre = $_POST['txtnombre'];  
		$tipo = $_POST['txttipo'];
        $medida= $_POST['txtmedida'];
       
        $oc->registrar($nombre,$tipo,$medida);
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
       
     
}

?>
