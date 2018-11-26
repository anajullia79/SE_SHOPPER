<?php

function uploadImagem($SourceImage, $imagem_tmp) {
	$imagem				= basename($SourceImage);
	$diretorio_mover	= "./publico/images/produtos/" . $imagem;
	$diretorio   		= "./publico/images/produtos/";

	$resultado = move_uploaded_file($imagem_tmp, $diretorio_mover);
	$diretorio_imagem = $diretorio_mover;

	if(!$resultado) {
		die("Nao deu certo o upload!");
	}

	return $diretorio_imagem;
}