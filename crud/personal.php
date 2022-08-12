<?php
include '../cado/clase_personal.php';
$oc = new Persona();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
        
        $dni = $_POST['txtdni'];  
		$nombres = $_POST['txtnombres'];
        $apellidopa = $_POST['txtapellidopa'];
        $apellidoma = $_POST['txtapellidoma'];
        $fechanac = $_POST['txtfechanac'];
        $cargo = $_POST['txtcargo'];
       
        $oc->registrar($dni,$apellidopa,$apellidoma,$nombres,$fechanac,$cargo);
        header('Location: ../personal.php?e=1');
        break;
        case 'modificar':
            $id = $_POST['txtid'];
            $dni = $_POST['txtdni'];  
		$nombres = $_POST['txtnombres'];
        $apellidopa = $_POST['txtapellidopa'];
        $apellidoma = $_POST['txtapellidoma'];
        $fechanac = $_POST['txtfechanac'];
        $cargo = $_POST['txtcargo'];
            $oc->modificar($id,$dni,$apellidopa,$apellidoma,$nombres,$fechanac,$cargo);
            header('Location: ../personal.php?e=3');
            break;
            case 'eliminar':
                try{
                    $id = $_POST['txtid2'];
                    $oc->eliminar($id);
                   header('Location: ../personal.php?e=4');
              }
                  catch(Exception $error){
                  header('Location: ../personal.php?e=2');
                      }
             
                break;
                case 'habilitar':
                    $id = $_POST['txtid6'];
                    $oc->habilitar($id);        
                    header('Location: ../personal.php');
                    break;
        
            case 'deshabilitar':
                $id = $_POST['txtid7'];
                $oc->deshabilitar($id);        
                header('Location: ../personal.php');
            break;
     
}

?>
