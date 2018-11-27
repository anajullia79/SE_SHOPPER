<?php
require_once "modelo/usuarioModelo.php";
require "modelo/produtoModelo.php";
require_once "./bibliotecas/validacao_cadastro.php";


/** admin,user */
function index(){
    $dados["user"] = pegarUsuarioPorId($_SESSION['auth']['codCliente']);
    exibir("usuario/listar",$dados);
}

/** anon */
function adicionar() {
    if (ehPost()) {
        extract($_POST);
        $data = explode("/",$dtNasc);
        $dia = $data[0]; 
        $mes = $data[1];
        $ano = $data[2];
        $dtNasc = "$ano-$mes-$dia";

        $erros = validaCad($nome, $cpf, $email, $senha, $confirmaSenha,$dia,$mes,$ano, $estado, $cidade,$endereco, $sexo, $data);
        if (empty($erros)) {
            adicionarUsuario($nome, $cpf, $email, $senha, $dtNasc,$cidade,$endereco, $sexo);   
            
            $user = pegarUsuarioLogin($email,$email);

            if (authLogin($email, $email)) {
                alert("Seja bem vindo" . $nome);
                redirecionar("produto/index");
            }

            redirecionar("produto/index");
        }else{
            alert(implode(",<br>", $erros));
            redirecionar("usuario/formulario    ");
        }
    } else {
        exibir("usuario/formulario");
    }
}

/** user, admin */
function editar($id) {
    if (ehPost()) {
        extract($_POST);
        $data = explode("/",$dtNasc);
        $dia = $data[0]; 
        $mes = $data[1];
        $ano = $data[2];
        $dtnasc = "$ano-$mes-$dia";

        $erros = validaCad($nome, $CPF, $email, $senha,$confirmaSenha,$dia,$mes,$ano, $endereco, $sexo,$data);

        if (empty($erros)) { 
            editarUsuario($id,$nome, $CPF, $email, $senha, $dtNasc, $endereco, $sexo);
            $_SESSION["auth"]["nome"] = $nome;

            alert("Usuários editados");
            redirecionar("usuario/listar/$id");
        } else {
            alert(implode(",<br>", $erros));
            redirecionar("usuario/editar/$id");
        }
    }
}
