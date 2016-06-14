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
			$comment_obj = new Comment();
			$result_string = "";
			foreach ($result as $key => $value) {
				$user = $user_obj->getAllUser_forId($value['idUser']);
				$p = $product_obj->getProduct($value['idProduct']);
				$location = $location_obj->get($user[0]['idCity']);
				$stars = $comment_obj->showStars($user[0]['id']); 
				$result_string.='<div class="results__item">
                    <paper-card image="users/'.$user[0]['user'].'/profile.jpeg">
                        <a style="text-decoration: none; color: black;" href="profile.php?id='.$user[0]['id'].'"><div class="card-content">
                            <div class="results__name">'.$user[0]['name'].' '.$user[0]['lastname'].'
                                <div class="results__location">
                                    <iron-icon icon="icons:room"></iron-icon>
                                    <span>'.$location[0]['city'].'</span>
                                </div>
                            </div>
                            <div class="results__stars">
                                '.$stars.'
                            </div>
                            <p class="results__about">'.$user[0]['description'].'</p>
                        </div></a>
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
			                            <input type="submit" class="popup__btn btn" name="trato" value="Trato!!">
										<button class="popup__btn btn" name="volveri">Volver</button>
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
			if($product == "" || $product == " "){
				return $this->_connexion->query(
					"SELECT * FROM offers", array());
			}
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

		public function get_byId($id)
		{
			return $this->_connexion->query(GET_OFFER_ID, array(":id"=>$id));
		}

		public function modify_quantity($id, $quantity)
		{
			$this->_connexion->query(
				"UPDATE offers SET quantity = :quantity where id = :id",
				array(
						":quantity" => $quantity,
						":id" => $id
					)
				);
			$new_q = $this->_connexion->query(
				"SELECT quantity FROM offers where id = :id",
				array(":id"=>$id));
			if($new_q[0]['quantity']<=0){
				$this->_connexion->query(
					"DELETE FROM offers where id = :id",
					array(":id"=>$id));
			}
		}

		public function show_forUser($idUser)
		{
			$product_obj = new Product();
			$offers = $this->_connexion->query(
				"SELECT * FROM offers where idUser = :id",
				array(
						":id" => $idUser
					)
				);
			foreach ($offers as $key => $value) {
				$p = $product_obj->getProduct($value['idProduct']);
				echo "<paper-item>".$p[0]['product']."<span class='right'>".$value['quantity']."</span></paper-item>";
			}
		}
	}

?>