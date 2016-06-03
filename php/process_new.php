<?php

    include '../class/Carrega.class.php';
    session_start();
    $id_perito = $_SESSION['id'];
    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de Processos</title>

	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/creative.css" type="text/css">
</head>
<body id="body">
    <?php include "topo.php"; ?>

    <section>
        <h3>Cadastro de Processos</h3>
	<article>
	    <form action="process_cad.php" method="post">
        <div class="col-lg-6">


            <label for="num_processo">Número do Processo:</label>
            <input type="text" name="num_processo" class="form-control" required="required"><br />

            <input type="hidden" name="id_perito" value="<?php echo $id_perito; ?>" >

            <label for="vara_trabalho">Vara de Trabalho:</label>
            <input type="text" name="vara_trabalho" class="form-control" required="required"><br />

            <label for="nome_reclamado">Nome do Reclamado:</label>
            <input type="text" name="nome_reclamado" class="form-control" required="required"><br />

            <label for="nome_reclamante">Nome do Reclamante:</label>
            <input type="text" name="nome_reclamante" class="form-control" required="required"><br />

            <label for="horas_trabalhadas">Horas Trabalhadas:</label>
            <input type="text" name="horas_trabalhadas" class="form-control"><br />

            <label for="data_distribuicao">Data da Distribuição:</label>
            <input type="text" id="date" name="data_distribuicao" class="form-control"><br />

            <label for="data_prescricao">Data da Prescrição: (pode ser em branco)</label>
            <input type="text" id="date2" name="data_prescricao" class="form-control"><br />

            <label for="data_admissao">Data de Admissão:</label>
            <input type="text" id="date3" name="data_admissao" class="form-control"><br />

            <label for="data_demissao">Data de Demissão: (pode ser em branco)</label>
            <input type="text" id="date4" name="data_demissao" class="form-control"><br />

            <label for="tipo_processo">Tipo de Processo:</label>
            <input type="text" name="tipo_processo" class="form-control" required="required"><br />

            <label for="quebra_semanal">Quebra da Semana:</label>
            <input type="text" name="quebra_semanal" class="form-control" required="required"><br />

            <label for="quebra_mensal">Quebra do Mês:</label>
            <input type="number" name="quebra_mensal" class="form-control" required="required"><br />


            <input type="submit" name="cadastrar" value="Cadastrar">

            <button type="button" name="button" value="Voltar"><a href="user_process.php">Voltar</a></button>
        </form>
        </div>
	</article>
    </section>
</body>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.easing.min.js"></script>
<script src="../js/jquery.fittext.js"></script>
<script src="../js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/creative.js"></script>

<script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(function($){
     $("#date").mask("99/99/9999",{placeholder:"dd/mm/aaaa  "});
     $("#date2").mask("99/99/9999",{placeholder:"dd/mm/aaaa  "});
     $("#date3").mask("99/99/9999",{placeholder:"dd/mm/aaaa  "});
     $("#date4").mask("99/99/9999",{placeholder:"dd/mm/aaaa  "});
  });
</script>
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->

</html>
