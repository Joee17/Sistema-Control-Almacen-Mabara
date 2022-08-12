<?php
require_once('conectar.php');
class Cuadrilla{

		
		function listar(){
			$objCado=new cado();
			$sql="SELECT c.idcuadrilla,c.nombre,concat(p.appaterno,' ',p.apmaterno,' ',p.nombres),p.idpersona FROM cuadrilla as c inner join persona as p on p.idpersona=c.idpersona";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;	
		}
		function registrar($idpersona,$nombre){
			$objCado=new cado();
			$sql="INSERT INTO cuadrilla VALUES('0','$idpersona','$nombre')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function modificar($id,$idpersona,$nombre){
			$objCado=new cado();
			$sql="UPDATE cuadrilla SET
			idpersona='$idpersona',
			nombre='$nombre'
			WHERE idcuadrilla=$id";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($idcuadrilla){
			$objCado=new cado();
			$sql="DELETE FROM cuadrilla
			WHERE idcuadrilla='$idcuadrilla'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
	
}
?>