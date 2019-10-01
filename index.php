<!doctype html>
<html lang="pt-br">
<!--
    para acessar o projeto, habilite o Apache no XAMPP
    abra a URL http://localhost/login/ no navegador
-->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Sistema de Login</title>
    <style>
        #alerta,
        #caixaSenha,
        #caixaRegistro {
            display: none;
        }
    </style>
</head>

<body class="bg-dark">
    <!-- Fundo Escuro -->
    <main class="container mt-4">
        <section class="row">
            <div class="col-lg-4 offset-lg-4" id="alerta">
                <div class="alert alert-success text center">
                    <strong class="resultado">
                        Alo Ha Tchurmaáaaaaaaaaaaaaaaaaa!
                    </strong>
                </div>
            </div>
        </section>
        <!-- Formulário de login -->
        <section class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaLogin">
                <h2 class="text-center mt-2">
                    Entrar no Sistema
                </h2>
                <form action="#" method="post" class="p-2" id="formLogin">
                    <div class="form-group">
                        <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Nome do Usuário" class="form-control" required minlength="5">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaUsuario" id="senhaUsuario" placeholder="senha" class="form-control" required minlength="6">

                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="lembrar" id="lembrar" class="custom-control-input">
                            <label for="lembrar" class="custom-control-label">
                                lembrar de mim.
                            </label>

                            <a href="#" class="float-right" id="btnEsqueci">
                                Esqueci a senha!
                            </a>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="::Entrar::" name="btnEntrar" id="btnEntrar" class="btn btn-primary btn-block">
                    </div>

                    <div class="form-group">

                        <p class="text-center">Novo usuário? <a href="#" id="btnRegistrarNovo">
                                Registre-se aqui!
                            </a>
                        </p>

                    </div>

                </form>


            </div>

        </section>
        <!-- Final da seção  -->


        <!-- Formulário de Recuperação de Senha -->
        <section class="row mt-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaSenha">
                <h2 class="text-center mt-2">
                    Gerar Nova Senha
                </h2>
                <form action="#" method="post" id="formSenha" class="p-2">
                    <div class="form-group">
                        <small class="text-muted">
                            Para gerar uma nova senha, digite o seu e-mail. Clique no link gerado.
                        </small>

                    </div>
                    <div class="form-group">
                        <input type="email" name="emailGerarSenha" id="emailGerarSenha" class="form-control" placeholder="E-mail de recuperação de senha" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="::Gerar::" name="btnGerar" id="btnGerar" class="btn btn-primary btn-block">
                    </div>

                    <div class="form-group">
                        <p class="text-center">
                            já registrado? <a href="#" id="btnJaRegistrado">
                                Entrar por aqui
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </section>
        <!-- Fim da seção de Recuperação de senha -->

        <!-- Início do formulário de cadastro de novos usuários -->
        <section class="row mt-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaRegistro">
                <h2 class="text-center mt-2">Registra-se aqui</h2>
                <form action="#" method="post" class="p-2" id="formregistro">

                    <div class="form-group">
                        <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control" placeholder="Nome completo" required minlength="6">
                    </div>

                    <div class="form-group">
                        <input type="text" name="nomeusuário" id="nomeUsuario" class="form-control" placeholder="Nome de usuário" required minlength="5">
                    </div>

                    <div class="form-group">
                        <input type="email" name="emailUsuario" id="emailUsuario" class="form-control" placeholder="E-mail" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaDoUsuario" id="senhaDoUsuario" class="form-control" placeholder="senha" required minlength="6">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaUsuarioConfirmar" id="senhaUsuarioConfirmar" class="form-control" placeholder="Confirmar senha" required minlength="6">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="concordar" id="concordar" class="custom-control-input">
                            <label for="concordar" class="custom-control-label">
                                Eu concordo com <a href="#"> os termos e condições
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="::Registrar::" name="btnRegistrar" class="btn btn-primary btn-block">

                    </div>

                    <div class="form-group">
                        <p class="text-center">
                            Já Registrado?
                            <a href="#" id="btnRegistrado2">
                                Entrar por aqui
                        </p>
                    </div>

                </form>
        </section>
        <!-- Final do formulário de cadstro de novos usuários -->

    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script>
        //Código jQuerry para mostrar e ocultar os formulários
        $(function() {

            $("#btnEsqueci").click(function() {
                $("#caixaLogin").hide(); //ocultar
                $("#caixaSenha").show(); //Mostrar
            });

            $("#btnJaRegistrado").click(function() {
                $("#caixaSenha").hide(); //ocultar
                $("#caixaLogin").show(); //Mostrar
            })
            $("#btnRegistrarNovo").click(function() {
                $("#caixaLogin").hide(); //ocultar
                $("#caixaRegistro").show(); //Mostrar
            })

            $("#btnRegistrado2").click(function() {
                $("#caixaLogin").show();
                $("#caixaRegistro").hide();

            })
        });
    </script>
</body>

</html>