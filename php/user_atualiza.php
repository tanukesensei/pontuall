<?php
ini_set('session.save_path', '../../tmp');
session_start();

include '../class/Carrega.class.php';

if (empty($_SESSION['id']) && empty($_SESSION['username']))
{
    header("Location:../index.php");
}

if (isset($_POST["atualizar"])){

  $objUsuario = new Usuario();

  if ($_POST['senha']!=null) {
    $objUsuario->id = $_POST["id"];
    $objUsuario->nome = $_POST["nome"];
    $objUsuario->sobrenome = $_POST["sobrenome"];
    $objUsuario->cpf = $_POST["cpf"];
    $objUsuario->email = $_POST["email"];
    $objUsuario->senha= sha1($_POST["senha"]);
    $objUsuario->username = $_POST["username"];
    $objUsuario->atualizar();
  }else {
    $objUsuario->id = $_POST["id"];
    $objUsuario->nome = $_POST["nome"];
    $objUsuario->sobrenome = $_POST["sobrenome"];
    $objUsuario->cpf = $_POST["cpf"];
    $objUsuario->email = $_POST["email"];
    $objUsuario->senha=$_POST["senha"];
    $objUsuario->username = $_POST["username"];
    $objUsuario->atualizar();
  }
  echo "<script> alert('Cadastro Efetuado com Sucesso!');</script>";
  header("Location:user_edit.php");
}

 ?>
