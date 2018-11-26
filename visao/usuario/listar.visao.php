
<center>
<h2><b>Listar usuários</b></h2><br>
</center>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>VISUALIZAR</th>
            <th>EDITAR</th>
            <th>DELETAR</th>
        </tr>
    </thead>
    <?php 
        foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?=$usuario['CodCliente']?></td>
        <td><?=$usuario['nome']?></td>
        <td><?=$usuario['email']?></td>
        <td><a href="./usuario/visualizar/<?=$usuario['CodCliente']?>" class="btn btn-secondary">Visualizar</a></td>
        <td><a href="./usuario/editar/<?=$usuario['CodCliente']?>" class="btn btn-info">Editar</a></td>
        <td><a href="./usuario/deletar/<?=$usuario['CodCliente']?>" class="btn btn-danger">Deletar</a></td>
    </tr>
    <?php endforeach; ?>
</table><br>

<center>
<a href="./usuario/adicionar" class="btn btn-primary">Adicionar novo usuario</a>
</center><br>
