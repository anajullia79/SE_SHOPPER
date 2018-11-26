
<?php
require_once "./servicos/ConReadConf.php";
function conexao() {
	$dadosCon = rootAcess();
    $con = mysqli_connect($dadosCon[0],"root","",$dadosCon[3]);
    if (!$con) die('Deu errado a conexao!');

    mysqli_set_charset($con,"utf8");
    return $con;
}