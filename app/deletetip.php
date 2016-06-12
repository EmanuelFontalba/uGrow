<?php 
	include("includes/incl.php");

	if(isset($_GET['id'])){
		$tip_obj = new Tip();
		$tip_obj->delete($_GET['id']);
		header("Location: profile.php");
	}