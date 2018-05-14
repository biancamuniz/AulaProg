<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 13/04/18
 * Time: 08:31
 *
 * AÇÃO PRINCIPAL - listar categoria/index
 *
 */

require_once "../models/CrudProduto.php";
require_once "../models/CrudCategoria.php";


if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){
    case 'index';
        echo 'Você escolheu INDEX';

        $crud = new CrudProduto();
        $produtos = $crud->getProdutos();
        include '../views/templates/cabecalho.php';
        include '../views/produto/index.php';
        include '../views/templates/rodape.php';
        break;

    case 'inserir';
        //1 - não digitou nada ainda, entao devever o formulario
        //
        //2 - já digitou - então deve gravar o que veio do formulario
        //

        if(!isset($_POST['gravar'])){ // ainda não digitou
            include '../views/templates/cabecalho.php';
            include '../views/produto/inserir.php';
            include '../views/templates/rodape.php';
        }else{ // já digitou e devo gravar

            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $idCategoria = $_POST['idCategoria'];

            $prod = new Produto($nome, $descricao, $preco, $idCategoria);

            $crud = new CrudProduto();
            $res = $crud->insertProduto($prod);

            header('location: produtos.php');
        }

        break;

    case 'exibir';

        $id = (int) $_GET['id'];
        $crud = new CrudProduto();
        $produto = $crud->getProduto($id);
        include '../views/templates/cabecalho.php';
        include '../views/produto/exibir.php';
        break;

    case 'update':
        $crud = new CrudProduto();
        if (isset($_POST['gravar'])){
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $idCategoria = $_POST['idCategoria'];

            $newprod = new Produto($nome, $descricao, $preco, $idCategoria);
            $res = $crud->updateProduto($newprod);
            echo $res;
            header('Location: produtos.php');
        }else{
            $prod = $crud->getProduto((int) $_GET['id']);
            include '../views/produto/update.php';
        }
        break;

    case 'delete':

        $crud = new CrudProduto();
        $res = $crud->deleteProduto((int)$_GET['id']);
        header('Location: produtos.php');
        break;

    default:
        echo 'Ação inválida';
}


