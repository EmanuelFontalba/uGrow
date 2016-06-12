<?php 
/**
* 
*/
class Sowing
{
	private $_connexion;
	
	public function __construct()
	{
		$this->_connexion = new Conexion();
	}

	public function addSowing($idUser, $product, $date)
	{
		
		$this->_connexion->query(
			"INSERT INTO siembra (idUser, idProduct, date) values (:idUser, :product, :date)", 
			array(":idUser"=>$idUser, ":product"=>$product, ":date"=>$date));
	}

	private function getSowings($idUser)
	{
		return $this->_connexion->query(
			"SELECT * FROM siembra where idUser = :idUser", 
			array(":idUser" => $idUser));
	}

	public function show($idUser)
	{
		$product_obj = new Product();
		$sowings = $this->getSowings($idUser);
		foreach ($sowings as $key => $sowing) {
			$p = $product_obj->getProduct($sowing['idProduct']);
				echo "<paper-item>".$p[0]['product']."<span class='right'>Fecha prevista: ".$sowing['date']."</span></paper-item>";
		}
	}
}