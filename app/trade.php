<?php 
include("includes/incl.php");
if(!isset($_POST['trato'])){
	header("Location: index.php");
}else{
	//work
	
	$n = new Notification();
	$offer_obj = new Offer();
	$offer = $offer_obj->get_byId($_POST['idOffer']);
	$n->trade(
		$_SESSION['user'][0]['id'],
		$offer[0]['idUser'],
		$offer[0]['idProduct'],
		$_POST['product'],
		$_POST['quantity'],
		$_POST['idOffer']
		);
}