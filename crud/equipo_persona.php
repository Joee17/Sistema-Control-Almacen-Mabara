<?php
include '../cado/clase_equipo_persona.php';
$oc = new Equipo_Persona();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
        
        $idequipo = $_POST['txtidequipo'];  
		$idpersona = $_POST['txtidpersona'];
        $fecha= $_POST['txtfecha'];
        $descripcion= $_POST['txtdescripcion'];
        $sep = explode(" ", $idequipo);
        $estado= '1';
        $oc->registrar($sep[0],$idpersona,$fecha,$descripcion,$estado);
        $oc->restar($sep[1]);
        $oc->cero_iper($sep[0]);
        header('Location: ../equipoPersonal.php?e=1');
        break;

            case 'modi':
                $id = $_POST['txtid'];
                $idequipo = $_POST['txtidequipo']; 
                $idequipoo = $_POST['txtidequipoo'];  
                $fecha= date("Y-m-d");
                $descripcion= $_POST['txtdescripcion'];
                $estado= '2';
                $oc->modi($id,$idequipo,$fecha,$descripcion,$estado);
                $oc->uno_iper($idequipo,$descripcion);
                if($estado==2){
                $oc->sumar($idequipoo);}
                
                header('Location: ../equipoPersonal.php?e=3');
                break;
            case 'eliminar':
                try{
                    $id = $_POST['txtid2'];
                    $oc->eliminar($id);
                   header('Location: ../equipoPersonal.php?e=4');
              }
                  catch(Exception $error){
                  header('Location: ../equipoPersonal.php?e=2');
                      }
             
                break;
       
     
}

?>
