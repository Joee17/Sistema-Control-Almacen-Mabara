<?php
require_once('conectar.php');//se llama a la clase cado de conectar.php, es require once porq necesariamente se debe realizar la conexion

class Usuario{
	
	function iniciarSesion($usuario,$password){
		$objCado= new cado();//se llama a la clase cado y se almacena en una variable
		$sql="SELECT *from logins where usuario='$usuario' and password= MD5('$password')";
			$ejecutar=$objCado->ejecutar($sql);//se ejecuta la consulta
			return $ejecutar;
		} 
		function listar(){
		$objCado= new cado();
		$sql="SELECT p.id_portero,p.descripcion,p.fecha,p.hora_entrada,p.hora_salida,p.descripcion1,p.hora_entrada1,p.hora_salida1,l.usuario,p.latitud,p.longitud from portero as p inner join logins as l on p.idusuario=l.idusuario order by p.id_portero DESC";
			$ejecutar=$objCado->ejecutar($sql);
			return $ejecutar;
		} 
	 
}
?>