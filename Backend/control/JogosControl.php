<?php

include __DIR__.'/../model/Jogos.php';

class JogosControl{

	function insert($obj){

		$jogo = new Jogo();
		//echo $obj->titulo;
		return $jogo->insert($obj);
    }
    
	function update($obj,$id){

		$jogo = new Jogo();
		return $jogo->update($obj,$id);
    }
    
	function delete($obj,$id){

		$jogo = new Jogo();
		return $jogo->delete($obj,$id);
    }
    
	function find($id = null){

		$jogo = new Jogo();
		return $jogo->find($id);
    }
    
	function findAll(){

		$jogo = new Jogo();
		return $jogo->findAll();
	}
}

?>