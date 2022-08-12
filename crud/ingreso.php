<?php
include '../cado/clase_ingreso.php';
$oc = new Ingreso();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
        

		$idequipo = $_POST['txtidequipo'];
        $cantidad= $_POST['txtcantidad'];
        $precio= $_POST['txtprecio'];
        $oc->sumar($idequipo,$cantidad);
        $oc->registrar($idequipo,$cantidad,$precio);
        header('Location: ../equipos.php?e=1');
        break;
        case 'ipper':
            $idequipo = $_POST['txtidequipo'];
            $cantidad= '1';
            $codigo= $_POST['txtcodigo'];
            $descripcion= $_POST['txtdescripcion'];
            $oc->sumar($idequipo,$cantidad);
            $oc->registrar_ipper($idequipo,$codigo,$descripcion);
            header('Location: ../equipos.php?e=1');
            break;

            case 'eliminar':
                try{
                    $iddetalle = $_POST['txtiddetalle'];
                    $idequipo = $_POST['txtidequipo'];
                    $cantidad= $_POST['txtcantidad'];
                  
        
                        $oc->eliminar($iddetalle);
                        $oc->restar($idequipo,$cantidad);
                   
                    
                   header('Location: ../ingreso.php?e=4');
              }
                  catch(Exception $error){
                  header('Location: ../ingreso.php?e=2');
                      }
             
                break;
       
     
}

?>
