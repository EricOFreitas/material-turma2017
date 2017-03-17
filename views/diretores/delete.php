<?php
include_once 'class/categorias.php';
$crud = new crud($DB_con);

if(isset($_GET['id']))
{
	$crud->delete($_GET['id']);
	header("Location: ?p=views/categorias/list.php");	
}

?>
