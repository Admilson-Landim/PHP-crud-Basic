<?php
include 'conexao.php';  // chamar banco de dados... incluir banco de dados....

$listar_produtos = "select * from produto";  // seleciona tudo de tabela produto.....
$transform_dados = mysqli_query($conexao, $listar_produtos);  // ler o comando de sql e ver o que eu procuro... ficar legivel para html
?>

<!doctype html>
<html lang="en">

<head>
    <title>Listagem de produtos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 style="text-align:center"> Listagem de Produtos</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($receber = mysqli_fetch_array($transform_dados)) {  // ler e mostrar por enquanto há... enquanto não chegar o final
                    $codigo = $receber['codigo'];
                    $designacao = $receber['designacao'];
                    $preco = $receber['preco'];
                    $idCategoria = $receber['idCategoria'];

                    // }
                ?>
                    <tr>
                        <td scope="row"><?php echo  $codigo ?> </td>
                        <td> <?php echo  $designacao; ?> </td>
                        <td> <?php echo  $preco; ?> </td>
                        <td> <?php echo  $idCategoria; ?> </td>

                        <td>
                            <form action="excluir_produto.php" method="post">
                                <input type="hidden" name="codigo" placeholder="codigo" value="<?php echo  $codigo ?>">

                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                        <td>
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Editar </button>
                        </td>


                    </tr>
                <?php  }; // se mostrou tudo parar.... 
                ?>

                <tr>
                    <form action="cadastro_produto.php" method="post">
                        <td></td>
                        <td> <input type="text" name="designacao" placeholder="designacao"> </td>
                        <td> <input type="text" name="preco" placeholder="preco"> </td>
                        <td>
                            <label for="">Selecione categoria</label>
                            <select name="idCategoria" id="idCategoria">
                                <option value="">Selecione</option>
                                <?php
                                $idCategoriaa = "select * from categoriaproduto";
                                $resultado = mysqli_query($conexao, $idCategoriaa);

                                while ($linha_resultado = mysqli_fetch_assoc($resultado)) { ?>
                                    <option value="<?php echo  $linha_resultado['id']; ?>"><?php echo  $linha_resultado['categoria']; ?></option>
                                <?php    } ?>

                            </select>

                            <!-- <input type="text" name="idCategoria" placeholder="idCategoria"> </td> -->

                        <td> <input type="submit" value="Adicionar"> </td>
                    </form>
                </tr>


            </tbody>
        </table>



    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Editar Produto </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="editar_produto.php" method="post" enctype="multipart/form-data">
                        <input type="text" name ="designacao" value="<?php echo $designacao; ?>">
                        <input type="text" name ="preco" value="<?php echo $preco; ?>">

                                <label for="" >Selecione categoria</label>
                                <select name="idCategoria" id="idCategoria">
                                    <option value="<?php echo $idCategoria; ?>"><?php echo $idCategoria; ?></option> 
                                    <?php
                                    $idCategoriaa = "select * from categoriaproduto";
                                    $resultado = mysqli_query($conexao, $idCategoriaa);

                                    while ($linha_resultado = mysqli_fetch_assoc($resultado)) { ?>
                                        <option value="<?php echo  $linha_resultado['id']; ?>"><?php echo  $linha_resultado['id']; ?></option>
                                    <?php    } ?>

                                </select>

                                <!-- <input type="text" name="idCategoria" placeholder="idCategoria"> </td> -->

                            <input type="submit" value="Editar">
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>


<?php  ?>