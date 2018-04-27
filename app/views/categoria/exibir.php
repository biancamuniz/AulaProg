
    <h1> Detalhes da Categoria . <?=$categoria->getNome();?> </h1>
    <p>Descrição: <?= $categoria->getDescricao(); ?></p>

    <a href="app/controllers/categorias.php?acao=update&id=<?=$categoria->getId(); ?>">Alterar categoria</a>
    <br>
    <a href="app/controllers/categorias.php?acao=delete&id=<?=$categoria->getId(); ?>">Excluir categoria</a>