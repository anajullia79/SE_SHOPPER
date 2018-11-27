<?php

function pegarTodosUsuarios() {
    $sql = "SELECT * FROM tblusuario";
    $resultado = mysqli_query(conexao(), $sql);
    $tblusuarios = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $tblusuarios[] = $linha;
    }
    return $tblusuarios;
}

function pegarUsuarioLogin($email,$senha){
    $sql = "SELECT * FROM tblusuario WHERE Email = '$email' AND Senha = '$senha'";

    $resultado = mysqli_query($cnx = conexao(), $sql);
    $tblusuario = mysqli_fetch_array($resultado);

    if (!$resultado) {
        echo "Não deu certo " . mysqli_error($cnx);
        die();
    }
    
    return $tblusuario;
}

function pegarUsuarioPorId($id) {
    $sql = "SELECT * FROM tblusuario WHERE CodCliente= '$id'";
    $resultado = mysqli_query($cnx = conexao(), $sql);

    if (!$resultado) {
        echo "Erro" . mysqli_error($cnx);
        die();
    }

    $tblusuario = mysqli_fetch_array($resultado);
    return $tblusuario;
}
// $nome, $cpf, $email, $senha, $cidade,$endereco, $sexo);
function adicionarUsuario($nome, $CPF, $email, $senha, $cidade,$endereco, $sexo){
    if ($email<>"adm@adm.com") {
        $tipoUsuario = "user";
    }else{
        $tipoUsuario = "admin";
    }

    
                                        
    $insert = "INSERT INTO tblUsuario(Nome, Email, Senha, CPF, endereco, tipoUsuario, sexo) VALUES('$nome', '$email', '$senha', '$CPF', '$endereco', '$tipoUsuario', '$sexo')";

    $resultado = mysqli_query($cnx = conexao(),$insert);
       if(!$resultado) { die('Erro ao cadastrar usuário' . mysqli_error($cnx)); }
    return 'Usuario cadastrado com sucesso!';
}
    

function editarUsuario($id,$nome, $CPF, $email, $senha, $dtNasc, $endereco, $sexo) {

    $update = "UPDATE tblusuario SET 
    Nome = '$nome',
    CPF = '$CPF',
    Email = '$email',
    Senha = '$senha',
    endereco = '$endereco',
    dtNasc = '$dtNasc'
    WHERE CodCliente = $id";

    $resultado = mysqli_query($cnx = conexao(),$update);
    if (!$resultado) {
       echo "Não deu certo " . mysqli_error($cnx);
       die();
   }
}

function deletarUsuario($id) {
    $exclusao   = "DELETE FROM tblusuario WHERE CodCliente = '$id'";
    $resultado     = mysqli_query($cnx = conexao(),$exclusao);
    
    if (!$resultado) {
     echo "Não deu certo " . mysqli_error($cnx);
     die();
 }
}
