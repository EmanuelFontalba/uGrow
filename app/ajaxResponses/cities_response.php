<?php
	include("../config/config.php");
	include("../config/query.php");
	include("../class/Connexion.php");
	include("../class/City.php");
	include("../class/Offer.php");
	$city = new City();
	$city->optionsAjax("busquedaAjax", $_GET['busqueda']);