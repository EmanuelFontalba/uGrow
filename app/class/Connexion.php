<?php
	/**
	* Conecta a la base de datos y realiza consultas sobre ella.
	* Scripts necesarios: config.php
	*/
	class Conexion 
	{
		private $_usuario="";
		private $_contrasena="";
		private $_conex;
		
		public function __construct()
		{
			$this->_usuario = USER;
			$this->_contrasena = PASS;
			$this->_conex = $this->conectaDb();
		}
		private function conectaDb()
		{
			try {
			 	$db = new PDO('mysql:host='.HOST.';
					dbname='.DATA_BASE,
					$this->_usuario,
					$this->_contrasena,
					array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
						PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				return $db;
			} catch (PDOException $e) {
				print "<p>Error: No puede conectarse con la base de datos.</p>\n";
			 exit();
			}
		}
		/**
		* $datos tiene que ser un array.
		* Si no contiene datos, pasar un array vacio.
		*/
		public function query($sql, $datos){
			$consulta = $this->_conex->prepare($sql);
			if(!$consulta->execute($datos)){
				echo "No se realizó la consulta.";
			}
			return $consulta->fetchAll();
		}
	}
?>