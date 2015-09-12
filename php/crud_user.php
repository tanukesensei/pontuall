<?php 

	include '../class/Carrega.class.php';

 if (isset($_POST['cadastrar'])){
 	$user = new Usuario();
	$user->cadastro($_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['email'], sha1($_POST['senha']), $_POST['username']);
 } 

 ?>
		
	<!DOCTYPE html>
	<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title>Verificando</title>
	</head>
	<body>
		
	</body>
	</html>