<?php 
function validaCad ($nome, $cpf, $email, $senha, $confirmacaosenha,$endereco, $sexo) {
		//atribuição 
		$errors 		= array();
		$email			= strip_tags($_POST['email']);
		$nome 			= strip_tags($_POST['nome']);
		$senha 			= strip_tags($_POST['senha']);
		// $confirmaSenha	= strip_tags($_POST['confirmacaoSenha']);
		// $data 			= strip_tags($_POST["dtNasc"]);
		$sexo 			= !empty($_POST['sexo']) ? $_POST['sexo'] : "";
		// $data 			= explode("/",$data); 
		$cpf            = strip_tags($_POST['cpf']);
		$endereco 		= strip_tags($_POST["endereco"]);
		// $data_total     = "";

			// valida nome
		if (strlen(trim($nome)) == 0) {
			$errors[] = "Insira um nome";
		}elseif(!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª' ']+$/", $nome)) {
			$errors[] = "Insira um nome válido";
		}

			// valida cpf
		if (!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf) || strlen(trim($cpf)) == 0) {
			$errors[] = "Esse cpf não é válido";
		}

			//E-mail
		$emailValido 	= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		if (!$emailValido || strlen(trim($email)) == 0) {
			$errors[] = "E-mail não valido.";
		}

			//senha
		if(strlen(trim($senha)) == 0){
			$errors[] = "Insira uma senha"; 
		} else if(strlen($senha) > 16){
			$errors[] = "Insira uma senha menor."; 
		} else if(strlen($senha) < 8){
			$errors[] = "Insira uma senha maior."; 
		} 

		    //confirmar senha
		// if($confirmaSenha == ""){
		// 	$errors[] = "Insira a confirmação da senha"; 
		// } else if(!($senha == $confirmaSenha)){
		// 	$errors[] = "Confirme a senha";
		// }

		 //valida data de nasc
		// if (count($data) == 3) {
		// 	$dia = $data[0]; 
		// 	$mes = $data[1];
		// 	$ano = $data[2];

		// 	if (strlen(trim($ano)) == 0) {
		// 		$errors[] = "Insira o ano";
		// 	} elseif ($ano >=2017 || $ano < 1917){
		// 		$errors[] = "Ano inválido.";
		// 	}
			
		// 	if (strlen(trim($mes)) == 0) {
		// 		$errors[] = "Insira o mês.";
		// 	} elseif (($mes >=12 || $mes < 1)){
		// 		$errors[] = "Mês inválido.";
		// 	} 

		// 	if (strlen(trim($dia)) == 0) {
		// 		$errors[] = "Insira o dia";
		// 	} elseif (($dia >=31 || $dia <=1)||($dia >= 28 && $mes == "fevereiro")){
		// 		$errors[] = "Dia invalido.";
		// 	} 
		// }
			//endereco
		if (strlen(trim($endereco)) == 0) {
			$errors[] = "Insira um endereco";
		}

			//Sexo
		if (strlen(trim($sexo)) == 0) {
			$errors[] = "Sexo não selecionado.";
		}

			//banco de dados
		if (empty($errors)) {
            require_once "bd/conexao.php";
            $insert = "INSERT INTO tblUsuario(Nome,cpf,Email,Senha,confirmasenha,endereco,sexo,dtNasc) ";
            $insert .= "VALUES('$nome','$cpf','$email', '$senha','$confirmaSenha', '$endereco', '$sexo', '$data_total')";
            $consulta = mysqli_query($conexao,$insert);
            if (!$consulta) {
                echo "Não deu certo " . mysqli_error($conexao);
                die();
            }else{
            	$_SESSION['logado'] = true;

            	//pegando os dados do usuario
            	$select 	= "SELECT * FROM tblUsuario";
            	$consulta 	=  mysqli_query($conexao,$select);
            	$_SESSION["dados_cliente"] = mysqli_fetch_assoc($consulta);
            	header("Location: index.php");
            }
        }
        
	}
?>