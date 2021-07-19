<?php 
	session_start();
	require_once "../model/Usuario.php";

	if(isset($_POST['key'])){
		$key = $_POST['key'];

		switch($key){
			case 'login':
				login();
			break;
		}
	}

	function login(){
		$datosLogin = $_POST['datosLogin'];
		$decodeInfo = json_decode($datosLogin);
		$objUsuario = new Usuario();

		$objUsuario->setNombreUsuario($decodeInfo[0]->value);
		$objUsuario->setPassword($decodeInfo[1]->value);
		$res = $objUsuario->login();

		echo $res;
	}
 ?>