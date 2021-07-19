<?php 
	//Declaracion de variables para la conexion a base de datos

	//Variable host,localhost es igual que decir 127.0.0.0
	//En caso de que se aloje la base de datos en un servidor
	//Debe reemplazar localhost por la direccion ip del servidor
	define('HOST', "localhost:8889");

	//user y pass son variables que contienen los permisos necesarios
	//para accesar a la base de datos
	//en apache por defecto el usuario es root y no tiene contraseña
	//(Recomendable que tenga una contraseña por motivos de seguridad)
	define('USER', "root");
	define('PASS', "root");

	//Bd contiene el nombre de la base de datos
	//Si se cambia el nombre de la base de datos
	//Se debe cambiar aqui para que PHP reconozca cual base de datos
	//Se esta utilizando
	define('BD', "asociados");

?>