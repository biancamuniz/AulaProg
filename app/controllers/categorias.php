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

        include '../views/templates/cabecalho.php';
        include '../views/categoria/inserir.php';
        include '../views/templates/rodape.php';
        break;

     case 'exibir';

        $id = $_GET['id'];
        $crud = new CrudCategoria();
        $categoria = $crud->getCategoria($id);
         include '../views/templates/cabecalho.php';
        include '../views/categoria/exibir.php';
        break;

    default:
        echo 'Acao inválida';
}

