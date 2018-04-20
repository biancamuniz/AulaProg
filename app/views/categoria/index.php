
    <h1> Categorias </h1>
    <a href="app/controllers/categorias.php?acao=inserir">Inserir Categorias</a>
    <table>
        <tr>
            <th>#</th>
            <th>Nome Categoria</th>
        </tr>

        <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?=$categoria->getId()?></td>
                <td><a href="app/controllers/categorias.php?acao=exibir&id=<?=$categoria->getId(); ?>"><?= $categoria->getNome();?>  </a></td>
            </tr>
        <?php endforeach; ?>
    </table>
