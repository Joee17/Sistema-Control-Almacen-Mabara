<?php
require_once('conectar.php');
class Megados{

		
		function listar(){
			$objCado=new cado();
			$sql="SELECT m.idmegados,concat(p.appaterno,' ',p.apmaterno,' ',p.nombres),m.cantidad,m.fecha,p.idpersona FROM megados as m inner join persona as p on p.idpersona=m.idpersona";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		
		function registrar($idpersona,$cantidad,$fecha){
			$objCado=new cado();
			$sql="INSERT INTO megados VALUES('0','$idpersona','$cantidad','$fecha')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function modificar($id,$idpersona,$cantidad,$fecha){
			$objCado=new cado();
			$sql="UPDATE megados SET
			idpersona='$idpersona',
			cantidad='$cantidad',
			fecha='$fecha'
			WHERE idmegados='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM megados
			WHERE idmegados='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
	
			
}
?>