<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Verificando</title>
</head>
<body>
<?php

include '../class/Carrega.class.php';
session_start();
if (isset($_SESSION["username"]))
{
		 $login = $_SESSION["username"]->username;
		 $id = $_SESSION["username"]->id;
} else {
		header("Location:../index.php");
}
//var_dump($_POST)."<br />";

if (isset($_POST["cadastrar"], $_POST['num_processo'], $_POST["id_perito"], $_POST["vara_trabalho"], $_POST["nome_reclamado"],
 		$_POST["nome_reclamante"], $_POST["horas_trabalhadas"], $_POST["data_distribuicao"],
		$_POST["data_admissao"], $_POST["tipo_processo"], $_POST["quebra_semanal"], $_POST["quebra_mensal"],
		$_POST["periodo_calculado"])) {

print_r($_POST);
$objProcesso = new Processo();
$objProcesso->num_processo = $_POST["num_processo"];
$objProcesso->id_perito = $_POST["id_perito"];
$objProcesso->vara_trabalho = $_POST["vara_trabalho"];
$objProcesso->nome_reclamado = $_POST["nome_reclamado"];
$objProcesso->nome_reclamante = $_POST["nome_reclamante"];
$objProcesso->horas_trabalhadas = $_POST["horas_trabalhadas"];

$objProcesso->data_distribuicao = $_POST['data_distribuicao'];
//$objProcesso->data_prescricao = $_POST['data_prescricao'];
$objProcesso->data_admissao = $_POST['data_admissao'];
//$objProcesso->data_demissao = $_POST['data_demissao'];
if(empty($_POST["data_demissao"]) || $_POST["data_demissao"]==" " || $_POST["data_demissao"]=='')
{
echo "entrou";
	$objProcesso->data_demissao = null;
}
else {
	$objProcesso->data_demissao = $_POST["data_demissao"];
}


if(empty($_POST["data_prescricao"]) || $_POST["data_prescricao"]==" " || $_POST["data_prescricao"]=='')
{
	$objProcesso->data_prescricao = null;
}
else {
	$objProcesso->data_prescricao = $_POST["data_prescricao"];
}


$objProcesso->tipo_processo = $_POST["tipo_processo"];
$objProcesso->quebra_semanal = $_POST["quebra_semanal"];
$objProcesso->quebra_mensal = $_POST["quebra_mensal"];
$objProcesso->periodo_calculado = $_POST["periodo_calculado"];


$objProcesso->inserir();
echo "<script> alert('Cadastro Efetuado com Sucesso!'); </script>";
//header("Location:user_process.php");

	} else {
		echo "bugou!";
	}

?>
</body>
</html>
