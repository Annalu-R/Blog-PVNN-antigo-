<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/UserRepository.php";

$cUsuario = new UserController();

class UserController{

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
        $caminho = __DIR__ . "/../views/" . $path;
        // echo("msg=");
        // print_r($msg);
        if(file_exists($caminho)){
             require $caminho;
        } else {
            print "Erro ao carregar a view";
        }
    }

    private function create(){
        
        $cUsuario = new UserModel();
        // $user->setNome("aaa");
        // $user->setTelefone("123213");
        // $user->setEmail("asd@asd");

		$user->setNome($_POST["nome"]);
		$user->setTelefone($_POST["telefone"]);
		$user->setEmail($_POST["email"]);

        $userRepository = new UserRepository();
        $id = $userRepository->create($user);

        if($id){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}

        $this->findAll($msg);
    }

    private function loadFormNew(){
        $this->loadView("usuarios/formCadastroUsuario.php", null,"teste");
    }    

    private function findAll(string $msg = null){
        
        $userRepository = new UserRepository();

        $user = $userRepository->findAll();

        $data['titulo'] = "listar usuários";
        $data['user'] = $user;

        $this->loadView("usuarios/list.php", $data, $msg);
    }

    private function findUserById(){
        $idParam = $_GET['id'];

        $userRepository = new UserRepository();
        $user = $userRepository->findUserById($idParam);

        print "<pre>";
        print_r($user);
        print "</pre>";
    }

    private function deleteUserById(){
        $idParam = $_GET['id'];
        $userRepository = new UserRepository();    

        $qt = $userRepository->deleteById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['id'];
        $userRepository = new UserRepository(); 
        $user = $userRepository->findUserById($idParam);
        $data['user'] = $user;

        $this->loadView("usuarios/formEditaUser.php", $data);
    }

    private function update(){
        $user = new UserModel();

		$user->setId($_GET["id"]);
		$user->setNome($_POST["nome"]);
		$user->setTelefone($_POST["telefone"]);
		$user->setEmail($_POST["email"]);

        $userRepository = new UserRepository();
        //print_r($user);
        $atualizou = $userRepository->update($user);
        
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
