<?php

function addnoCarrinho($id) {
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = array();
    }

    $existeProduto = false;

    foreach ($_SESSION["carrinho"] as $idCarrinho => $produto) {
        if ($produto["id"] == $id) {
            $produto["qtd"]++;
            
            $_SESSION["carrinho"][$idCarrinho] = $produto; 

            $existeProduto = true;
            break;
        }
    }
    
    echo "<pre>";
    print_r($_SESSION["carrinho"]);

    if (!$existeProduto) {
        $produto2["id"] = $id;
        $produto2["qtd"] = 1;
        $_SESSION["carrinho"][] = $produto2;
    }

    if(count($_SESSION["carrinho"] == 1)){
        $_SESSION["carrinho"]["total"] = 0;
    }

}

?>