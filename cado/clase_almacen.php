<?php
require_once('conectar.php');
class Almacen{

		
		function listar(){
			$objCado=new cado();
			$sql="SELECT*FROM almacen";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		function Buscar($id){
			$objCado=new cado();
			$sql="SELECT*FROM almacen where id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		
		function registrar($nombre){
			$objCado=new cado();
		
			$sql="INSERT INTO almacen VALUES('0','$nombre')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}

	
			
}
?>