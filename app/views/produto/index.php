
<h1> Produtos </h1>
<a href="app/controllers/produtos.php?acao=inserir">Inserir Produto</a>
<table>
    <tr>
        <th>#</th>
        <th>Nome Produto</th>
    </tr>

    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?=$produto->getId()?></td>
            <td><a href="app/controllers/produtos.php?acao=exibir&id=<?=$produto->getId(); ?>"><?= $produto->getNome();?>  </a></td>
        </tr>
    <?php endforeach; ?>
</table>
