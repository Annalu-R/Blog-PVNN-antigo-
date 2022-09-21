<?php
class PostsModel {
	
	private $idPosts;
	private $autor;
	private $texto;
	private $comentarios;
	private $likes;
	private $tipoPostagem;
	private $livro;

	
	public function getIdPosts(): int{
		return $this->idPosts;
	}
	
	public function setIdPosts(int $idPosts){
		$this->idPosts = $idPosts;
	}	
	
	public function getAutor(): string{
		return $this->autor;
	}
	
	public function setAutor(string $au){
		$this->autor = $au;
	}

	public function getTexto(): string{
		return $this-$texto;
	}
	
	public function setTexto(string $text){
		$this-$texto = $text;
	}

	public function getComent(): string{
		return $this->comentarios;
	}
	
	public function setComent(string $coment){
		$this->comentarios = $coment;
	}
	public function getLikes(): string{
		return $this->likes;
	}
	
	public function setLikes(string $like){
		$this->likes = $like;
	}
	public function getTpPosts(): string{
		return $this->tipoPostagem;
	}
	
	public function setTpPosts(string $tpPost){
		$this->tipoPostagem = $tpPost;
	}
	public function getLivro(): string{
		return $this->livro;
	}
	
	public function setLivro(string $livro){
		$this->livro = $livro;
	}
