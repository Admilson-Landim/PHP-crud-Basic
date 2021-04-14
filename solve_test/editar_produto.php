<?php  
    include 'conexao.php';  // chamar banco de dados... incluir banco de dados....

    $codigo = $_POST['codigo'];
    $designacao = $_POST['designacao'];
    $preco = $_POST['preco'];
    $idCategoria = $_POST['idCategoria'];

    $editar_produto = " Update produto 
    set designacao = '$designacao', preco = '$preco', idCategoria = '$idCategoria'
    where codigo = '$codigo'";  // atualizar produto

    $editar_query = mysqli_query($conexao, $editar_produto); // validar 

    header('location: listar_produto.php');  // voltar para pagina listar Produto
?>