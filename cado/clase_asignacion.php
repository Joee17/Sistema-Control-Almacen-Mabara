<?php
require_once('conectar.php');
class Asignacion{

		
		function listar($id){
			$objCado=new cado();
			$sql="SELECT m.idper_medidor,me.codigo,me.tipo,concat(c.nombre,' | ',p.appaterno,' ',p.apmaterno,' ',p.nombres),m.fecha
			,me.estado,c.idcuadrilla,me.idmedidor  FROM persona_medidor as m inner join cuadrilla as c on c.idcuadrilla=m.idcuadrilla 
			inner join persona as p on p.idpersona=c.idpersona inner join medidor as me on me.idmedidor=m.idmedidor where me.id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;	
		}
		function registrar($idcuadrilla,$valor,$fecha){
			$objCado=new cado();
			$sql="INSERT INTO persona_medidor VALUES('0','$idcuadrilla','$valor','$fecha')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function entregado($idmedidor){
			$objCado=new cado();
			$sql="UPDATE medidor SET
			estado='2'
			WHERE idmedidor='$idmedidor'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function terminado($idmedidor){
			$objCado=new cado();
			$sql="UPDATE medidor SET
			estado='3'
			WHERE idmedidor='$idmedidor'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function espera($idmedidor){
			$objCado=new cado();
			$sql="UPDATE medidor SET
			estado='1'
			WHERE idmedidor='$idmedidor'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function modificar($id,$idcuadrilla,$valor,$fecha){
			$objCado=new cado();
			$sql="UPDATE persona_medidor SET
			idcuadrilla='$idcuadrilla',
	
			fecha='$fecha'
			WHERE idper_medidor='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM persona_medidor
			WHERE idper_medidor='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
	
}
?>