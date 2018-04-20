<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 08:50
 * classe que representa a entidade categoria
 */

class Categoria
{
    private $id;
    private $nome;
    private $descricao;
    private $preco;



    public function __construct($nome, $descricao, $id=null)
    {
        $this->id        = $id;
        $this->nome      = $nome;
        $this->descricao = $descricao;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

}