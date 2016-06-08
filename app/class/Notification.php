<?php

/**
* 
*/
class Notification
{
	private $_connexion;
	
	function __construct()
	{
		$this->_connexion = new Conexion();
	}

	private function create($e, $r, $pr_interest, $pr_offer, $quantity, $type)
	{
		return $this->_connexion->query(
			"INSERT INTO notifications(emiter, recept, product_interest, product_offer, quantity, type) VALUES (:e, :r, :product_interest, :product_offer, :quantity, :type)",
			array(
				":e"=>$e,
				":r"=>$r,
				":product_interest" => $pr_interest,
				":product_offer" => $pr_offer,
				":quantity" => $quantity,
				":type" => $type
			));
	}

	public function trade($e, $r, $pr_interest, $pr_offer, $quantity)
	{
		$type = "trade";
		$this->create($e, $r, $pr_interest, $pr_offer, $quantity, $type);
		header("Location: index.php");
		return null;
	}

	public function product_ok($e, $r, $pr_interest, $pr_offer, $quantity)
	{
		$type = "ok";
		$this->create($e, $r, $pr_interest, $pr_offer, $quantity, $type);
		//header("Location: comment.php?id=$e");
		return null;
	}

	public function accept($id)
	{
		$notification = $this->_connexion->query(
				"SELECT * FROM notifications WHERE id = :id",
				array(":id" => $id)
			);
		$this->product_ok(
			$notification[0]['recept'], 
			$notification[0]['emiter'], 
			$notification[0]['product_interest'], 
			$notification[0]['product_offer'], 
			$notification[0]['quantity']
			);
		$this->delete($id);
		return null; 
	}

	public function delete($id)
	{
		return $this->_connexion->query(
			"DELETE FROM notifications where id = :id",
			array(":id"=>$id)
			);
	}

	public function show($id_user)
	{
		$notifications = $this->_connexion->query(
				"SELECT * FROM notifications WHERE recept = :id",
				array(":id" => $id_user)
			);
		foreach ($notifications as $key => $value) {
			if($value['type']=='trade'){
				$this->show_trade($value);
			}else{
				$this->show_ok($value);
			}
		}

	}

	private function show_trade($array)
	{
		$user_obj = new User();
		$pr_obj = new Product();
		$user = $user_obj->getAllUser_forId($array['emiter']);
		$name_em = $user[0]['name'];
		$pr_offer = $pr_obj->getProduct($array['product_offer'])[0]['product'];
		$pr_interest = $pr_obj->getProduct($array['product_interest'])[0]['product'];
		echo'
		<li class="card-notifications__row">
                                <div class="card-notifications__row--left">
                                    <p>"El usuario '.$name_em.' quiere intercambiar contigo sus '.$array['quantity'].' kilos de '.$pr_offer.'
                                        por tus '.$pr_interest.'"</p>
                                </div>
                                <div class="card-notifications__row--right">
                                <form method="post" action="confirm.php?id='.$array['id'].'" id="accept-form">
                                    <div class="accept-button">
                                        
                                            <div class="ripple-con">
                                                <input id="accept" class="btn" type="submit" name="accept" value="Aceptar">
                                                <span class="ripple"></span>
                                            </div>
                                        
                                    </div>
                                    <div class="deny-button">
                                        
                                            <div class="ripple-con">
                                                <input id="deny" class="btn" type="submit" name="deny" value="Rechazar">
                                                <span class="ripple"></span>
                                            </div>
                                        
                                    </div>
                                </form>
                                </div>
                            </li>
		';
	}

	public function show_ok($array)
	{
		$user_obj = new User();
		$pr_obj = new Product();
		$user = $user_obj->getAllUser_forId($array['emiter']);
		$name_em = $user[0]['name'];
		$pr_offer = $pr_obj->getProduct($array['product_offer'])[0]['product'];
		$pr_interest = $pr_obj->getProduct($array['product_interest'])[0]['product'];
		echo '
							<li>
                                <div class="card-notifications__row--left">
                                	<p>"El usuario '.$name_em.' acepta intercambiar contigo sus '.$array['quantity'].' kilos de '.$pr_offer.'
                                        por tus '.$pr_interest.'"</p>
                                </div>
                                <div class="card-notifications__row--right">
                                    <div class="done-button">
                                        <form method="post" action="confirm.php?id='.$array['id'].'" id="done-form">
                                            <div class="ripple-con">
                                                <input id="done" class="btn" type="submit" name="done" value="Intercambio realizado">
                                                <span class="ripple"></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
		';
	}

	public function getForUser($id_user)
	{
		return $this->_connexion->query(
			"SELECT * FROM notifications where recept = :recept",
			array(":recept"=>$id_user)
			);
	}

	public function getForId($id)
	{
		return $this->_connexion->query(
			"SELECT * FROM notifications where id = :id",
			array(":id"=>$id)
			);
	}

	public function show_count($id_user)
	{
		$notifications = $this->getForUser($id_user);
		echo count($notifications);
	}
}