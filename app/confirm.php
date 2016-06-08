<?php
include("includes/incl.php");
$not_obj = new Notification();

$notification = $not_obj->getForId($_GET['id']);

if(isset($_POST['accept'])){
	echo "aceptammos";
	$not_obj->product_ok($notification[0]['recept'], $notification[0]['emiter'], $notification[0]['product_offer'], $notification[0]['product_interest'], $notification[0]['quantity']);
	$not_obj->delete($notification[0]['id']);
}


if(isset($_POST['deny'])){
	$not_obj->delete($notification[0]['id']);
}

if(isset($_POST['done'])){
	header("Location: comment.php?id=".$notification[0]['id']);
}