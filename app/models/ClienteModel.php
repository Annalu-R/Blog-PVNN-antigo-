<?php
class ClienteModel {
	
	private $id;
	private $nome;
	private $telefone;
	private $email;
	
	public function getId(): int{
		return $this->id;
	}
	
	public function setId(int $id){
		$this->id = $id;
	}	
	
	public function getNome(): string{
		return $this->nome;
	}
	
	public function setNome(string $n){
		$this->nome = $n;
	}

	public function getTelefone(): string{
		return $this->telefone;
	}
	
	public function setTelefone(string $tel){
		$this->telefone = $tel;
	}

	public function getEmail(): string{
		return $this->email;
	}
	
	public function setEmail(string $e){
		$this->email = $e;
	}
}
