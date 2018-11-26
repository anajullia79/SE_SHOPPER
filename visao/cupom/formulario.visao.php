<br>
<center>
<h2><b>Adicionar Cupom</b></h2>
<form action="<?=@$acao?>" method="POST" enctype="multipart/form-data">
    Nome do Cupom: <input type="text" name="cupom" value="<?=@$cupom['cupom']?>"><br><br>
    Desconto contido: <input type="float" name="desconto" value="<?=@$cupom['desconto']?>">
<br>
<br>

    <button class="btn btn-primary" type="submit">Cadastrar Cupom</button>


</form>
</center>