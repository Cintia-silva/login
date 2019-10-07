<?php
//Teste se existe a ação

    //Teste se ação é igual a cadastro
if( $_POST['action'] =='cadastro'){
        echo"<p>cadastro</p>";
        echo"\n<pre>"; //Pre-formatar
        print_r($_POST);
        ECHO"\n<\pre>";

}else if($_POST['action'] =='login'){
        //Senão, teste se ação é login
        echo "<p>login</p>";
        echo "\n<pre>"; //Pre-formatar
        print_r($_POST);
        echo "\n<\pre>";

}else if($_POST['action'] =='senha'){
        //Senão, teste se ação é recuperar senha
        echo "<p>senha</p>";
        echo "\n<pre>"; //Pre-formatar
        print_r($_POST);
        echo "\n<\pre>";
}
else{
        header("location:index.php");
}

}else{
    //Redirecionando para index.php, negando o acesso
    //a esse arquivo diretemente.
    header("location:index.php");
}

