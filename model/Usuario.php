<?php 
session_start();
require_once "Conexion.php";

Class Usuario{
	private $idUsuario;
	private $nombreUsuario;
	private $password;
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
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     *
     * @return self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param mixed $nombreUsuario
     *
     * @return self
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $passEncode = sha1($password);
        $this->password = $passEncode;

        return $this;
    }

    public function login(){

    	$sql = "SELECT idInfoUsuario,
                        nombreEmpleado,
    					apellidoEmpleado,
    					nombreUsuario 
				FROM infoUsuario iu
				INNER JOIN usuario u ON iu.codUsuario=u.idUsuario
				WHERE nombreUsuario='".$this->nombreUsuario."' AND password='".$this->password."'";

		$data = $this->db->query($sql);

		if ($data->num_rows>0) {
			$res = $data->fetch_assoc();

			$resp['estado'] = true;
			$_SESSION['user'] = $res['nombreUsuario'];
            $_SESSION['idUsuario'] = $res['idInfoUsuario'];
			$_SESSION['nombre'] = $res['nombreEmpleado']." ".$res['apellidoEmpleado'];
		}else{
			$resp['estado'] = false;
			$resp['s'] = $this->password;
			$resp['desc'] = "Usuario o contraseña incorrecta";
		}

		return json_encode($resp, JSON_UNESCAPED_UNICODE);
    }
}




 ?>