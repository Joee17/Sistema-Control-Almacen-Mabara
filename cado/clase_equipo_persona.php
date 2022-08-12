<?php
require_once('conectar.php');
class Equipo_Persona{

		
		function listar_equipos($id){
			$objCado=new cado();
			$sql="SELECT c.id_codigo_ipper,c.codigo,c.descripcion,e.nombres,c.idequipo FROM codigo_ipper as c inner join equipo as e on e.idequipo=c.idequipo where (e.tipo='EQUIPO MAQUINARIA' or e.tipo='EPP' or e.tipo='IPER') and 
			c.estado='1' and e.id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		function listar_equipos1($id){
			$objCado=new cado();
			$sql="SELECT c.id_codigo_ipper,c.codigo,c.descripcion,e.nombres,c.idequipo FROM codigo_ipper as c inner join equipo as e on e.idequipo=c.idequipo where (e.tipo='EQUIPO MAQUINARIA' or e.tipo='EPP' or e.tipo='IPER') and e.id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		function listar_materiales(){
			$objCado=new cado();
			$sql="SELECT*FROM equipo where tipo='MATERIAL' and cantidad > 0 ";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		function listar($id){
			$objCado=new cado();
			$sql="SELECT ep.idequi_per,equ.nombres,concat(p.appaterno,' ',p.apmaterno,' ',p.nombres),ep.fecha,ep.descripcion,ep.estado,e.id_codigo_ipper,p.idpersona ,e.codigo,equ.idequipo FROM equipo_persona as ep inner join codigo_ipper as e on ep.id_codigo_ipper=e.id_codigo_ipper
			 inner join persona as p
			on ep.idpersona=p.idpersona inner join equipo as equ on equ.idequipo=e.idequipo
			 where (equ.tipo='EQUIPO MAQUINARIA' OR equ.tipo='EPP' OR equ.tipo='IPER') and equ.id_almacen='$id'";
			$ejecutar=$objCado->ejecutar($sql); 
			return $ejecutar;
			
			
		}
		
		function registrar($idequipo,$idpersona,$fecha,$descripcion,$estado){
			$objCado=new cado();
			$sql="INSERT INTO equipo_persona VALUES('0','$idequipo','$idpersona','$fecha','$descripcion','$estado')";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function cero_iper($idequipo){
			$objCado=new cado();
			$sql="UPDATE codigo_ipper SET
			estado='0'
			WHERE id_codigo_ipper='$idequipo'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function uno_iper($idequipo,$descripcion){
			$objCado=new cado();
			$sql="UPDATE codigo_ipper SET
			estado='1',
			descripcion='$descripcion'
			WHERE id_codigo_ipper='$idequipo'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		
		function modificar($id,$idequipo,$idpersona,$fecha,$descripcion,$estado){
			$objCado=new cado();
			$sql="UPDATE equipo_persona SET
			idequipo='$idequipo',
			idpersona='$idpersona',
			fecha='$fecha',
			descripcion='$descripcion',
			estado='$estado'
			WHERE idequi_per='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function modi($id,$idequipo,$fecha,$descripcion,$estado){
			$objCado=new cado();
			$sql="UPDATE equipo_persona SET
			id_codigo_ipper='$idequipo',
			fecha='$fecha',
			descripcion='$descripcion',
			estado='$estado'
			WHERE idequi_per='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM equipo_persona
			WHERE idequi_per='$id'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function restar($idequipo){
			$objCado=new cado();
			$sql="UPDATE equipo as e set
			cantidad=cantidad-'1'
			WHERE e.idequipo='$idequipo'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
		function sumar($idequipo){
			$objCado=new cado();
			$sql="UPDATE equipo as e set
			cantidad=cantidad+'1'
			WHERE e.idequipo='$idequipo'";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		}
	
			
}
?>