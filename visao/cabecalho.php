<!-- cabeçalho -->		
<div class="header-middle">
	<div class="container">
		<div class="row">
			<div class="col-md-4 clearfix">
				<div class="logo pull-left">
					<a href="index.html"><img src="./publico/images/home/logo.png" alt="" /></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-3" style="float: right;">
	<form class="navbar-form navbar-left" action="index.php" method="get" >
		<div class="search_box pull-right">
			<input type="text" placeholder="Procura algo em especial?"/>
		</div>
	<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
	</form>
</div>

<div class="header-bottom">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="mainmenu pull-left">
					<ul class="nav navbar-nav collapse navbar-collapse">
						<li><a href="">Home</a></li>
						<li><a href="./produto/index">Produtos</a></li>
						<?php if(isset($_SESSION["auth"]["role"]) == "admin") { ?>
							<li><a href="./dashboard/">Dashboard</a></li>
	   						<li><a href="./login/logout">Logout</a></li>
			 			<?php } else { if (!isset($_SESSION["logado"])) { ?>
							<li><a href="./usuario/adicionar" class="active">Cadastre-se</a>
							<li><a href="./login/" class="active">Entrar</a>
						<?php } else { ?>			
						<ul role="menu" class="sub-menu">
						<li><a href="<?php echo "./usuario/" . $_SESSION['dados_cliente']['CodCliente']  ?>">Meus Dados</a></li>
						<li><a href="./pedido/index">Meus pedidos</a></li>
						<li><a href="./carrinho/" class="active">Carrinho</a></li>
						<li><a href="./login/logout">Logout</a></li>
			</ul>
			<?php } 
			} ?>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- barra de pesquisa -->
