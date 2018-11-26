<?php 
require "./modelo/produtoModelo.php";
require "modelo/categoriaModelo.php";
require "servicos/uploadImagemServico.php";


/** anon */

function index () {
    //echo "to aqui bobinho";
    $dados["qualquercoisa"] = "";
    exibir("dashboard/index",$dados);

}
function produto() {
    if (ehPost()) {
        extract($_POST);
        $dados["produtos"]   = searchForCategoria($categoria);
        $dados["categorias"] = getCategorias();
    } else {
        $dados["produtos"]   = pegarTodosProdutos();
        $dados["categorias"] = pegarCategorias();
        //exibir("dashboard/produto", $dados);
    }
    exibir("dashboard/produto", $dados);
}

/** anon */
function usuario(){
 if (ehPost()) {
    extract($_POST);
    $retorno = adicionarUsuario($nome, $email, $senha, $CPF, $endereco, $dtnasc, $cidade, $sexo);
    redirecionar("dashboard/usuario");
} else {
    $dados["usuarios"] = pegarTodosUsuarios();
}
exibir("dashboard/usuario", $dados);
}

?>