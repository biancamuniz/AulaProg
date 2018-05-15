
<h1> Detalhes da Produto <?=$produto->getNome();?> </h1>
<p>Descrição: <?= $produto->getDescricao(); ?></p>

<a href="app/controllers/produtos.php?acao=update&id=<?=$produto->getId(); ?>">Alterar produto</a>
<br>
<a href="app/controllers/produtos.php?acao=delete&id=<?=$produto->getId(); ?>">Excluir produto</a>