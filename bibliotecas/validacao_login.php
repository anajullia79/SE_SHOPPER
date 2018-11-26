<?php 
session_start();
$_SESSION['logado'] = false;

	if (isset($_POST["email_login"])) {
		//aribuição 
		$error_login 	= array();
		$email 	   		= strip_tags($_POST['email_login']);
		$senha 			= strip_tags($_POST['senha_login']);

		//validação - email e senha
		$email	= filter_input(INPUT_POST, 'email_login', FILTER_VALIDATE_EMAIL);

		if(!$email || strlen(trim($email)) == 0){ 
			$error_login[] = "E-mail não valido.";
		}elseif(!$senha|| strlen(trim($senha)) == 0) {
			$error_login[] = "Senha não valido.";
		}
		
		//comparação de valores com o bd
		require_once "banco/conexao.php";
		$verifica = mysqli_query ($conexao, "SELECT CodCliente FROM tblusuario WHERE Email = '$email' AND Senha = '$senha'");

		if (!$verifica) {
			echo "Erro: " . mysqli_error($conexao);
			die();	
		}

		$registro = mysqli_fetch_assoc($verifica);

		print_r($registro);

		if ($registro == null){
		  $error_login[] = "Usuario não cadastrado.";
		  header("Location:./login.php");
		}else{
		  $_SESSION['logado'] = true;

		  $codCliente = $registro["CodCliente"];
		  $select 	= "SELECT * FROM tblUsuario WHERE CodCliente = '$codCliente'";

          $consulta 	=  mysqli_query($conexao,$select);
          $registro = mysqli_fetch_assoc($consulta);

          $_SESSION["dados_cliente"] = $registro;
		  header("Location:index.php");
		}

		//mysqli_error($verifica);
	}
?>