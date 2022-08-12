<?php
require_once('conectar.php');
class MaterialCuadrilla{

		
		function listar($id){
			$objCado=new cado();
			$sql="SELECT c.idcua_equipo,e.nombres,cu.nombre,c.cantidad,c.fecha,e.idequipo,cu.idcuadrilla FROM equipo as e inner join cuadrilla_equipo as c on c.idequipo=e.idequipo inner join cuadrilla  as cu on cu.idcuadrilla=c.idcuadrilla where e.id_almacen='$id' ";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		function listar_materiales($id){
			$objCado=new cado();
			$sql="SELECT*FROM equipo where (tipo='MATERIAL'or tipo='ENSA') and cantidad > 0 AND id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		function buscar($id){
			$objCado=new cado();
			$sql="SELECT*FROM equipo where idequipo='$id' ";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		function registrar($idcuadrilla,$idequipo,$cantidad,$fecha){
			$objCado=new cado();
			$fecha=date("Y-m-d");
			$sql="INSERT INTO cuadrilla_equipo VALUES('0','$idequipo','$idcuadrilla','$cantidad','$fecha')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function modificar($id,$idcuadrilla,$idequipo,$cantidad,$fecha){
			$objCado=new cado();
			$fecha=date("Y-m-d");
			$sql="UPDATE cuadrilla_equipo set
			idequipo='$idequipo',
			idcuadrilla='$idcuadrilla',
			cantidad='$cantidad',
			fecha='$fecha'
			WHERE idcua_equipo='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM cuadrilla_equipo
			WHERE idcua_equipo='$id'";
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