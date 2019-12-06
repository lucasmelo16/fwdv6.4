<?php

include __DIR__.'/Conexao.php';

    class Jogo extends Conexao {

        private $id;
	    private $nome;
        private $preco;
        private $avaliacao;

        function getId() {

            return $this->id;
        }
 
        function getNome() {

            return $this->nome;
    }

        function getPreco() {

            return $this->preco;
    }

        function getAvaliacao() {

            return $this->avaliacao;
    }

        function setId($id) {

            $this->id = $id;
    }

        function setNome($nome) {

            $this->nome = $nome;
    }

        function setPreco($preco) {

            $this->preco = $preco;
    }

        function setAvaliacao($avaliacao) { 

            $this->avaliacao = $avaliacao;
    }

        public function insert($obj){

    	    $sql = "INSERT INTO jogo(nome,preco,avaliacao) VALUES (:nome,:preco,:avaliacao)";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('nome', $obj->nome);
            $consulta->bindValue('preco' , $obj->preco);        
            $consulta->bindValue('avaliacao' , $obj->avaliacao);

    	return $consulta->execute();
    }
    
	    public function update($obj,$id = null){

		    $sql = "UPDATE jogo SET nome = :nome, preco = :preco, avaliacao = :avaliacao WHERE id = :id ";
            $consulta = Conexao::prepare($sql);
		    $consulta->bindValue('nome', $obj->nome);
		    $consulta->bindValue('preco' , $obj->preco);
		    $consulta->bindValue('avaliacao' , $obj->avaliacao);
            $consulta->bindValue('id', $id);
            
		return $consulta->execute();
    }
    
	    public function delete($obj,$id = null){

		    $sql =  "DELETE FROM jogo WHERE id = :id";
		    $consulta = Conexao::prepare($sql);
		    $consulta->bindValue('id',$id);
            $consulta->execute();
    }
    
	    public function find($id = null){

            $sql =  "SELECT * FROM jogo WHERE id = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',$id);
            $consulta->execute();
    }
    
	    public function findAll(){

		    $sql = "SELECT * FROM jogo";
		    $consulta = Conexao::prepare($sql);
            $consulta->execute();
            
		    return $consulta->fetchAll();
	}
}

?>