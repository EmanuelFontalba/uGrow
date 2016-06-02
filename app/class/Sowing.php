<?php 
/**
* 
*/
class Sowing
{
	$_connexion;
	
	function __construct()
	{
		$this->_connexion = new Connexion();
	}

	public function addSowing($idUser, $product, $date)
	{
		$product = new Product();
		$idProduct = $product->getID($product);
		$this->_connexion->query(ADD_SOWING, array(":idUser"=>$idUser, ":product"=>$idProduct, ":date"=>$date));
	}

	public function getSowings($idUser)
	{
		return $this->_connexion->query(GET_SOWINGS, array(":idUser" => $idUser));
	}
}