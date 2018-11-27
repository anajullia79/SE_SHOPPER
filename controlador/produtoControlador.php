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
        print_r($_POST);
        die();
        $imagem_name      = $_FILES["imagemProduto"]["name"];
        $imagem_tmp       = $_FILES["imagemProduto"]["tmp_name"];
        $diretorio_imagem = uploadImagem($imagem_name, $imagem_tmp);
        $msgRetorno       = insertproduto($marca, $categoria, $preco, $qtd, $diretorio_imagem);
        redirecionar("dashboard/produto/");
    } else {
        exibir("produto/formulario");
    }
}


/** anon */
function visualizar($id) {
    $dados['produto'] = pegarprodutoPorId($id);
    exibir("produto/visualizar", $dados);
}

/** admin */
function deletar($id) {
    alert(deletarproduto($id));
    redirecionar("produto/index");
}


/** admin */
function editar($id) {
    if (ehPost()) {
        extract($_POST);
        $imagem_name   = $_FILES["imagemProduto"]["name"];
        $imagem_tmp    = $_FILES["imagemProduto"]["tmp_name"];
        $diretorio_img = uploadImagem($imagem_name, $imagem_tmp);
        updateDataProduct($id, $codCategoria, $nomeProduto, $preco, $estoque, $descricaoProduto, $diretorio_imagem);
        alert("Produto editado!");
        redirecionar("produto/index");
    } else {
        $dados['produto'] = pegarprodutoPorId($id);
        $dados['acao']    = "./produto/editar/$id";
        exibir("produto/formulario", $dados);
    }
}

