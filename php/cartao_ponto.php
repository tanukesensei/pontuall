<?php
    include '../class/Carrega.class.php';
    session_start();
    if (isset($_SESSION["username"]))
    {
         $login = $_SESSION["username"]->username;
    } else {
        header("Location:../index.php");
    }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cartão Ponto - Pontuall</title>

    <!-- Bootstrap Core CSS -->
     <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">

     <!-- Custom Fonts -->
     <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

     <!-- Custom CSS -->
     <link rel="stylesheet" href="css/creative.css" type="text/css">

  </head>
  <body>
<?php
  /*
  $objProcesso = new Processo();
  $complemento = "ORDER BY id";
  $lista = $objProcesso->($complemento);
*/

include 'cp_tabelas.php';

 ?>

  </body>
</html>
