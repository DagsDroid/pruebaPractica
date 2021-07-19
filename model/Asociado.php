<?php 
	session_start();
	require_once "Conexion.php";

	Class Asociado{

		private $idAsociado;
		private $nombreAsociado;
		private $apellidoAsociado;
		private $dui;
		private $nit;
		private $codEstadoCivil;
		private $fechaIngreso;
		private $codLocalizacion;
		private $codInfoUsuario;
		private $active;
		public $db;

	function __construct(){
		$this->db = conectar();

	}

	public function getDb(){
		return $this->db;
	}
	
    /**
     * @return mixed
     */
    public function getIdAsociado()
    {
        return $this->idAsociado;
    }

    /**
     * @param mixed $idAsociado
     *
     * @return self
     */
    public function setIdAsociado($idAsociado)
    {
        $this->idAsociado = $idAsociado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreAsociado()
    {
        return $this->nombreAsociado;
    }

    /**
     * @param mixed $nombreAsociado
     *
     * @return self
     */
    public function setNombreAsociado($nombreAsociado)
    {
        $this->nombreAsociado = $nombreAsociado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidoAsociado()
    {
        return $this->apellidoAsociado;
    }

    /**
     * @param mixed $apellidoAsociado
     *
     * @return self
     */
    public function setApellidoAsociado($apellidoAsociado)
    {
        $this->apellidoAsociado = $apellidoAsociado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDui()
    {
        return $this->dui;
    }

    /**
     * @param mixed $dui
     *
     * @return self
     */
    public function setDui($dui)
    {
        $this->dui = $dui;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * @param mixed $nit
     *
     * @return self
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodEstadoCivil()
    {
        return $this->codEstadoCivil;
    }

    /**
     * @param mixed $codEstadoCivil
     *
     * @return self
     */
    public function setCodEstadoCivil($codEstadoCivil)
    {
        $this->codEstadoCivil = $codEstadoCivil;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * @param mixed $fechaIngreso
     *
     * @return self
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodLocalizacion()
    {
        return $this->codLocalizacion;
    }

    /**
     * @param mixed $codLocalizacion
     *
     * @return self
     */
    public function setCodLocalizacion($codLocalizacion)
    {
        $this->codLocalizacion = $codLocalizacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodInfoUsuario()
    {
        return $this->codInfoUsuario;
    }

    /**
     * @param mixed $codInfoUsuario
     *
     * @return self
     */
    public function setCodInfoUsuario($codInfoUsuario)
    {
        $this->codInfoUsuario = $codInfoUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

	public function getMunicipio($id){

	    $sql = "SELECT idMunicipio as id, nombreMunicipio as nombre FROM municipio WHERE codDepartamento = $id";
		
	   	$result = $this->db->query($sql);

	    if ($result->num_rows>0) {
	    	$data = array();
            while (($fila = mysqli_fetch_array($result)) != NULL) {
                $data[$fila['id']] = $fila['nombre'];
            }
	    }else{
	         $data['0']= "No hay municipios asignados";
	    }

	    return json_encode($data, JSON_UNESCAPED_UNICODE);

	}

    public function dataDepartamento(){
    	$sql = "SELECT * FROM departamento";

    	$data = $this->db->query($sql);

    	if ($data) {
    		$info = $data;
    	}else{
    		$info = false;
    	}

    	return $info;
    }


    public function dataEstadoCivil(){
    	$sql = "SELECT * FROM estadoCivil";

    	$data = $this->db->query($sql);

    	if ($data) {
    		$info = $data;
    	}else{
    		$info = false;
    	}

    	return $info;
    }

    public function dataAsociado(){
    	$sql = "SELECT * FROM asociado a
    			INNER JOIN estadoCivil ec ON a.codEstadoCivil=ec.idEstadoCivil
    			INNER JOIN localizacion l ON a.codLocalizacion=l.idLocalizacion
    			INNER JOIN infoUsuario iu ON a.codInfoUsuario=iu.idInfoUsuario";

		$data = $this->db->query($sql);

    		if ($data->num_rows>0) {
    			$info = $data;
    		}else{
    			$info = false;
    		}

    		return $info;
    }

    public function addAsociado($direccion, $dep, $mun){
    	$locate = $this->addLocate($direccion, $dep, $mun);

    	if ($locate) {

    		$getLocate = $this->getLocate($direccion, $dep, $mun);

    		if ($getLocate!=false) {
	    		$sql = "INSERT INTO asociado(nombreAsociado,ApellidoAsociado,
						    		dui,nit,
						    		codEstadoCivil,
						    		fechaIngreso,
						    		codLocalizacion,
						    		codInfoUsuario,
						    		active) 
			    		VALUES(
			    		'".$this->nombreAsociado."',
			    		'".$this->apellidoAsociado."',
			    		'".$this->dui."',
			    		'".$this->nit."',
			    		".$this->codEstadoCivil.",
			    		NOW(),
			    		".$getLocate.",
			    		".$_SESSION['idUsuario'].",
			    		1)";

			    $res = $this->db->query($sql);

			    if ($res) {
			    	$resp['estado'] = true;

			    }else{
			    	$resp['estado'] = false;
			    	$resp['desc'] = "Error al agregar asociado: ".$this->db->error;
			    }
    		}else{
    			$resp['estado'] = false;
    			$resp['desc'] = 'Error al obtener el id de la localizacion';
    		}	

    	}else{
    		$resp['estado'] = false;
    		$resp['desc'] = 'Error al añadir la localizacion';
    	}

    	return json_encode($resp, JSON_UNESCAPED_UNICODE);
    }

    public function addLocate($direccion, $dep, $mun){
    	$sql = "INSERT INTO localizacion(direccion,codDepartamento,codMunicipio) VALUES
    			('".$direccion."',
    			".$dep.",
    			".$mun.")";

		$data = $this->db->query($sql);

		if ($data) {
			$res = true;
		}else{
			$res = false;
		}

		return $res;
    }

    public function getLocate($direccion, $dep, $mun){
    	$sql = "SELECT idLocalizacion as id FROM localizacion WHERE 
    			direccion='".$direccion."' AND codDepartamento=".$dep." AND codMunicipio=".$mun;

		$data = $this->db->query($sql);

		if ($data->num_rows>0) {
			$info = $data->fetch_assoc();
			$res = $info['id'];
		}else{
			$res = false;
		}

		return $res;
    }

    public function updateAsociado($direccion,$dep,$mun){
    	$getLocate = $this->getLocate2();

    	if ($getLocate!=false) {
    		$updateLocate = $this->updateLocate($direccion,$dep,$mun,$getLocate);

    		if ($updateLocate) {
    			$sql = "UPDATE asociado SET nombreAsociado='".$this->nombreAsociado."',
    										ApellidoAsociado='".$this->apellidoAsociado."',
    										dui='".$this->dui."',
    										nit='".$this->nit."',
    										codEstadoCivil=".$this->codEstadoCivil." 
						WHERE idAsociado=".$this->idAsociado;
				$data = $this->db->query($sql);
						
				if ($data) {
					$res['estado'] = true;
				}else{
					$res['estado'] = false;
					$res['desc'] = $this->db->error;
				}
    		}else{
    			$res['estado'] = false;
				$res['desc'] = "No se pudo modificar la localizacion";
    		}
    	}else{
    		$res['estado'] = false;
			$res['desc'] = "No se pudo obtener el id de la localizacion";
    	}

    	return json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    public function updateLocate($direccion,$dep,$mun,$id){
    	$sql = "UPDATE localizacion SET direccion='".$direccion."', 
    									codDepartamento=".$dep.", 
    									codMunicipio=".$mun." 
				WHERE idLocalizacion=".$id;

    	$data = $this->db->query($sql);

    	if ($data) {
    		$res = true;
    	}else{
    		$res = $this->db->error;
    	}

    	return $res;
    }

    public function getLocate2(){
    	$sql = "SELECT codLocalizacion FROM asociado WHERE idAsociado=".$this->idAsociado;

    	$data = $this->db->query($sql);

    	if ($data->num_rows>0) {
    		$info = $data->fetch_assoc();
    		$res = $info['codLocalizacion'];
    	}else{
    		$res = false;
    	}

    	return $res;
    }

    public function getAsociado(){
    	$sql = "SELECT * FROM asociado a
    			INNER JOIN estadoCivil ec ON a.codEstadoCivil=ec.idEstadoCivil
    			INNER JOIN localizacion l ON a.codLocalizacion=l.idLocalizacion
    			INNER JOIN infoUsuario iu ON a.codInfoUsuario=iu.idInfoUsuario
    			INNER JOIN departamento d ON l.codDepartamento= d.idDepartamento
    			INNER JOIN municipio m ON l.codMunicipio=m.idMunicipio 
    			WHERE a.idAsociado=".$this->idAsociado;
		$info = $this->db->query($sql);

		if ($info->num_rows>0) {
			$data = $info->fetch_assoc();

			$res['estado'] = true;
			$res['id'] = $data['idAsociado'];
			$res['nombre'] = $data['nombreAsociado'];
			$res['apellido'] = $data['ApellidoAsociado'];
			$res['dui'] = $data['dui'];
			$res['nit'] = $data['nit'];
			$res['estadoCivil'] = $data['codEstadoCivil'];
			$res['direccion'] = $data['direccion'];
			$res['dep'] = $data['codDepartamento'];
			$res['mun'] = $data['codMunicipio'];

			//PARA EL MOSTRAR TODO
			$res['nombreEstadoCivil'] = $data['nombreEstadoCivil'];
			$res['nombreEmpleado'] = $data['nombreEmpleado']." ".$data['apellidoEmpleado'];
			$res['nombreDepartamento'] = $data['nombreDepartamento'];
			$res['nombreMunicipio'] = $data['nombreMunicipio'];

		}else{
			$res['estado'] = false;
			$res['desc'] = "Informe: ". $this->db->error;
		}

		return json_encode($res, JSON_UNESCAPED_UNICODE);
    }


    public function bajaAsociado(){
    	$sql = "UPDATE asociado SET active=0 WHERE idAsociado=".$this->idAsociado;

    	$data = $this->db->query($sql);

    	if ($data) {
    		$res['estado'] = true;
    	}else{
    		$res['estado'] = false;
    		$res['desc'] = $this->db->query($sql);
    	}

    	return json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    public function activeAsociado(){
    	$sql = "UPDATE asociado SET active=1 WHERE idAsociado=".$this->idAsociado;

    	$data = $this->db->query($sql);

    	if ($data) {
    		$res['estado'] = true;
    	}else{
    		$res['estado'] = false;
    		$res['desc'] = $this->db->error;
    	}

    	return json_encode($res, JSON_UNESCAPED_UNICODE);
    }














}


 ?>