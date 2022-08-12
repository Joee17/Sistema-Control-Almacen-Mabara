<?php
require_once('conectar.php');
class Medidor{

		
		function listar($id){
			$objCado=new cado();
			$sql="SELECT* FROM medidor where id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;	
		}
		function listar1($id){
			$objCado=new cado();
			$sql="SELECT* FROM medidor where estado='1' and id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;	
		}
		function registrar($codigo,$tipo,$id){
			$objCado=new cado();
			$sql="INSERT INTO medidor VALUES('0','$codigo','$tipo','1','$id')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function modificar($id,$codigo,$tipo){
			$objCado=new cado();
			$sql="UPDATE medidor SET
			codigo='$codigo',
			tipo='$tipo'
			WHERE idmedidor=$id";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM medidor
			WHERE idmedidor='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
	
}
?>