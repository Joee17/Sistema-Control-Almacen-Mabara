<?php
require_once('conectar.php');
class Ingreso{

		
		function listar($id){
			$objCado=new cado();
			$sql="SELECT d.iddetalle,e.nombres,d.cantidad,d.precio_uni,d.fecha,e.idequipo,e.tipo FROM detalle_ingreso as d INNER JOIN equipo as e on e.idequipo=d.idequipo where e.id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		
		function registrar($idequipo,$cantidad,$precio){
			$objCado=new cado();
			$fecha=date("Y-m-d");
			$sql="INSERT INTO detalle_ingreso VALUES('0','$idequipo','$cantidad','$precio','$fecha')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function registrar_ipper($idequipo,$codigo,$descripcion){
			$objCado=new cado();
			$fecha=date("Y-m-d");
			$sql="INSERT INTO codigo_ipper VALUES('0','$codigo','$idequipo',1,'$descripcion')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($iddetalle){
			$objCado=new cado();
			$sql="DELETE FROM detalle_ingreso
			WHERE iddetalle='$iddetalle'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		
		function restar($idequipo,$cantidad){
			$objCado=new cado();
			$sql="UPDATE equipo as e set
			cantidad=cantidad-'$cantidad'
			WHERE e.idequipo='$idequipo'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function sumar($idequipo,$cantidad){
			$objCado=new cado();
			$sql="UPDATE equipo as e set
			cantidad=cantidad+'$cantidad'
			WHERE e.idequipo='$idequipo'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
	
			
}
?>