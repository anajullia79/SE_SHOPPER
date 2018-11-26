<div id="perfil">
<center>
<h1>Meu Perfil</h1>
<?php
	if ($_SESSION["auth"]["user"]["sexo"] == "Masculino"){

		echo "Seja Bem-Vindo".$_SESSION["auth"]["user"]["nome"];

	}else{

		echo "Seja Bem-Vinda ". $_SESSION["auth"]["user"]["nome"];

	}

?>

<br>
<br>
<p><b>Nome:</b> <?php echo $_SESSION["auth"]["user"]["nome"];?> <?php echo $_SESSION["auth"]["user"]["sobrenome"] ?></p>
<p><b>E-mail:</b> <?php echo $_SESSION["auth"]["user"]["email"];?></p>
<p><b>Sexo:</b> <?php echo $_SESSION["auth"]["user"]["sexo"];?></p>
<p><b>Telefone:</b> <?php echo $_SESSION["auth"]["user"]["numero"];?></p>
<p><b>CPF:</b> <?php echo $_SESSION["auth"]["user"]["cpf"];?></p>
<p><b>Nascimento:</b> <?php echo $_SESSION["auth"]["user"]["data"];?></p>
<a class="btn btn-primary" href = "./usuario/editarPerfil/<?=$_SESSION["auth"]["user"]["idUsuario"]?>">Mudar Perfil</a>
</center>
</div>

	
