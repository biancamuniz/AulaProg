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

require_once "../models/CrudCategoria.php";

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){
    case 'index';
        echo 'Você escolheu INDEX';

        $crud = new CrudCategoria();
        $categorias = $crud->getCategorias();
        include '../views/templates/cabecalho.php';
        include '../views/categoria/index.php';
        include '../views/templates/rodape.php';
        break;

    case 'inserir';
        //1 - não digitou nada ainda, entao devever o formulario
        //
        //2 - já digitou - então deve gravar o que veio do formulario
        //

        if(!isset($_POST['gravar'])){ // ainda não digitou
            include '../views/templates/cabecalho.php';
            include '../views/categoria/inserir.php';
            include '../views/templates/rodape.php';
        }else{ // já digitou e devo gravar

            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];

            $cat = new Categoria($nome, $descricao);

            $crud = new CrudCategoria();
            $res = $crud->insertCategoria($cat);

            header('location: categorias.php');
        }

        break;

     case 'exibir';

        $id = $_GET['id'];
        $crud = new CrudCategoria();
        $categoria = $crud->getCategoria($id);
         include '../views/templates/cabecalho.php';
        include '../views/categoria/exibir.php';
        break;

    case 'update':
        $crud = new CrudCategoria();
        if (isset($_POST['gravar'])){
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $newcat = new Categoria($nome, $descricao, $id);
            $res = $crud->updateCategoria($newcat);
            echo $res;
            header('Location: categorias.php');
        }else{
            $cat = $crud->getCategoria($_GET['id']);
            include '../views/categoria/update.php';
        }
        break;

    case 'delete':

        $crud = new CrudCategoria();
        $res = $crud->deleteCategoria($_GET['id']);
        header('Location: categorias.php');
        break;

    default:
        echo 'Ação inválida';
}


