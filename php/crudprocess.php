<?php

include '../class/Carrega.class.php';

if (isset($_POST["cadastrar"])) {

$objProcesso = new Processo();
$objProcesso->num_processo = $_POST["num_processo"];
$objProcesso->id_perito = $_POST["id_perito"];
$objProcesso->vara_trabalho = $_POST["vara_trabalho"];
$objProcesso->nome_reclamado = $_POST["nome_reclamado"];
$objProcesso->nome_reclamante = $_POST["nome_reclamante"];
$objProcesso->horas_trabalhadas = $_POST["horas_trabalhadas"];
$objProcesso->data_distribuicao = $_POST["data_distribuicao"];
$objProcesso->data_demissao = $_POST["data_demissao"];
$objProcesso->data_admissao = $_POST["data_admissao"];
$objProcesso->tipo_processo = $_POST["tipo_processo"];
$objProcesso->quebra_semanal = $_POST["quebra_semanal"];
$objProcesso->quebra_mensal = $_POST["quebra_mensal"];
$objProcesso->periodo_calculado = $_POST["periodo_calculado"];
$objProcesso->data_prescricao = $_POST["data_prescricao"];

//print_r($objProcesso);
$objProcesso->inserir();
/*echo "<script> alert('Cadastro Efetuado com Sucesso!'); </script>";
header("Location:user_process.php");

	} else {
		echo "bugou!";*/
	}








 ?>
