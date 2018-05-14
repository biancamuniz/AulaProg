<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 08:55
 */

class Produto
{
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $idCategoria;


    public function __construct($nome, $descricao, $preco, $idCategoria, $id=null)
    {
        $this->id          = $id;
        $this->nome        = $nome;
        $this->descricao   = $descricao;
        $this->preco       = $preco;
        $this->idCategoria = $idCategoria;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): void
    {
        $this->preco = $preco;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria): void
    {
        $this->idCategoria = $idCategoria;
    }

}