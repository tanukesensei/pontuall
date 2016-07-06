<?php

      include '../class/Carrega.class.php';
      session_start();
      if (empty($_SESSION['id']) && empty($_SESSION['username']))
      {
          header("Location:../index.php");
      }

      $objCP = new CartaoPonto();
      $teste = $objCP->somaHoras($id_processo = 1);
      // Após receber o retorno da função, realizo a soma dos valores de horas, e às envio para CharlieTheUnicorn, que
      //as exibe mágicamente.
      echo $CharlieTheUnicorn =  $teste[1][0] - $teste[0][0];

?>
