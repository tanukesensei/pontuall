<?php 
	include '../class/Carrega.class.php';

	$user = new Usuario();
	$ret = $user->listar("where username ='banana' ");
	var_dump($ret);
	
 ?>