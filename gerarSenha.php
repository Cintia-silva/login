<?php
  if(isset($_GET['token'])&& isset($_GET['email'])){

      require_once 'configBD.php';

      $email = $_GET['email'];
      $token = $_GET['token'];
      //$msg= "$email: $token";
      // Só teste no método Get
      //gerarSenha.php?token=1234567890&email=cintiasuelemgta@hotmail.com

      $sql = $connect->prepare("SELECT * FROM usuario WHERE
      emailUsuario=? AND token=? AND tempoDeVida > NOW()");
      $sql->bind_param("ss", $email, $token);
      $sql->execute();

      $resultado = $sql->get_result();
      if($resultado->num_rows > 0){

        if(isset($_POST['gerar'])){
          $nova_senha = $_POST['senha'];
          $confirmar_senha = $_POST['csenha'];
          if($nova_senha == $confirmar_senha){
              $sql = $connect->prepare("UPDATE usuario SET senhaDoUsuario=?,
              token='' WHERE emailUsuario=?");
              $sql->bind_param("ss",$nova_senha,$email);
              $sql->execute();
              $msg= "senha alterada com sucesso";

          }else{
            $msg= "senhas não conferem.";
          }
        }

      }else{
        header("location: index.php");
        exit();
      }
  }else{
    //Kicando para o index
    header("location: index.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Página de Criação de Nova senha</title>
  </head>
  <body>

    <main class= "container">
    <section class="row justify-content-center">
      <div class="col-lg-5 mt-5">
    <h3 class="text-center bg-dark text-light p-2 rouded">
      Digite a sua nova senha
    <h4 class="text-success text-center ">
      <?= @$msg ?>
    </h4>

      <form action="" method="post">
        <div class="form-group">
          <label for="senha">Nova Senha</label>
          <input type="password" name="senha" id="senha" class="form-control"
          placeholder="Nova Senha" required>
        </div>

        <div class="form-group">
          <label for="csenha">Confirmar a Nova senha</label>
          <input type="password" name="csenha" id="csenha" class="form-control"
          placeholder=" Confirmar Nova Senha" required>
        </div>

        <div class="form-group">
        <input type="submit" value="Criar a nova senha"
        name="gerar" class="btn btn-block btn-primary">
        </div>


      </form>

    
    </h3>
    
      </div>
    </section>
    </main>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>