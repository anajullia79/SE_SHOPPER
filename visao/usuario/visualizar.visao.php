<h2>Visão</h2>
<p>id: <?=$usuario['CodCliente']?></p>
<p>nome: <?=$usuario['nome']?></p>
<p>email: <?=$usuario['email']?></p>
<?php require "./servicos/correiosServico"; enviarEmail($usuario['email']); ?>

<a href="./carrinho/adicionar/<?=$usuario['CodCliente']?>">Comprar</a>