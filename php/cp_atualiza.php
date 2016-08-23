<?php

    include '../class/Carrega.class.php';
    session_start();

    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }

    if (isset($_POST['atualizar'])) {

      $objCP = new CartaoPonto();


    }
?>
