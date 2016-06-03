<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top" style="color:red">Pontuall</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <!-- Button trigger modal -->
                        <button class="Login" data-toggle="modal" data-target="#myModal">
                            Login
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Login</h4>
                                    </div>
                                        <form action="php/user_login.php" method="post">
                                                <div class="modal-body">
                                             <label for="username">Usuário: </label>
                                                <input type="text" name="username" class="form-control" required />
                                                <br>
                                            <label for="password">Senha: </label>
                                                <input type="password" name="password" class="form-control" required />
                                            </div>
                                            <div class="modal-footer">
                                                <a  href="#contact" >Cadastre-se!</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                <button type="submit" name="entrar" value="entrar" class="btn btn-primary">Entrar</button>
                                            </div>
                                        </form>
                                    </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                </li>
                <li>
                    <a class="page-scroll" href="#about">Sobre</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Serviços</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contato</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
