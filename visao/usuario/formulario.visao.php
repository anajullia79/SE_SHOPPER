<?php

 $_SESSION["erro"] = false;

 if(!empty($erro)){

  foreach ($erro as $erros){

  alert($erros);
  echo $_SESSION["erro"][9];

 }
}

?>
<center>
    <br>
<h2><b>Formulário de cadastro</b></h2>
<br>

<form action="<?=@$acao?>" method="POST">
    Nome: <input type="text" name="nome" value="<?=@$usuario['nome']?>"><br><br>
    Sobrenome: <input type="text" name="sobrenome" value="<?=@$usuario['sobrenome']?>"><br><br>
    E-mail: <input type="text" name="email" value="<?=@$usuario['email']?>"><br><br>
      Sexo:  <select name="sexo">
        <option value="m" <?=@assinalarCampo($usuario['sexo'], 'm')?>>Masculino</option>
        <option value="f" <?=@assinalarCampo($usuario['sexo'], 'f')?>>Feminino</option>
    </select><br><br>

    Senha: <input type="password" name="senha" value="<?=@$usuario['senha']?>"><br><br>
    Confirmar Senha: <input type="password" name="csenha" value="<?=@$usuario['csenha']?>"><br><br>
    Telefone: <input type="text" name="numero" value="<?=@$usuario['numero']?>"><br><br>
    CPF: <input type="text" name="cpf" value="<?=@$usuario['cpf']?>"><br><br>


    <button class="btn btn-primary"type="submit">Cadastrar</button><br>
</form>
</center>



<!-- <!p>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">

<html lang="en"><head>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<!-- Formulário para cadastrar -->


