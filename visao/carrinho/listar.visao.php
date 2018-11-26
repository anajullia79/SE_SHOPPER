<?php

 if (isset($erro)){
    alert($erro);
 }
?>
<center>
<h2><b>Listar Carrinho</b></h2>
</center>
<br>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NO CARRINHO</th>
            <th>MARCA</th>
            <th>CATEGORIA</th>
            <th>PREÇO</th>  
            <th>VISUALIZAR</th>
            <th>REMOVER DO CARRINHO</th>
              

        </tr>
    </thead>
    <?php  $total = 0; $fator = 0; $compra = array();
    if (isset($produtos)){
            $i = 0; foreach ($produtos as $produto): ?>
    <tr>
   
        <td><?=$produto['CodProduto']?></td>
        <td><?= $fator = $_SESSION["carrinho"][$i++]["quantidadeNoCarrinho"];?></td>
        <td><?=$produto['marca']?></td>
        <td><?=$produto['categoria']?></td>
        <td><?=$produto['preco']; $total = $total +($produto['preco'] * $fator); ?></td>  
        <td><a href="./produto/visualizar/<?=$produto['CodProduto']?>" class="btn btn-secondary">VER</a></td>
        <td><a href="./carrinho/deletar/<?=$produto['CodProduto']?>" class="btn btn-danger">REMOVER</a></td>

             </tr>
            <?php endforeach; } $compra['total'] = $total; $_SESSION["total"] = $total; ?>
    </table>

<a href="./produto/index" class="btn btn-primary">Produtos</a>
<br>
<br>
<a href="./compra/finalizarCompra/<?=$compra['total']?>">Preço estimado: <?php echo $total ?></a>
<br>
<br>
<form action="compra" method="POST">
<label for="cupom">Usar cupom ?</label>
<br>
<input id="cupom" type="text" name="codigo" placeholder="Código do cupom">
<br>
<br>
<button class="btn btn-danger"type="submit">Finalizar Compra</button>
</form>