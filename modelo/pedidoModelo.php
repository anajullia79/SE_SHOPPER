<?php 
require_once "bibliotecas/mysqli.php";

function inserirPedido ($codCliente, $CPF,$cidade,$endereco,$dtpedido,$valorTotal){

	$comando = "INSERT INTO tblpedido(CodCliente,CPF,cidade,endereco,dtPedido,ValorTotal) VALUES ('$codCliente', '$CPF','$cidade','$endereco','$dtpedido','$valorTotal')";

	$query = mysqli_query($cnx = conexao(), $comando);
	$id = mysqli_insert_id($cnx);

	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}
	return $id;
}

function inserirProdutosPedidoId($codPedido,$codProduto,$qtd){
	$comando = "INSERT INTO tblProdutoPedido(CodPedido,CodProduto,qtd) VALUES ('$codPedido','$codProduto','$qtd')";

	$query = mysqli_query($cnx = conexao(), $comando);
	$id = mysqli_insert_id($cnx);

	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}
}

function pegartodosPedidos($id){
	$comando = "SELECT * FROM tblpedido WHERE CodCliente = '$id'";
	$query = mysqli_query($cnx = conexao(), $comando);
	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}

	while ($row = mysqli_fetch_assoc($query)){
		$produtos["produto"] = pegarProdutosPedidosPorId($row['CodPedido']);
		$pedidos[] = array_merge_recursive($row, $produtos);
	}

	if(!empty($pedidos)){
		return $pedidos;
	}else{
		return "";
	}
}

function pegarPedidoPorIntervaloData($dtInicio,$dtFim){
	$comando = "SELECT * FROM tblpedido WHERE dtPedido BETWEEN ('$dtInicio') AND ('$dtFim');";
	$query = mysqli_query($cnx = conexao(), $comando);

	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}

	while ($row = mysqli_fetch_assoc($query)){
		$pedidos[] = $row;
	}

	if (!empty($pedidos)) {
		return $pedidos;
	}else{
		return "";
	}
}

function pegarCupom($cupom){
	$comando = "SELECT PorcentagemDesconto FROM tblcupom WHERE DescCupom = '$cupom'";
	$query = mysqli_query($cnx = conexao(),$comando);

	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}

	$desconto = mysqli_fetch_assoc($query);

	return $desconto["PorcentagemDesconto"];
}