<?php
include '../cado/clase_asistencia.php';
$oc = new Asistencia();
switch ($_POST['txtoperacion']){
    
    case 'eliminar':
        
        $id=$_POST['txtid'] ; 

       
        $oc->eliminar($id);
        $oc->eliminar1($id);
        header('Location: ../asistencia.php?e=4');
        break;
        case 'generar':        
            $oc->generar();
            header('Location: ../asistencia.php?e=1');

            break;
            case 'asis':   
                $id=$_POST['id'] ;     
                $oc->asis($id);
                header('Location: ../detalle_asistencia.php?e=1');
    
                break;
                case 'falta':    
                    $id=$_POST['id'] ;   
                    $oc->falta($id);
                    header('Location: ../detalle_asistencia.php?e=1');
        
                    break;
                    case 'eliminar':    
                        $id=$_POST['id'] ;   
                        $oc->falta($id);
                        header('Location: ../detalle_asistencia.php?e=1');
            
                        break;
        
    

}

?>
