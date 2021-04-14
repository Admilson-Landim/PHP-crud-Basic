<?php
    $servidor = 'localhost';  // host
    $user = 'root';
    $senha = '';
    $BD = 'solve_test';  // banco de dados

    $conexao = mysqli_connect($servidor, $user, $senha, $BD);   // criar conexao

    // verificar conexão
    if($conexao){
        echo '';   // mostrar msg de conecao com sucesso... Não é necesario na codigo.... apenas pa teste
    }else{
        echo 'Erro na conexão....';  // mostrar msg erro de conexao
    }

?>