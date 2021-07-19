<?php 
	session_start();
	require_once "../model/Asociado.php";

	if(isset($_POST['key'])){
		$key = $_POST['key'];

		switch($key){
			case 'addAsociado':
				addAsociado();
			break;
			case 'updateAsociado':
				updateAsociado();
			break;
			case 'getMunicipio':
				getMunicipio();
			break;
			case 'getAsociado':
				getAsociado();
			break;
			case 'bajaAsociado':
				bajaAsociado();
			break;
			case 'activeAsociado':
				activeAsociado();
			break;
		}
	}

	function getMunicipio(){
		$idMun = $_POST['esp'];

		$objInfo = new Asociado();
		$res = $objInfo->getMunicipio($idMun);
		echo $res;
	}

	function addAsociado(){
		$dataAsociado = $_POST['dataAsociado'];
		$decodeInfo = json_decode($dataAsociado);
		$objAsociado = new Asociado();

		$objAsociado->setNombreAsociado($decodeInfo[1]->value);
		$objAsociado->setApellidoAsociado($decodeInfo[2]->value);
		$objAsociado->setDui($decodeInfo[3]->value);
		$objAsociado->setNit($decodeInfo[4]->value);
		$objAsociado->setCodEstadoCivil($decodeInfo[5]->value);
		$objAsociado->setCodInfoUsuario($_SESSION['idUsuario']);

		$direccion = $decodeInfo[6]->value;
		$dep = $decodeInfo[7]->value;
		$mun = $decodeInfo[8]->value;

		$res = $objAsociado->addAsociado($direccion,$dep,$mun);

		echo $res;
	}

	function updateAsociado(){
		$dataAsociado = $_POST['dataAsociado'];
		$decodeInfo = json_decode($dataAsociado);
		$objAsociado = new Asociado();

		$objAsociado->setNombreAsociado($decodeInfo[1]->value);
		$objAsociado->setApellidoAsociado($decodeInfo[2]->value);
		$objAsociado->setDui($decodeInfo[3]->value);
		$objAsociado->setNit($decodeInfo[4]->value);
		$objAsociado->setCodEstadoCivil($decodeInfo[5]->value);
		$objAsociado->setIdAsociado($decodeInfo[0]->value);

		$direccion = $decodeInfo[6]->value;
		$dep = $decodeInfo[7]->value;
		$mun = $decodeInfo[8]->value;

		$res = $objAsociado->updateAsociado($direccion,$dep,$mun);

		echo $res;
	}

	function getAsociado(){
		$code = $_POST['code'];

		$objAsociado = new Asociado();
		$objAsociado->setIdAsociado($code);

		$res = $objAsociado->getAsociado();

		echo $res;
	}

	function bajaAsociado(){
		$code = $_POST['code'];
		$objAsociado = new Asociado();

		$objAsociado->setIdAsociado($code);
		$res = $objAsociado->bajaAsociado();

		echo $res;
	}


	function activeAsociado(){
		$code = $_POST['code'];
		$objAsociado = new Asociado();

		$objAsociado->setIdAsociado($code);
		$res = $objAsociado->activeAsociado();

		echo $res;
	}








 ?>