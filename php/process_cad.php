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
    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }

//var_dump($_POST);

if(isset($_POST["cadastrar"])) {

	$objProcesso                    = new Processo();
	$objProcesso->num_processo      = $_POST["num_processo"];
	$objProcesso->id_perito         = $_POST["id_perito"];
	$objProcesso->vara_trabalho     = $_POST["vara_trabalho"];
	$objProcesso->nome_reclamado    = $_POST["nome_reclamado"];
	$objProcesso->nome_reclamante   = $_POST["nome_reclamante"];
	$objProcesso->horas_trabalhadas = $_POST["horas_trabalhadas"];
	$objProcesso->data_distribuicao = $_POST['data_distribuicao'];
	$objProcesso->data_admissao     = $_POST['data_admissao'];

	if(empty($_POST["data_demissao"]) || $_POST["data_demissao"] ==" "
	|| $_POST["data_demissao"] =='') {

		$objProcesso->data_demissao = NULL;
	}
	else {
		$objProcesso->data_demissao = $_POST["data_demissao"];
	}

	if(empty($_POST["data_prescricao"]) || $_POST["data_prescricao"] ==" "
	|| $_POST["data_prescricao"]=='') {
		$objProcesso->data_prescricao = NULL;
	}
	else {
		$objProcesso->data_prescricao = $_POST["data_prescricao"];
	}

	$objProcesso->tipo_processo  = $_POST["tipo_processo"];
	$objProcesso->quebra_semanal = $_POST["quebra_semanal"];
	$objProcesso->quebra_mensal  = $_POST["quebra_mensal"];
	$objProcesso->hora_dia = $_POST["hora_dia"];
	$objProcesso->inserir();
	echo "<script> alert('Cadastro Efetuado com Sucesso!'); </script>";
	//header("Location:user_process.php");

		} else {
			echo "bugou!";
		}

?>
</body>
</html>
