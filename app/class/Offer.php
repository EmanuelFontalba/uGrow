<?php

	/**
	* 
	*/
	class Offer 
	{
		private $_connexion;

		public function __construct()
		{
			$this->_connexion = new Conexion();
		}

		public function add($idUser, $idProduct, $quantity)
		{
			return $this->_connexion->query(ADD_OFFER, array(":idUser" => $idUser, ":idProduct" => $idProduct, ":quantity" =>$quantity));
		}

		public function show($dir, $product)
		{
			$result = $this->search($dir, $product);
			$user_obj = new User();
			$product_obj = new Product();
			$location_obj = new City();
			$result_string = "";
			foreach ($result as $key => $value) {
				$user = $user_obj->getAllUser_forId($value['idUser']);
				$p = $product_obj->getProduct($value['idProduct']);
				$location = $location_obj->get($user[0]['idCity']); 
				$result_string.='<div class="results__item">
                    <paper-card image="users/'.$user[0]['user'].'/profile.jpeg">
                        <div class="card-content">
                            <div class="results__name">'.$user[0]['name'].' '.$user[0]['lastname'].'
                                <div class="results__location">
                                    <iron-icon icon="icons:room"></iron-icon>
                                    <span>'.$location[0]['city'].'</span>
                                </div>
                            </div>
                            <div class="results__stars">
                                <iron-icon class="star" icon="star"></iron-icon>
                                <iron-icon class="star" icon="star"></iron-icon>
                                <iron-icon class="star" icon="star"></iron-icon>
                            </div>
                            <p class="results__about">'.$user[0]['description'].'</p>
                        </div>
                        <div class="card-actions">
                            <div class="results__product">'.$p[0]['product'].'</div><div class="results__amount">'.$value['quantity'].'</div>
                            <paper-button class="results__button dealButton" go="'.$value['id'].'">Me interesa!</paper-button>
                        </div>
                    </paper-card>
                    
                </div>
                <div id="'.$value['id'].'" class="popup__back" style="display:none;">
			            <div class="popup">
			                <div class="popup__header">Compartimos??</div>
			                <div class="popup__content">
			                    <div class="popup__image">
			                        <img class="popup__image--left" src="users/'.$user[0]['user'].'/profile.jpeg" alt="First user" sizing="cover"></img>
			                    </div>
			                    <div class="popup__image">
			                        <img class="popup__image--right" src="users/'.$_SESSION['user'][0]['user'].'/profile.jpeg" alt="Second user" sizing="cover"></img>
			                    </div>
			                    <form class="popup__form" method="post" action="trade.php">
			                        <div>
			                            Selecciona que ofreces:
			                            <select name="product">'.$product_obj->returnOptions('product').' </select><br>
			                            Cantidad: <input class="popup__form--second" name="quantity" type="text" value=""><br>
			                        </div>
			                        <input type="text" name="idOffer" value="'.$value['id'].'" style="display:none;">
			                        <div class="popup__buttons">
			                            <input type="submit" class="btn" name="offer" value="Trato!!">
			                            <button class="btn">Volver</button>
			                        </div>
			                    </form>
			                </div>
			            </div>
				    </div>';
				
			}
			return $result_string;
		}

		private function search($dir, $product)
		{
			$result_prod = $this->search_product($product);
			if($dir==""){
				return $result_prod;
			}
			$city_obj = new City();
			$user_obj = new User();
			$idCity = $city_obj->get_id($dir);
			if($idCity==0){
				return $result_prod;
			}
			$users = $user_obj->get_for_location($idCity);
			$result_offers = array();
			foreach ($users as $key => $user) {
				foreach ($result_prod as $key => $offer) {
					if($offer['idUser']==$user['id']){
						array_push($result_offers, $offer);
					}
				}
			}
			return $result_offers;

		}

		private function search_product($product)
		{
			$p = strtolower($product);
			$prod_obj = new Product();
			$products = $prod_obj->getAll();
			$prod_id = null;
			foreach ($products as $key => $value) {
				if(strtolower($value['product'])==$p){
					$prod_id = $value['id'];
				}
			}

			return $this->_connexion->query(GET_OFFER_IDPRODUCT, array(":idProduct" => $prod_id));
		}
	}

?>