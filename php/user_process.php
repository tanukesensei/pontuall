<?php

    include '../class/Carrega.class.php';
    session_start();
    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pontuall</title>


	 <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/creative.css" type="text/css">
</head>



<body id="calc">
	 <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Pontuall</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="novo" href="process_new.php">Novo Processo <?php $novo; ?> </a>
                    </li>
                    <li>
                        <a class="editar" href="user_edit.php">Usuário: <?php echo $_SESSION['username']; ?> </a>
                    </li>
                    <li>
                        <a class="sair" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<div class="exibe_processo">

</div>
    <header>
        <div class="header-content">
            <div class="header-content-inner">
              <?php
                  $objProcesso = new Processo();
                  $complemento = "ORDER BY id DESC";
                  $lista = $objProcesso->listar($complemento);
                  $linhas = "";

                  if ($lista != null) {
                      foreach ($lista as $processo) {
                        $exibeProcesso = $linhas."<strong><a href='cartao_ponto.php?id=".$processo->id."'>".$processo->nome_reclamante." Contra ".$processo->nome_reclamado.", ".$processo->num_processo."</strong><br />";
                        echo $exibeProcesso ;
                      }
                  }
               ?>
            </div>
        </div>
    </header>

</body>
</html>
