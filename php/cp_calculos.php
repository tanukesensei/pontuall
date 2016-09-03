<?php
      ini_set('session.save_path', '../../tmp');
      session_start();
      include '../class/Carrega.class.php';

      if (empty($_SESSION['id']) && empty($_SESSION['username']))
      {
          header("Location:../index.php");
      }
//pegando ID do processo por GET pra fazer as referencias.
      $_SESSION['id_processo'] = $_GET['id'];
      $id_processo = $_SESSION['id_processo'];

      $objCP = new CartaoPonto();
      $objProcesso = new Processo();

      $complemento = "WHERE id = $id_processo";
      $lista = $objProcesso->listar($complemento);
      $linhas = "";

      if ($lista !=null) {
        foreach ($lista as $item) {
          $exibeItem = $linhas."Reclamante: ".$item->nome_reclamante."<br />Reclamado: ".$item->nome_reclamado."<br />Numero do processo: ".$item->num_processo;
          echo $exibeItem."<br />";
        }
      }


      $horasSomadas = "Total de horas Trabalhadas: ".$objCP->somaHoras($id_processo);
      echo $horasSomadas;





?>
