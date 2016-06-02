<?php 	
/**
* 
*/
class City 
{
	private $_connexion = "";

	public function __construct()
	{
		$this->_connexion = new Conexion();
	}

	private function getAll()
	{
		return $this->_connexion->query(ALL_CITIES,array());
	}

	public function createOptions($name)
	{
		$cities = $this->getAll();
		
		foreach ($cities as $key => $city) {
			echo "<option name='".$name."' value='".$city['id']."'>".$city['city']."</option>";
		}
		
	}

	public function get_id($dir)
	{
		$lower = strtolower($dir);
		$all = $this->getAll();
		foreach ($all as $key => $city) {
			if(strtolower($city['city'])==$lower){
				return $city['id'];
			}
		}
		return 0;
	}

	public function get($id){
		return $this->_connexion->query(GET_CITY_FOR_ID, array(":id"=>$id));
	}

}