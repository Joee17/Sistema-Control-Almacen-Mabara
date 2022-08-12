<?php
require_once('conectar.php');
class Login{
	
		function listar_usuario($usuario,$password){
			$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
			$sql="SELECT *FROM logins where usuario='$usuario'AND password= MD5('$password')" ;
				$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
				return $ejecutar;
			} 
			function listar_usuario_id($id){
				$objCado= new cado();//se llama a la clase cado y se almacena ern una variable
				$sql="SELECT*FROM logins where idusuario='$id'" ;
					$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
					return $ejecutar;
				} 
	
			function modificar_personal($id,$idusuario){
				$objCado=new cado();
				$sql="update personal set 
				idusuario='$idusuario' 
				where idpersonal='$id'";
				$ejecutar=$objCado->ejecutar($sql);
				return $ejecutar;
				
				
			}
		
			function modificar_login($id,$usuario,$tipo){
				$objCado=new cado();
				$sql="update logins set 
				usuario='$usuario' ,
			
				idtipo='$tipo'
				where idusuario='$id'";
				$ejecutar=$objCado->ejecutar($sql);
				return $ejecutar;
				
				
			}
			function modificar_pass($id,$password){
				$objCado=new cado();
				$sql="update logins set 
				password=md5('$password') 
				where idusuario='$id'";
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
			
		
	
		function eliminar($id){
			$objCado=new cado();
			$sql="DELETE FROM cliente WHERE id_cliente = $id";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
	
		}

}
?>