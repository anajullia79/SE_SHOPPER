
<?php
	function rootAcess(){
		$linha = array();
		$arq = fopen("./servicos/confCon.txt", "r");
		while (!feof($arq)) {
			$linha[] = trim(fgets($arq));
		}
		return $linha;
	}

?>