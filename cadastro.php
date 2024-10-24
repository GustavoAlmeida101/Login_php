<?php

require_once 'conec.php';

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password'])) {

    $_nome = $_POST['nome'];
    $_email = $_POST['email'];
    $_senha = $_POST['password'];

    $_conn = $_conec;

    if (!$_conn) {
        echo "Não foi possivel conectar-se ao banco de dados...";
    }

    $_query = "INSERT INTO usuarios (nome,email,senha)  values ('$_nome','$_email','$_senha')";

    $_result = pg_query($_conn, $_query);

    if ($_result) {
        echo "Cadastrado com sucesso!";
        header('location:/login.html');
        exit();
    } else {
        echo "Erro ao inserir dados";
    }

    pg_close($_conn);
}
else{
 echo "Por Favor ,Prencha os campos nome , email e senha.";
}
