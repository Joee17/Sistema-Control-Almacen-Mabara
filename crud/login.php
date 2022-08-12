<?php

include '../cado/clase_login.php';
$oc = new Login();
switch ($_POST['txtoperacion5']){
    
   
            case 'registrar_nuevo_personal':
                $id = $_POST['txtid3'];
                $usuario = $_POST['txtusuario'];
                $password = $_POST['txtpassword'];
                $tipo = $_POST['txttipo'];
                $oc->registrar($usuario,$password,$tipo);
                        $listar=$oc->listar_usuario($usuario,$password);
                          while($fila=$listar->fetch()){    
                           $oc->modificar_personal($id,$fila[0]);
                          }
                header('Location: ../personal.php');
                break;

                    case 'modificarp':
                    $id = $_POST['txtid3'];
                $usuario = $_POST['txtusuario'];
                $tipo = $_POST['txttipo'];
                $oc->modificar_login($id,$usuario,$tipo);
                header('Location: ../personal.php');
                    break;
                    case 'modificarpass':
                        $id = $_POST['txtid3'];
                    $password = $_POST['txtpassword'];
                    $oc->modificar_pass($id,$password);
                    header('Location: ../personal.php');
                        break;
    

       
}

?>
