<?php

class MPessoa{
	//atributos
	private $id; //chave primaria
	private $cpf; // chave única
	private $nome;

	function __construct($id,$cpf,$nome){
		$this->id = $id;
		$this->cpf = $cpf;
		$this->nome = $nome;
	}

	public function GetId(){
		return $this->id;
	}

	public function GetCPF(){
		return $this->cpf;
	}

	public function GetNome(){
		return $this->nome;
	}

	public function SetId($id){
		$this->id = $id;
	}

	public function SetCPF($cpf){
		$this->cpf = $cpf;
	}

	public function SetNome($nome){
		$this->nome = $nome;
	}
}



?>