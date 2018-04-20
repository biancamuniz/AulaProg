<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 15:53
 */

require_once '../modelo/Produto.php';

$prod1 = new Produto(1, "Celular", "Aparelho eletrônico", "12,00", 2);

var_dump($prod1);