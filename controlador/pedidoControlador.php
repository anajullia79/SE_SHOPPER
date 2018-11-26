<?php
require "modelo/produtoModelo.php";
require_once "modelo/usuarioModelo.php";
require_once "modelo/pedidoModelo.php";

/* user,admin*/
function index(){
    if(ehPost()){
        extract($_POST);
        $desconto = pegarCupom($cupom);

        if(!empty($desconto)){
            $total_semdesc = $_SESSION["carrinho"]["total"];
            $total = $total_semdesc - ($total_semdesc * ($desconto/100));
            $_SESSION["carrinho"]["total"] = $total;
            alert("Desconto aplicado!<br>");
        }else{
            alert("Este cupom não foi encontrado!<br>"); 
        }
    }
    
    $produtosCarrinho = $_SESSION["carrinho"];
    $dados["produtos"] = pegarVariosProdutosPorId($produtosCarrinho);
    
    // dados do cliente 
    $idCliente = $_SESSION['auth']['codCliente'];
    $dados["cliente"] = pegarUsuarioPorId($idCliente);
    exibir("pedido/index",$dados);
}


/* user,admin*/
function finalizar($codCliente){
	$produtosCarrinho = $_SESSION["carrinho"];
    $dados["produtos"] = pegarVariosProdutosPorId($produtosCarrinho);
    $idCliente = $_SESSION['auth']['codCliente'];
    $dadosCliente = pegarUsuarioPorId($idCliente);
    $idPedido = inserirPedido($idCliente, $dadosCliente['CPF'],$dadosCliente['Cidade'],$dadosCliente['endereco'],$data_pedido,$_SESSION["carrinho"]["total"]);
    foreach ($dados["produtos"] as $produto) {
        inserirProdutosPedidoId($idPedido,$produto["CodProduto"],$produto["quantidade"]);
        updateEstoque($produto["CodProduto"], $produto["quantidade"], $produto["Estoque"]);
    }

    unset($_SESSION["carrinho"]);
    redirecionar("produto/index");
}

function listar(){
    $idCliente = $_SESSION['auth']['codCliente'];
    if($pedidos = pegartodosPedidos($idCliente)){
        $dados["pedidos"] = $pedidos;
    }else{
        $dados["pedidos"] = "";
    }
    exibir("pedido/listar", $dados);
}
?>