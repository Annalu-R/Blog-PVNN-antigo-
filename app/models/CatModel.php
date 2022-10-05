<?php
class CatModel {
	
	private $idCat;
	private $tag;
	private $tipo;

	
	public function getidCat(): int{
		return $this->idCat;
	}
	
	public function setidCat(int $idCat){
		$this->idCat = $idCat;
	}	
	
	public function getTipo(): string{
		return $this->tipo;
	}
	
	public function setTipo(string $tipo){
		$this->tipo = $tipo;
	}

	public function getTag(): string{
		return $this->tag;
	}
	
	public function setTag(string $tag){
		$this->tag = $tag;
	}



}
