<?php
//conexão com o banco de dados

require_once 'configBD.php';

function verificar_entrada($entrada){
    //filtrando a entrada
    $saida = htmlspecialchars($entrada);
    $saida = stripslashes($saida);
    $saida = trim($saida);
    return $saida; //retorna a saída limpa
}


//Teste se existe a ação
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'cadastro') {
        //Teste se ação é igual a cadastro
        # echo "\n<p>cadastro</p>";
        # echo "\n<pre>"; //Pre-formatar
        # print_r($_POST);
        # echo "\n<\pre>";
        //pegando dados do formulário
        $nomeCompleto= verificar_entrada($_POST['nomeCompleto']);
        $nomeDoUsuario = verificar_entrada($_POST['nomeDoUsuario']);
        $emailUsuario = verificar_entrada($_POST['emailUsuario']);
        $senhaDoUsuario = verificar_entrada($_POST['senhaDoUsuario']);
        $senhaUsuarioConfirmar = verificar_entrada($_POST['senhaUsuarioConfirmar']);

        $dataCriado = date("Y-m-d"); //data atual no formato banco de dados

        //Codificando as senhas
        $senhaCodificada = sha1($senhaDoUsuario);
        $senhaConfirmarCod = sha1($senhaUsuarioConfirmar);
        //teste de captura de dados
        // echo "<p>Nome completo: $nomeCompleto</p>";
        // echo"<p> Nome do usuário: $nomeDoUsuario<p>";
        // echo "<p>E-mail: $emailUsuario<p>";
        // echo "<p>Senha codificada: $senhaCodificada</p>";
        // echo "<p> Data de criação: $dataCriado</p>";
        if($senhaCodificada != $senhaConfirmarCod){
            echo"<p class='text-danger'>senhas não conferem.</p>";
            exit();
        }else{
            //As senhas conferem, verificar se o usuário já
            //existe no banco de dados
            $sql = $connect->prepare("SELECT nomeDoUsuario, emailUsuario
            FROM usuario WHERE nomeDoUsuario = ? OR emailUsuario = ?");
            $sql->bind_param("ss", $nomeDoUsuario, $emailUsuario);
            $sql->execute();
            $resultado =$sql->get_result();
            $linha = $resultado ->fetch_array(MYSQLI_ASSOC);
        

        //verificado a existencia do usuario no banco
        if($linha['nomeDoUsuario'] == $nomeDoUsuario){
            echo "<p class='text-danger'> Usuário Indisponível, tente outro</p>";

        }elseif($linha['emailUsuario']== $emailUsuario){
            echo"<p class='text-danger'> E-mail indisponível </p>";
        }else{
            //Usuario pode ser cadastrado no banco de dados
            $sql =$connect->prepare("INSERT into usuario (nomeDoUsuario,
            nomeCompleto,emailUsuario, senhaDoUsuario, dataCriado)
            values(?,?,?,?,?)");
            $sql->bind_param("sssss", $nomeDoUsuario, $nomeCompleto, $emailUsuario,
        $senhaCodificada, $dataCriado);
        if($sql->execute()){
            echo"<p class='text-success'>Usuário cadastrado</p>";

        }else{
            echo"<p class='text-danger'> Usuário não cadastrado</p>";
            echo"<p class='text-danger'>Algo deu errado</p>";
        }
        }
    }
    

    } else if ($_POST['action'] == 'login') {
        $nomeUsuario = verificar_entrada($_POST['nomeUsuario']);
        $senhaUsuario = verificar_entrada($_POST['senhaUsuario']);
        $senha= sha1($senhaUsuario); // senha codificada
        
        $sql = $connect ->prepare("SELECT * FROM usuario WHERE   senhaDoUsuario = ? AND
        nomeDoUsuario = ?");
        $sql->bind_param("ss", $senha, $nomeUsuario);

        $sql->execute();

        $busca= $sql->fetch();

        if($busca != null){
            echo "ok";
        }else{
            echo "<p class='text-danger'>";
            echo"Falhou a entrada no sistema. Nome de usuário ou senha invalidos";
            echo"</p>";
            exit();
        }

    } else if ($_POST['action'] == 'senha') {
        //Senão, teste se ação é recuperar senha
        echo "\n<p>senha</p>";
        echo "\n<pre>"; //Pre-formatar
        print_r($_POST);
        echo "\n<\pre>";
    } else {
        header("location:index.php");
    }
} else {
    //Redirecionando para index.php, negando o acesso
    //a esse arquivo diretamente.
    header("location:index.php");
}

