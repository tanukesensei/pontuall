<?php
session_start();
if (isset($_POST["username"])) {
    include 'class/Carrega.class.php';
    // instanciar a classe
    $objUsuario = new Usuario();
    //buscamos os dados do post


    //chamamos o listar passando o complemento (where)

    //se retornou null, não achou, caso contrario, o login e senha estão certos.
    if ($objUsuario->login($_POST["username"], sha1($_POST["password"]))) {
        //mensagem de erro
        header("location:php/user_process.php");

    } else {

        //vai pra logado.
        header("location:php/erro_login.php");

    }


}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pontuall - Plataforma de Cartão Ponto Web</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

<?php include "php/topo.html"; ?>
    <header class="bg-calc">
        <div class="header-content">
            <div class="header-content-inner">
               <h1>Uma nova forma de apuração de horas</h1>
                <hr>
                <p>Não perca mais seu tempo aprendendo a usar coisas desnecessárias, use só o essencial para o seu trabalho!</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Saiba Mais</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Temos o que você precisa!</h2>
                    <hr class="light">
                    <p class="text-faded">Mais segurança para seus trabalhos, e tudo salvo na nuvem. Nunca mais perca seus trabalho por causa da sua máquina!</p>
                    <a href="#" class="btn btn-default btn-xl">Experimente!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">A seu Dispor</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Interface limpa</h3>
                        <p class="text-muted">Nossa interface intuitiva, fácil de utilizar.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Versatilidade</h3>
                        <p class="text-muted">Trabalhe de qualquer lugar, sempre com a mesma segurança!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Atualizado</h3>
                        <p class="text-muted">Sempre atualizado em relação as leis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Feito com Amor</h3>
                        <p class="text-muted">Por que nós gostamos de ajudar!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">

            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Comece a utilizar Agora!</h2>
                 <!-- Button trigger modal -->
                            <button class="btn btn-default btn-xl wow tada" data-toggle="modal" data-target="#myModal2">
                                Cadastro!
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                                            <h4 class="modal-title" id="myModalLabel2">Cadastro</h4>
                                        </div>
                                            <form class="form_group" action="php/user_cad.php" method="post">
                                                    <div class="modal-body">
                                                <label for="nome" class="control-label" >Nome:</label>
                                                    <input class="form-control" id="nome" type="text" name="nome" placeholder="Nome" required="required" autofocus>

                                                <label for="sobrenome" class="control-label" >Sobre Nome:</label>
                                                    <input class="form-control" id="sobrenome" type="text" name="sobrenome" placeholder="Sobrenome" required="required" autofocus>

                                                <label for="cpf" class="control-label">CPF:</label>
                                                    <input class="form-control" id="cpf" type="text" name="cpf" placeholder="CPF" maxlength="11" required="required" autofocus>

                                                <label for="email" class="control-label">E-mail:</label>
                                                    <input class="form-control" id="email" type="email" name="email" placeholder="E-mail"  required="required" autofocus>

                                                <label for="senha" class="control-label">Senha:</label>
                                                    <input class="form-control" id="senha" type="password" name="senha" placeholder="Senha" required="required" autofocus>

                                                <label for="username" class="control-label">Nome de Usuário:</label>
                                                    <input class="form-control" id="username" type="text" name="username" placeholder="Nome de Usuário" required="required" autofocus>
                                        </div>
                                                <div class="modal-footer">
                                                     <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                    <button type="reset" class="btn btn-default" >Limpar Dados</button>
                                                    <button type="submit" name="cadastrar" value="cadastrar" class="btn btn-primary">Cadastrar</button>
                                                </div>
                                            </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Experimente!</h2>
                    <hr class="primary">
                    <p>Ocorreu algum problema? Achou algo que deva ser consertado? Contate nos, contamos com seu apoio para melhor atente-los!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>(53) 84xx-xx32</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">luanvs@hotmail.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
