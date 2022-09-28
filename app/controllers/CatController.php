<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/CatRepository.php";

$cCategoria = new CatController();

class CatController{

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
        $caminho = __DIR__ . "/../views/category" . $path;
        // echo("msg=");
        // print_r($msg);
        if(file_exists($caminho)){
             require $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }

    private function create(){
        
        $cCategoria = new CatModel();
        // $cat->setNome("aaa");
        // $cat->setTelefone("123213");
        // $cat->setEmail("asd@asd");

		$cat->setTag($_POST["tag"]);
		$cat->setTipo($_POST["tipo"]);


        $catRepository = new CatRepository();
        $id = $catRepository->create($cat);

        if($id){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}

        $this->findAll($msg);
    }

    private function loadFormNew(){
        $this->loadView("category/formCadastroCat.php", null,"teste");
    }    

    private function findAll(string $msg = null){
        
        $catRepository = new CatRepository();

        $cat = $catRepository->findAll();

        $data['titulo'] = "listar categorias";
        $data['cat'] = $cat;

        $this->loadView("category/Catlist.php", $data, $msg);
    }

    private function findCatById(){
        $idParam = $_GET['idCat'];

        $catRepository = new CatRepository();
        $cat = $catRepository->findCatById($idParam);

        print "<pre>";
        print_r($cat);
        print "</pre>";
    }

    private function deleteCatById(){
        $idParam = $_GET['idCat'];
        $catRepository = new CatRepository();    

        $qt = $catRepository->deleteCatById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['idCat'];
        $catRepository = new CatRepository(); 
        $cat = $catRepository->findCatById($idParam);
        $data['cat'] = $cat;

        $this->loadView("category/formEditaCat.php", $data);
    }

    private function update(){
        $cat = new CatModel();

		$cat->setIdCat($_GET["idCat"]);
		$cat->setTag($_POST["tag"]);
		$cat->setTipo($_POST["tipo"]);
		
        $catRepository = new CatRepository();
        //print_r($cat);
        $atualizou = $catRepository->update($cat);
        
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
