<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/PostsRepository.php";

$cPosts = new PostsController();

class PostsController{

	function __construct(){
		
        if(isset($_POST["action"])){
			$action = $_POST["action"];
		}else if(isset($_GET["action"])){
			$action = $_GET["action"];
		}

		if(isset($action)){
			$this->callAction($action);
		} else {
			$msg = "Nenhuma acao a ser processada...";
            print_r($msg);
			//include_once "index.php";
		}
	}

    public function callAction(string $functionName = null){

        if (method_exists($this, $functionName)) {
            $this->$functionName();
        
        } else if(method_exists($this, "preventDefault")) {
            $met = "preventDefault";
            $this->$met();
        
        } else {
            throw new BadFunctionCallException("Usecase not exists");
        }
    }

    public function loadView(string $path, array $data = null, string $msg = null){
        $caminho = __DIR__ . "/../views/posts" . $path;
        // echo("msg=");
        // print_r($msg);
        if(file_exists($caminho)){
             require $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }

    private function create(){
        
        $cPosts = new PostsModel();
        // $posts->setNome("aaa");
        // $posts->setTelefone("123213");
        // $posts->setEmail("asd@asd");

		$posts->setAutor($_POST["autor"]);
		$posts->setTexto($_POST["texto"]);
		$posts->setComent($_POST["comentario"]);
        $posts->setLikes($_POST["likes"]);
        $posts->setTpPosts($_POST["tipoPostagem"]);
        $posts->setLivro($_POST["livro"]);
   

        $postsRepository = new PostsRepository();
        $idPosts = $postsRepository->create($posts);

        if($idPosts){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}

        $this->findAll($msg);
    }

    private function loadFormNew(){
        $this->loadView("posts/formCadastroPosts.php", null,"teste");
    }    

    private function findAll(string $msg = null){
        
        $postsRepository = new PostsRepository();

        $posts = $postsRepository->findAll();

        $data['titulo'] = "listar posts";
        $data['posts'] = $posts;

        $this->loadView("posts/Postslist.php", $data, $msg);
    }

    private function findPostById(){
        $idParam = $_GET['idPosts'];

        $postsRepository = new PostsRepository();
        $posts = $postsRepository->findPostById($idParam);

        print "<pre>";
        print_r($posts);
        print "</pre>";
    }

    private function deletePostById(){
        $idParam = $_GET['idPosts'];
        $postsRepository = new PostsRepository();    

        $qt = $postsRepository->deleteById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['idPosts'];
        $postsRepository = new PostsRepository(); 
        $posts = $postsRepositorPost($idParam);
        $data['posts'] = $posts;

        $this->loadView("posts/formEditaPosts.php", $data);
    }

    private function update(){
        $posts = new PostsModel();

		$posts->setIdPosts($_GET["idPosts"]);
		$posts->setAutor($_POST["autor"]);
		$posts->setTexto($_POST["texto"]);
		$posts->setComent($_POST["comentarios"]);
        $posts->setLikes($_POST["likes"]);
        $posts->setTpPosts($_POST["tipoPostagem"]);
        $posts->setLivro($_POST["livro"]);

        $postsRepository = new PostsRepository();
        //print_r($posts);
        $atualizou = $postsRepository->update($posts);
        
        if($atualizou){
			$msg = "Registro atualizado com sucesso.";
		}else{
			$msg = "Erro ao atualizar o registro no banco de dados.";
		}
		// include_once "cadastrar.php";

        $this->findAll($msg);        
    }

    private function preventDefault() {
        print "Ação indefinida...";
    }
}
