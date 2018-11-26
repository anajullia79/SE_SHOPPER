<center>
<h2><b>Roupas</h2></b></h2>
<p><b>Marca: </b><?=$produto['marca']?><br>
<b>Categoria: </b><?=$produto['categoria']?><br>
<b>Preço:</b> R$ <?=$produto['preco']?><br><br>
<img height="400px" width="300px" src="<?php echo $produto['imagem'];?>"></a></p><br>
<a class="btn btn-danger"href="./carrinho/adicionar/<?=$produto['CodProduto']?>">Comprar</a>
</center>
<br>
<br>


