<?php
	include("../config/config.php");
	include("../config/query.php");
	include("../class/Connexion.php");
	include("../class/Product.php");
	include("../class/Offer.php");
	$p = new Product();
	$p->optionsAjax("busquedaAjax", $_GET['busqueda']);