<?php

include __DIR__.'/Conexao.php';

    class Pessoa extends Conexao {

        private $nome;
        private $email;

        public function getNome() {

            return $this->nome;
    }

        public function setNome($nome) {

            $this->nome = $nome;
            return $this;
    }
    
        public function getEmail() {  

            return $this->email;
    }
   
        public function setEmail($email) {

            $this->email = $email;
            return $this;
    }
    
        public function insert($obj){  

    	    $sql = "INSERT INTO pessoas(nome,email) VALUES (:nome,:email)";
    	    $consulta = Conexao::prepare($sql);
            $consulta->bindValue('nome',  $obj->nome);
            $consulta->bindValue('email', $obj->email);
    	    $consulta->execute();
            return Conexao::lastId(); /*Aqui vc tem o ID da pessoa, você pode não retornar ele e adicionar uma nova query para inserção e inserir nas duas tabelas ao mesmo tempo se for sempre assim */        
    }
    
	    public function update($obj,$id = null){

		    $sql = "UPDATE pessoas SET nome = :nome, email = :email WHERE id = :id ";
		    $consulta = Conexao::prepare($sql);
		    $consulta->bindValue('nome', $obj->nome);		
            $consulta->bindValue('email', $obj->email);
		    $consulta->bindValue('id', $id);
		    return $consulta->execute();
    }
    
	    public function delete($obj,$id = null){

            $sql =  "DELETE FROM pessoas WHERE id = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',$id);
            $consulta->execute();
            return $consulta->execute();
    }
    
	    public function find($id = null){

            $sql =  "SELECT * FROM pessoas WHERE id = :id";
            $consulta = Conexao::prepare($sql);
            $consulta->bindValue('id',$id);
            $consulta->execute();
            return $consulta->fetch();
    }
    
	    public function findAll(){

            $sql = "SELECT * FROM pessoas";
            $consulta = Conexao::prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll();
	}
}

?>