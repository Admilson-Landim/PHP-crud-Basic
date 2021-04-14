<?php  
    include 'conexao.php';  // chamar banco de dados... incluir banco de dados....

    $codigo = $_POST['codigo'];

    $excluir_produto = "delete from produto where codigo  = '$codigo'";  // inserir produto

    $inserir_query = mysqli_query($conexao, $excluir_produto); // validar a insercao

    header('location: listar_produto.php');  // voltar para pagina listar Produto
?>