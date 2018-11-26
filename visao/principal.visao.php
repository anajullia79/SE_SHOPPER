
<center>
<h1><b>Loja Phone</b></h1>

</center>
<br>
<div id="produtos">
<?php
	    if (!empty($produto)){
    foreach ($produto as $produtos): ?>
    <div style="height:80px;width: 25%;margin: 2%;display: inline-block;">
    	<h3><img src="<?=$produtos['imagem']?>" style="width: 160px"></h3>
        <span>Marca: <?=$produtos['marca']?> </span>
        <span>Modelo: <?=$produtos['modelo']?> </span>
        <span>Preço: <?=$produtos['preco']?> </span><br>
        <span><a  class="btn btn-danger" href="./produto/visualizar/<?=$produtos['idProduto']?>">Ver produto</a></span>
    </div>
    <?php endforeach; } ?>
<br>
</div>
<br>