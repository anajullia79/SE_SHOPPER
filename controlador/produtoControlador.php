<?php
require "modelo/produtoModelo.php";
require "modelo/categoriaModelo.php";
require "servicos/uploadImagemServico.php";

/** anon */
function index() {
    $dados["produtos"] = pegarTodosprodutos();
    exibir("produto/listar", $dados);
}

/** admin */
function adicionar() {
    if (ehPost()) {
        extract($_POST);
        $imagem_name      = $_FILES["imagemProduto"]["name"];
        $imagem_tmp       = $_FILES["imagemProduto"]["tmp_name"];
        $diretorio_imagem = uploadImagem($imagem_name, $imagem_tmp);
        $msgRetorno       = insertproduto($marca, $categoria, $preco, $diretorio_imagem);
        redirecionar("produto/listar");
    } else {
        exibir("produto/formulario");
    }
}

/** anon */
function listar() {
    $dados["produto"] = pegarTodosProdutos();
    exibir("produto/listar", $dados);
}

/** anon */
function visualizar($id) {
    $dados['produto'] = pegarProduto($id);
    exibir("produto/visualizar", $dados);
}

/** admin */
function deletar($id) {
    alert(deleteproduto($id));
    redirecionar("produto/listar");
}


/** admin */
function editar($id) {
    if (ehPost()) {
        extract($_POST);
        $imagem_name   = $_FILES["imagemProduto"]["name"];
        $imagem_tmp    = $_FILES["imagemProduto"]["tmp_name"];
        $diretorio_img = uploadImagem($imagem_name, $imagem_tmp);
        updateDataProduct($id, $codCategoria, $nomeProduto, $preco, $imagemProduto);
        alert("Produto editado!");
        redirecionar("produto/listar");
    } else {
        $dados['produto'] = pegarProduto($id);
        $dados['acao']    = "./produto/editar/$id";
        exibir("produto/formulario", $dados);
    }
}

