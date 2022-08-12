<?php
require_once('conectar.php');

class Equipo{

		
		function listar($id){
			$objCado=new cado();
			$sql="SELECT*FROM equipo where id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		
		function registrar($nombre,$tipo,$medida,$se){
			$objCado=new cado();
			$sql="INSERT INTO equipo VALUES('0','$nombre','$tipo','$medida','0','$se')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function modificar($id,$nombre,$tipo,$medida){
			$objCado=new cado();
			$sql="UPDATE equipo SET
			nombres='$nombre',
			tipo='$tipo',
			medida='$medida'
			WHERE idequipo='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM equipo
			WHERE idequipo='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
	
			
}
?>