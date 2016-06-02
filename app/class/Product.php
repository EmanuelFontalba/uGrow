<?php

	/**
	* 
	*/
	class Product
	{
		private $_connexion;

		public function __construct()
		{
			$this->_connexion = new Conexion();
		}

		public function getAll()
		{
			return $this->_connexion->query(ALL_PRODUCTS, array());
		}

		public function createOptions($name)
		{
			$products = $this->getAll();
			foreach ($products as $key => $product) {
				echo "<option name='".$name."' value='".$product['id']."'>".$product['product']."</option>";
			}
		}

		public function returnOptions($name)
		{
			$products = $this->getAll();
			$result = "";
			foreach ($products as $key => $product) {
				$result .= "<option name='".$name."' value='".$product['id']."'>".$product['product']."</option>";
			}
			return $result;
		}

		public function add($product_new)
		{
			$products = $this->getAll();
			foreach ($products as $key => $product) {
				if($product['product']==$product_new){
					return false;
				}
			}

			$this->_connexion->query(ADD_PRODUCT, array(":product"=>$product_new));
			return true;
		}

		public function getProduct($id){
			return $this->_connexion->query(GET_PRODUCT, array(":id"=>$id));
		}

		public function getID($name)
		{
			$product = $this->_connexion->query(GET_ID_PRODUCT, array(":product"=>$name));
			return $product['product'];
		}
	}