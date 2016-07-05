<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>teste</title>
  </head>
  <body>
      <?php
      include '../class/Carrega.class.php';
      session_start();
      if (empty($_SESSION['id']) && empty($_SESSION['username']))
      {
          header("Location:../index.php");
      }

      $objCP = new CartaoPonto();
      $teste = $objCP->somaHoras($id_processo = 1);

      print_r($teste);  
?>
  </body>
</html>
