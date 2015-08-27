<!DOCTYPE html>
<?php 
	include '/class/Carrega.class.php';

	$user = new Usuario();
	$user->cadastro($_POST['nome'], $_POST['sobrenome'], $_POST['cpf'], $_POST['email'], sha1($_POST['senha']), $_POST['username']);


 if (isset($_GET['cadastrar'])): ?>
		
	<?php endif ?>