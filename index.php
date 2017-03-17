<?php
include_once 'views/home/header.php'; 
	
	if(isset($_GET['p']))
		include_once($_GET['p']);
	else
		include_once("views/home/home.php");
	
include_once 'views/home/footer.php';
?>