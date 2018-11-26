<?php
require_once "modelo/produtoModelo.php";
require_once "./modelo/usuarioModelo.php";

       /** anon */
function index() {
    if (ehPost()) {
        $login = $_POST["email"];
        $passwd = $_POST["senha"];
         if (authLogin($login, $passwd)) {
            alert("Seja bem vindo, " . $login);
            redirecionar("produto");
        } else {
            alert("Voce digitou algo errado. Tente novamente");
        }
    }
    exibir("login/index");
}

        /** anon */
    function logout() {
        authLogout();
        alert("Voce foi deslogado com sucesso!");
        redirecionar("produto");
}

?>

