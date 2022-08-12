<?php
require_once('conectar.php');
class Asistencia{

		
		function listar($id){
			$objCado=new cado();
			$sql="SELECT a.idasistencia,concat(p.appaterno,' ',p.apmaterno,' ',p.nombres),a.estado FROM asistencia as a inner join persona as p on p.idpersona=a.idpersona where a.id_crea_asistencia='$id' ";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;	
		}function listar_per(){
			$objCado=new cado();
			$sql="SELECT *from persona";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;	
		}
		function listar_crea(){
			$objCado=new cado();
			$sql="SELECT*from crea_Asistencia";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;	
		}
		function asis($id){
			$objCado=new cado();
			$sql="UPDATE asistencia set estado='1' where idasistencia='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;	
		}
		function falta($id){
			$objCado=new cado();
			$sql="UPDATE asistencia set estado='0' where idasistencia='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
		}
	
		function generar(){
			$objCado=new cado();
			$fecha=date("Y-m-d");
			$sql="INSERT INTO crea_Asistencia VALUES('0','$fecha')";
			
			$conexion=$objCado->conectar();
			$ejecutar= $conexion->prepare($sql);
			$ejecutar->execute();
			$ID = $conexion->lastInsertId();
			$conexion=null;
			$obj=new Asistencia();
			$listar=$obj->listar_per();
            while($fila=$listar->fetch()){
                $obj->registrar($ID,$fila[0]);
            };

			return $ejecutar;
		
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM asistencia where id_crea_asistencia='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar1($id){
			$objCado=new cado();
			$sql="DELETE FROM crea_Asistencia where id_asistencia='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function registrar($id,$idpersona){
			$objCado=new cado();
			$sql="INSERT INTO asistencia values('0','$idpersona','0','$id')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		


	
}
?>