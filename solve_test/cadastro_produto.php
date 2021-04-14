<?php  
    include 'conexao.php';  // chamar banco de dados... incluir banco de dados....

    $designacao = $_POST[designacao];
    $preco = $_POST[preco];
    $idCategoria = $_POST[idCategoria];

    $inserir_produto = "insert into produto values ('', '$designacao', '$preco', '$idCategoria')";  // inserir produto

    $inserir_query = mysqli_query($conexao, $inserir_produto); // validar a insercao

    header('location: listar_produto.php');  // voltar para pagina listar Produto
?>