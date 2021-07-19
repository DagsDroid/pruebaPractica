<?php 

//Extraemos las variables de conexion del archivo config
//Para utilizarlas en este archivo
$data = require_once '../app/config.php';

function conectar(){
	//Creamos la conexion a la base de datos, colocando los permisos
	$con = new mysqli(HOST, USER, PASS, BD);

	//En caso de que no pueda conectarse a la base de datos
	//lanzara un error
	if ($con->connect_errno){
		
		//Impresion
		echo "Error en la Conexion";
		//Fin de compilacion
		die();
	}

	//Si la conexion esta correctamente, retornamos la variable
	//Para utilizarla cada vez que queramos acceder a la base de datos
	return $con;
}





?>


