<?php
    include '../class/Carrega.class.php';

    if (isset($_POST["username"]) && isset($_POST["password"])) {

      $objUsuario = new Usuario();

      if ($objUsuario->login($_POST["username"], sha1($_POST["password"]))) {
        header("location:user_process.php");
      } else{
        header("location:erro_login.php");
   }
}
 ?>
