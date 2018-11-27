<center>
<h2><b>Formulário de Produto</b></h2>
<br>
<form action="<?=@$acao?>" method="POST" enctype="multipart/form-data">
    Marca: <input type="text" name="marca" value="<?=@$produto['marca']?>"><br><br>
    Categoria: <input type="text" name="categoria" value="<?=@$produto['Categoria']?>"><br><br>
   	Preço: <input type="text" name="preco" value="<?=@$produto['preco']?>"><br><br>
    Quantidade: <input type="text" name="qtd" value="<?=@$produto['qtd']?>"><br>
<br>

Imagem: <input type="file" id="exampleInputFile" class="form" name="imagemProduto"><br><br>

    <button class="btn btn-primary" type="submit">Adicionar</button><br>


</form>
</center>