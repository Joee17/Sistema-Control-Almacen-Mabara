<?php
require_once('conectar.php');
class Persona{

		
		function listar(){
			$objCado=new cado();
			$sql="SELECT*FROM persona ";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		
		function registrar($dni,$apellidopa,$apellidoma,$nombres,$fechanac,$cargo){
			$objCado=new cado();
			$sql="INSERT INTO persona VALUES('0','$dni','$apellidopa','$apellidoma','$nombres','$fechanac','$cargo',NULL)";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function modificar($id,$dni,$apellidopa,$apellidoma,$nombres,$fechanac,$cargo){
			$objCado=new cado();
			$sql="UPDATE persona SET
			dni='$dni',
			nombres='$nombres',
			appaterno='$apellidopa',
			apmaterno='$apellidoma',
			fechanac='$fechanac',
			cargo='$cargo'
			WHERE idpersona='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM persona
			WHERE idpersona='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function deshabilitar($id){
			$objCado=new cado();
			$sql="update logins set 
			estado= 0
			where idusuario='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
			
			
		}
		function habilitar($id){
			$objCado=new cado();
			$sql="update logins set 
			estado = 1
			where idusuario='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
			
			
		}
			
}
?>