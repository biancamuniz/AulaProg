<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:35
 */

require_once 'DBConnection.php';
require_once 'Categoria.php';
class CrudCategoria
{

    private $conexao;

    public function getCategorias(){

        //CONEXAO AO BD
        $this->conexao = DBConnection::getConexao();

        //SELECT - Traz todos os dados da categoria
        $sql = 'select * from categoria';
        $resultado = $this->conexao->query($sql);

        //resultset do BD
        $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categorias as $categoria) {
            $listaCategorias[] = new Categoria($categoria['nome_categoria'],$categoria['descricao_categoria'],$categoria['id_categoria']);

        }

        return $listaCategorias;
    }

    public function getCategoria(int $id){
        //recebe um $id inteiro e retorna o objeto categoria correspondente
        //faz a conexao
        $this->conexao = DBConnection::getConexao();
        //criando a consulta
        $sql = "select * from categoria where id_categoria = ".$id;
        //executa a consulta, usando a conexao
        $result = $this->conexao->query($sql);
        //transformar o resultado em um array
        $categoria = $result->fetch(PDO::FETCH_ASSOC);
        //instanciar um tipo categoria com os valores recebidos
        $objcat = new Categoria($categoria["nome_categoria"], $categoria["descricao_categoria"], $categoria["id_categoria"]);
        //retorna o objeto categoria criado
        return $objcat;
    }

    public function insertCategoria(Categoria $categoria){
        //recebe um objeto $cat e insere na tabela categoria do Bd

        $this->conexao = DBConnection::getConexao();
        $sql = "INSERT INTO categoria (nome_categoria, descricao_categoria) VALUES('{$categoria->getNome()}','{$categoria->getDescricao()}')";
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function updateCategoria(Categoria $cat){
        $this->conexao = DBConnection::getConexao();
        $sql = "update categoria set nome_categoria = '".$cat->getNome()."', descricao_categoria = '".$cat->getDescricao()."' where id_categoria = ".$cat->getId();
        echo $sql;
        try {
            $resultado = $this->conexao->exec($sql);
            return $resultado;
        }catch(PDOException $e){
            echo $e->getMessage();
            return $e->getMessage();
        }

    }

    public function deleteCategoria(int $id){

        $this->conexao = DBConnection::getConexao();
        $sql = "delete from categoria where id_categoria = ".$id;
        try {
            $resultado = $this->conexao->exec($sql);
            return $resultado;
        }catch(PDOException $e){
        echo $e->getMessage();
        return $e->getMessage();
}


    }
}


?>
