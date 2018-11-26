 <br>
 <center>
    <h2><b>Listar Produtos</b></h2>
</center>
<br>
<table class="table">
    <thead>
        <tr>

            <th>MARCA</th>
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
    if (!empty($produto)){
        foreach ($produto as $produtos): ?>
            <tr>

                <td><?=$produtos['marca']?></td>
                <td><?=$produtos['categoria']?></td>
                <td><?=$produtos['preco']?></td>
                <td><a href="./produto/visualizar/<?=$produtos['codProduto']?>" class="btn btn-secondary">Visualizar</a></td>
                <?php
                if (!empty($_SESSION["auth"])) {
                    if ( $_SESSION["auth"]["role"] == "admin") {

                        ?>
                        <td><a href="./produto/editar/<?=$produtos['codProduto']?>" class="btn btn-info">Editar</a></td>
                        <td><a href="./produto/deletar/<?=$produtos['codProduto']?>" class="btn btn-danger">Deletar</a></td>
                        <?php
                    }
                }
                ?>
            </tr>
        <?php endforeach; } ?>
    </table>
    <br>
    <center>
        <a href="./produto/adicionar" class="btn btn-primary">Adicionar novo produto</a>
    </center>
    <br>