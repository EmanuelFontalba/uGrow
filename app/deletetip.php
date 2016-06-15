<?php 
	include("includes/incl.php");

	if(isset($_GET['id'])){
		$tip_obj = new Tip();
		$tip_obj->delete($_GET['id']);
		if($_SESSION['user'][0]['rol']=="admin"){
			header("Location:profile.php?id=".$_GET['idUser']);
		}else{
			header("Location: profile.php");
		}
		
	}