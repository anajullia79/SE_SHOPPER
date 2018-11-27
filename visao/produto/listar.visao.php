 <br>
 <center>
    <h2><b>Listar Produtos</b></h2>
</center>
<br>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>CATEGORIA</th>
            <th>PREÇO</th>
            <th>VISUALIZAR</th>
            <?php
            if (!empty($_SESSION["auth"])) {

                if ( $_SESSION["auth"]["role"] == "admin") {

                    ?>
                    <th>EDITAR</th>
                    <th>DELETAR</th>
                    <?php
                }
            }
            ?>
        </tr>
    </thead>
    <?php
    if (!isset($produtos)){         // die();
        foreach ($produto as $produtos): ?>

            <tr>
                <td><?=$produtos['CodProduto']?></td>
                <td><?=$produtos['NomeProduto']?></td>
                <td><?=$produtos['DescricaoProduto']?></td>
                <td><?=$produtos['Preco']?></td>
                <td><a href="./produto/visualizar/<?=$produtos['CodProduto']?>" class="btn btn-secondary">Visualizar</a></td>
                <?php
                if (!empty($_SESSION["auth"])) {
                    if ( $_SESSION["auth"]["role"] == "admin") {

                        ?>
                        <td><a href="./produto/editar/<?=$produtos['CodProduto']?>" class="btn btn-info">Editar</a></td>
                        <td><a href="./produto/deletar/<?=$produtos['CodProduto']?>" class="btn btn-danger">Deletar</a></td>
                        <?php
                    }
                }
                ?>
            </tr>
        <?php endforeach; } ?>
    </table>
    <br>
    <center>
        <a href="./produto/adicionar" class="btn btn-primary">Ato</a>
    </center>
    <br>