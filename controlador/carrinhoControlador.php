<?php

require "./servicos/carrinhoServico.php";
require "./modelo/produtoModelo.php";

/** anon, user, admin */
function index() {

if(ehPost()){
    extract($_POST);
    $_SESSION["carrinho"][$index_produto]["qtd"] = $qtd;
}

if (!empty($_SESSION["carrinho"])) {
    $produtosCarrinho = $_SESSION["carrinho"];
    $dados["produtos"] = pegarVariosProdutosPorId($produtosCarrinho);    
    $valortot = 0;     
    if(!empty($dados["produtos"])){
        foreach ($dados["produtos"] as $produto) {
             $valortot += $produto["qtd"]*$produto["Preco"];
        }
    }

$_SESSION["carrinho"]["total"] = $valortot;
exibir("produto/carrinho", $dados);

}else{
    exibir("produto/carrinho");
    }

}
/** anon, admin, user */
function adicionar($id) {
    addnoCarrinho($id);
    redirecionar("produto");
}

/** anon, admin, user */
function deletar($id,$preco) {
    $total = $_SESSION["carrinho"]["total"];
    $total -= ($preco * $_SESSION["carrinho"][$id]["qtd"]);

    unset($_SESSION["carrinho"][$id]);
    $_SESSION["carrinho"]["total"] = $total;
    redirecionar("carrinho/index");
}

?>