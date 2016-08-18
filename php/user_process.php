<?php

    include '../class/Carrega.class.php';
    session_start();
    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    $id_perito = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pontuall</title>
    <!-- Bootstrap Core CSS -->
    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../admin/css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>



<body>
     <div id="wrapper">
       <?php include "../admin/top_menu.php"; ?>
       <div id="page-wrapper">
         <div class="container-fluid">
          <div class="header-content">
              <div class="header-content-inner">
                <div class="exibe_processo">
                <?php
                    $objProcesso = new Processo();
                    $complemento = "WHERE id_expert = $id_perito ORDER BY id DESC";
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
        </div>
       </div>
     </div>
   </div>
   <footer>

   </footer>
     <!-- jQuery -->
    <script src="../admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../admin/js/bootstrap.min.js"></script>



</body>
</html>
