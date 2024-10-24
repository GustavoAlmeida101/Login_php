<?php

require_once 'conec.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

    $_email = $_POST['email'];
    $_senha = $_POST['password'];


    $_conn = $_conec;

    if(!$_conn)
  {
        echo "Não foi possivel conectar-se ao banco de dados...";
    exit();
   }



    $_consulta = "SELECT * from usuarios 
    where email = '$_email' and senha = '$_senha'";

    $_resultado = pg_query($_conn, $_consulta);

    if($_resultado){

    if (pg_num_rows($_resultado) > 0) {
        echo "login efetuado com sucesso!";
    } else {
        echo "email ou senha incorretos!";
    }
  }  else{
    echo "erro ao fazer a consulta";
}

   pg_close($_conn);

}
else{
  echo "Por favor, preencha os campos de email e senha.";

}
