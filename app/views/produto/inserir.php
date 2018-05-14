<h2>Inserir Produto</h2>

<form method="post" action="app/controllers/produtos.php?acao=inserir">

    <label for="nome">NOME</label>
    <input type="text" name="nome" id="nome"/>

    <br>

    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>

    <br>

    <input type="submit" name="gravar" value="Gravar"/>

</form>