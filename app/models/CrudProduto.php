<?php
require_once 'DBConnection.php';
require_once 'Produto.php';
class CrudProduto
{

    private $conexao;

    public function getProdutos(){

        //CONEXAO AO BD
        $this->conexao = DBConnection::getConexao();

        //SELECT - Traz todos os dados da categoria
        $sql = 'select * from produto';
        $resultado = $this->conexao->query($sql);

        //resultset do BD
        $produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($produtos as $produto) {
            $listaProdutos[] = new Produto($produto['nome_produto'], $produto['descricao_produto'],$produto['preco_produto'],$produto['id_produto']);

        }

        return $listaProdutos;
    }

    public function getProduto($id){

        $this->conexao = DBConnection::getConexao();

        $sql = "select * from produto where id_produto = ". (int) $id;

        $result = $this->conexao->query($sql);

        $produto = $result->fetch(PDO::FETCH_ASSOC);

        $objprod = new Produto($produto["nome_produto"], $produto["descricao_produto"], $produto['preco_produto'], $produto["id_categoria"]);

        return $objprod;
    }

    public function insertProduto(Produto $produto){
        //recebe um objeto $cat e insere na tabela categoria do Bd

        $this->conexao = DBConnection::getConexao();
        $sql = "INSERT INTO produto (nome_produto, descricao_produto, preco_produto) VALUES('{$produto->getNome()}','{$produto->getDescricao()}','{$produto->getPreco}')";
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function updateProduto(Produto $prod){
        $this->conexao = DBConnection::getConexao();

        $sql = "update produto set nome_produto = '".$prod->getNome()."', descricao_produto = '".$prod->getDescricao()."', preco_produto = '".$prod->getPreco()."' where id_produto = ".$prod->getId();

        echo $sql;
        try {
            $resultado = $this->conexao->exec($sql);
            return $resultado;
        }catch(PDOException $e){
            return $e->getMessage();
        }

    }

    public function deleteProduto(int $id){

        $this->conexao = DBConnection::getConexao();
        $sql = "delete from produto where id_produto = ".$id;
        try {
            $resultado = $this->conexao->exec($sql);
            return $resultado;
        }catch(PDOException $e){
            return $e->getMessage();
        }


    }
}

