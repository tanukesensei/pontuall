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

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de Processos</title>

	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
</head>
<body id="body">
    <section>
        <nav>

        </nav>
    </section>


    <section>
        <h3>Cadastro de Processos</h3>
	<article>
	    <form action="process_cad.php" method="post">
            <label for="num_processo">Número do Processo:</label>
            <input type="text" name="num_processo" class="form-control"><br />
            <input type="hidden" name="id_perito" value="<?php echo $id; ?>" >
            <label for="vara_trabalho">Vara de Trabalho:</label>
            <input type="text" name="vara_trabalho" class="form-control"><br />
            <label for="nome_reclamado">Nome do Reclamado:</label>
            <input type="text" name="nome_reclamado" class="form-control"><br />
            <label for="nome_reclamado">Nome do Reclamante:</label>
            <input type="text" name="nome_reclamante" class="form-control"><br />
            <label for="horas_trabalhadas">Horas Trabalhadas:</label>
            <input type="text" name="horas_trabalhadas" class="form-control"><br />
            <label for="data_inicial">Data Inicial:</label>
            <input type="text" name="data_inicial" class="form-control"><br />
            <label for="data_final">Data Final:</label>
            <input type="text" name="data_final" class="form-control"><br />
            <label for="data_admissao">Data de Admissão:</label>
            <input type="text" name="data_admissao" class="form-control"><br />
            <label for="tipo_processo">Tipo de Processo:</label>
            <input type="text" name="tipo_processo" class="form-control"><br />
            <label for="quebra_semanal">Quebra da Semana:</label>
            <input type="text" name="quebra_semanal" class="form-control"><br />
            <label for="quebra_mensal">Quebra do Mês:</label>
            <input type="text" name="quebra_mensal" class="form-control"><br />
            <label for="periodo_calculado">Período Calculado:</label>
            <input type="text" name="periodo_calculado" class="form-control"><br />
            <input type="submit" name="cadastrar" value="Cadastrar">
        </form>
	</article>
    </section>
</body>
</html>
