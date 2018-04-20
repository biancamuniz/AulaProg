<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 09:00
 */

require_once '../modelo/Categoria.php';
require_once '../modelo/CrudCategoria.php';

$cat1 = new Categoria(2, "Eletrônicos", "Produtos eletrônicos");

var_dump($cat1);

//TESTE DO MÉTODO getCategorias()

$crud = new CrudCategoria();
$categorias = $crud->getCategorias();
var_dump($categorias);

//TESTE DO MÉTODO getCategoria()

$categoria = $crud->getCategoria(1);
var_dump($categoria);

$cat2 = new Categoria(2, 'Móveis', 'Móveis para venda');
$crud = new CrudCategoria();
$res = $crud->insertCategoria($cat2);
echo $res;

