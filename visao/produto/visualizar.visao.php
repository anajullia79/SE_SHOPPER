<center>
<h2><b>Roupas</h2></b></h2>
<?php
// print_r($produto);
// die();
?>
<p><b>Nome: </b><?=$produto['NomeProduto']?><br>
<b>Categoria: </b><?=$produto['DescricaoProduto']?><br>
<b>Preço:</b> R$ <?=$produto['Preco']?><br><br>
<b>Id:</b> R$ <?=$produto['CodProduto']?><br><br>
<img height="400px" width="300px" src="<?php echo $produto['Imagem'];?>"></a></p><br>
<a class="btn btn-danger"href="./carrinho/adicionar/<?=$produto['CodProduto']?>">Comprar</a>
</center>
<br>
<br>


