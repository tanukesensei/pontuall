<?php

    include '../class/Carrega.class.php';
    session_start();
    if (empty($_SESSION['id']) && empty($_SESSION['username']))
    {
        header("Location:../index.php");
    }
?>

<?php
    $objUsuario = new Usuario();
    $lista = $objUsuario->editar($_SESSION["id"]);

    if($objUsuario !=null) {

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset ="utf-8">
    <title>Atualização de Cadastro - Pontuall</title>
  </head>
  <body>
    <form class="form_group" action="php/user_cad.php" method="post">
      <div class="modal-body">
        <label for="nome" class="control-label" >Nome:</label>
            <input class="form-control" id="nome" type="text" name="nome" placeholder="Nome" value="<?php echo $lista->nome; ?>" required="required" autofocus>

        <label for="sobrenome" class="control-label" >Sobre Nome:</label>
            <input class="form-control" id="sobrenome" type="text" name="sobrenome" placeholder="Sobrenome" value="<?php echo $lista->sobrenome; ?>" required="required" autofocus>

        <label for="cpf" class="control-label">CPF:</label>
            <input class="form-control" id="cpf" type="text" name="cpf" placeholder="CPF" maxlength="11" value="<?php echo $lista->cpf; ?>" required="required" autofocus>

        <label for="email" class="control-label">E-mail:</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="E-mail" value="<?php echo $lista->email; ?>"  required="required" autofocus>

        <label for="senha" class="control-label">Senha:</label>
            <input class="form-control" id="senha" type="password" name="senha" placeholder="Senha" required="required" autofocus>

        <label for="username" class="control-label">Nome de Usuário:</label>
            <input class="form-control" id="username" type="text" name="username" value="<?php echo $lista->username; ?>" placeholder="Nome de Usuário" required="required" autofocus>
          </div>

        <div class="modal-footer">
            <button type="reset" class="btn btn-default" >Limpar Dados</button>
            <button type="submit" name="atualizar" value="atualizar" class="btn btn-primary">Atualizar Dados</button>
        </div>
    </form>
  </body>
</html>
<?php

}

?>
