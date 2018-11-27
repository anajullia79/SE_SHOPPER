<?php

require_once "bibliotecas/mysqli.php";

function insertproduto($marca, $categoria, $preco, $diretorio_imagem) {

    $insert = "INSERT INTO tblproduto(nomeProduto, DescricaoProduto, Preco, Imagem) VALUES ('$marca', '$categoria', '$preco', '$diretorio_imagem')";

    $consulta = mysqli_query($cnx = conexao(), $insert);

    if (!$consulta) {
        die('Erro ao cadastrar produto' . mysqli_error($cnx));
    }
    return 'Produto cadastrado!';
}

   
function pegarProduto($filterID) {
    $comando = "SELECT * FROM tblproduto WHERE CodProduto = $filterID";
    $query = mysqli_query($cnx = conexao(), $comando);

    if (!$query) {
        die(mysqli_error($cnx));
    }

    $produto = mysqli_fetch_assoc($query);

    return $produto;
}

function pegarTodosProdutos() { 
    $comando = "SELECT * FROM tblproduto";
    $query = mysqli_query(conexao(), $comando);
    $produtos = array();
    while ($produto = mysqli_fetch_assoc($query)) {
        $produtos[] = $produto;
    }
    return $produtos;
}  

function searchForNomeProduto($nomeProduto) {
    $comando = "SELECT * FROM tblproduto WHERE NomeProduto LIKE '%$nomeProduto%'";
    $query = mysqli_query(conexao(), $comando);
    $produtos = array();

    while ($produto = mysqli_fetch_assoc($query)) {
        $produtos[] = $produto;
    }

    return $produtos;
}

function searchForCategoria($categoriaProduto) {
    $comando = "SELECT * FROM tblproduto WHERE CodCategoria = " . $categoriaProduto;
    $query = mysqli_query($cnx = conexao(), $comando);
    $produtos = array();

    if (!$query) {
        die(mysqli_error($cnx));
    }

    while ($produto = mysqli_fetch_assoc($query)) {
        $produtos[] = $produto;
    }

    return $produtos;
}

function pegarVariosProdutosPorId($produtosCarrinho) {
    for ($i = 0; $i < count($produtosCarrinho)-1; $i++) {
        $id = $produtosCarrinho[$i]["id"];
        $comando = "SELECT * FROM tblproduto WHERE CodProduto = '$id'";
        $query = mysqli_query($cnx = conexao(), $comando);

        if (!$query) {
            die(mysqli_error($cnx));
        }

        $produto = mysqli_fetch_assoc($query);
        $produto["qtd"] = $produtosCarrinho[$i]["qtd"];
        $produtos[] = $produto;
    }
    
    if (!empty($produtos)) {
        return $produtos;
    }
}

/**
 *
  Update
 *
 * */
function updateDataproduct($CodProduto, $marca, $categoria, $preco, $diretorio_imagem) {

    $update = "UPDATE tblproduto SET categoria = '$categoria', NomeProduto = '$marca', Preco = '$preco', Imagem = '$diretorio_imagem' WHERE CodProduto = $CodProduto";

    $update = mysqli_query(conexao(), $update);

    if (!$update) {
        echo "Não deu certo " . mysqli_error(conexao());
    } else {
        header("Location: ../index.php");
    }
}

function updateEstoque($codProduto, $qtd, $estoque_atual){
    print_r($estoque_atual);
    $estoque = $estoque_atual - $qtd;

    $comando = "UPDATE tblproduto SET CodProduto = '$codProduto', Estoque = '$estoque' WHERE CodProduto = $codProduto";
    $update = mysqli_query(conexao(), $comando);

    if (!$update) {
        echo "Não deu certo " . mysqli_error(conexao());
    } else {
        header("Location: ../index.php");
    }
}

/**
 *
  Delete
 *
 * */
function deleteproduto($codProduto) {
    //$comando2 = "SELECT Imagem FROM tblproduto WHERE CodProduto = '$codProduto'";
    //$resultado = mysqli_query(conexao(), $comando2);
    //$produto = mysqli_fetch_assoc($resultado);

    $comando = "DELETE FROM tblproduto WHERE CodProduto = '$codProduto'";
    $delete = mysqli_query(conexao(), $comando);

    if (!$comando) {
        echo "Erro: " . mysqli_error(conexao());
        // }else{           
        //  $caminhoImagem = $produto["Imagem"];
        //  unlink("./" . $caminhoImagem);
        // 
    }
}

?>