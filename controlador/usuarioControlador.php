<?php
require_once "modelo/usuarioModelo.php";
require "modelo/produtoModelo.php";
require_once "./bibliotecas/validacao_cadastro.php";

/** anon */
/*
function index() {
    exibir("usuario/formulario");
}*/

/** admin,user */
function index(){
    $dados["user"] = pegarUsuarioPorId($_SESSION['auth']['codCliente']);
    exibir("usuario/listar",$dados);
}

/** anon */
function adicionar() {
    if (ehPost()) {
        extract($_POST);
        $data = explode("/",$data_nascimento);
        $dia = $data[0]; 
        $mes = $data[1];
        $ano = $data[2];
        $data_nascimento = "$ano-$mes-$dia";

        $erros = validaCad($nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro,$confirmar_senha,$dia,$mes,$ano, $estado, $municipio,$endereco, $sexo,$data);

        if (empty($erros)) {
            adicionarUsuario($nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro, $data_nascimento,$municipio,$endereco, $sexo);   
            
            $user = pegarUsuarioLogin($email_cadastro,$email_cadastro);

            if (authLogin($email_cadastro, $email_cadastro)) {
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

        $erros = validaCad($nome, $CPF_cadastro, $email, $senha,$confirmaSenha,$dia,$mes,$ano, $endereco, $sexo,$data);

        if (empty($erros)) { 
            editarUsuario($id,$nome, $CPF_cadastro, $email, $senha, $dtNasc, $endereco, $sexo);
            $_SESSION["auth"]["nome"] = $nome;

            alert("Usuários editados");
            redirecionar("usuario/listar/$id");
        } else {
            alert(implode(",<br>", $erros));
            redirecionar("usuario/editar/$id");
        }
    }
}
