<?php
include '../cado/clase_medidor.php';
$oc = new Medidor();
session_start();
switch ($_POST['txtoperacion']){
    
    case 'registrar':
		$codigo = $_POST['txtcodigo'];
    $inicia = $_POST['txtinicia'];
    $fin= $_POST['txtfin'];
        $tipo= $_POST['txttipo'];

        
        for($i=$inicia; $i<=$fin; $i++)
      {
        if($i <=9){
          $conca=$codigo."0".$i;
        $oc->registrar($conca,$tipo,$_SESSION["idalmacen"]);
        }else{
          $oc->registrar($codigo.$i,$tipo,$_SESSION["idalmacen"]);
        }
      }
      header('Location: ../medidores.php?e=1');
        break;

        case 'modificar':
            $id = $_POST['txtid'];
            $codigo = $_POST['txtcodigo'];
        $tipo= $_POST['txttipo'];
            $oc->modificar($id,$codigo,$tipo);
            header('Location: ../medidores.php?e=3');
            break;
    case 'eliminar':
        try{
        $id = $_POST['txtid2'];
        $oc->eliminar($id);
        header('Location: ../medidores.php?e=4');
        }catch(Exception $error){
        header('Location: ../medidores.php?e=2');
        }    
        break;
       
     
}

?>
