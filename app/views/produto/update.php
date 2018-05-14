<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="produtos.php?acao=update" method="post">
    <input type="text" value="<?=$prod->getNome();?>" name="nome" id="nome">
    <input type="text" value="<?=$prod->getDescricao();?>" name="descricao" id="descricao">
    <input type="hidden" value="<?=$prod->getId()?>" name="id">
    <input type="hidden" value="<?=$_GET['idCategoria'];?>" name="id_categoria">
    <input type="submit" name="gravar">
</form>
</body>
</html>