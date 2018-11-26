<br>
<center>
<h2><b>Listar Cupons</b></h2>
</center>
<table class="table">
    <thead>
        <tr>
            <th>CÓDIGO</th>
            <th>CUPOM</th>
            <th>DESCONTO</th>
            <th>STATUS</th>
            <th>VIEW</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
        </tr>
    </thead>
    <?php 
    if (!empty($cupons)){
    foreach ($cupons as $cupom): ?>
    <tr>
        <td><?=$cupom['codigo']?></td>
        <td><?=$cupom['Cupom']?></td>
        <td><?=$cupom['desconto']?></td>
        <td><?=$cupom['status']?></td>
        <td><a href="./cupom/visualizar/<?=$cupom['codigo']?>" class="btn btn-secondary">Visualizar</a></td>
        <td><a href="./cupom/editar/<?=$cupom['codigo']?>" class="btn btn-info">Editar</a></td>
        <td><a href="./cupom/deletar/<?=$cupom['codigo']?>" class="btn btn-danger">Deletar</a></td>
    </tr>
    <?php endforeach; } ?>
</table>

<center>
<a href="./cupom/adicionar" class="btn btn-primary">Adicionar novo cupom</a>
</center>