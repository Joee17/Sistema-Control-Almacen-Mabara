<?php
include '../cado/clase_megados.php';
$oc = new Megados();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
        
        $idpersona= $_POST['txtidpersona'];  
		$cantidad = $_POST['txtcantidad'];
        $fecha= $_POST['txtfecha'];
       
        $oc->registrar($idpersona,$cantidad,$fecha);
        header('Location: ../megados.php?e=1');
        break;
        case 'modificar':
            $id= $_POST['txtid'];  
            $idpersona= $_POST['txtidpersona'];  
            $cantidad = $_POST['txtcantidad'];
            $fecha= $_POST['txtfecha'];
           
            $oc->modificar($id,$idpersona,$cantidad,$fecha);
            header('Location: ../megados.php?e=3');
            break;
            case 'eliminar':
                try{
                    $id = $_POST['txtid2'];
                    $oc->eliminar($id);
                   header('Location: ../megados.php?e=4');
              }
                  catch(Exception $error){
                  header('Location: ../megados.php?e=2');
                      }
             
                break;
       
     
}

?>
