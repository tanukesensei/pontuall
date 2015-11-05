<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Verificando</title>
</head>
<body>
<?php 

	include '../class/Carrega.class.php';

if (isset($_POST["cadastrar"], $_POST["nome"], $_POST["sobrenome"], $_POST["cpf"], $_POST["email"], $_POST["senha"], $_POST["username"])){

$objUsuario = new Usuario();
$objUsuario->nome = $_POST["nome"];
$objUsuario->sobrenome = $_POST["sobrenome"];
$objUsuario->cpf = $_POST["cpf"];
$objUsuario->email = $_POST["email"];
$objUsuario->senha= sha1($_POST["senha"]);
$objUsuario->username = $_POST["username"];
$objUsuario->inserir();

echo "<script> alert('Cadastro Efetuado com Sucesso!');</script>";

header("Location:user_process.php");
 	} 

 ?>		
</body>
</html>