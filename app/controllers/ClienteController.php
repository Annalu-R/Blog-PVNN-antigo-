<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/ClienteRepository.php";

$ccliente = new ControllerCliente();

class ControllerCliente{

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
        
        $cliente = new ClienteModel();
        // $cliente->setNome("aaa");
        // $cliente->setTelefone("123213");
        // $cliente->setEmail("asd@asd");

		$cliente->setNome($_POST["nome"]);
		$cliente->setTelefone($_POST["telefone"]);
		$cliente->setEmail($_POST["email"]);

        $clienteRepository = new ClienteRepository();
        $id = $clienteRepository->create($cliente);

        if($id){
			$msg = "Registro inserido com sucesso.";
		}else{
			$msg = "Erro ao inserir o registro no banco de dados.";
		}

        $this->findAll($msg);
    }

    private function loadFormNew(){
        $this->loadView("clientes/formCadastroCliente.php", null,"teste");
    }    

    private function findAll(string $msg = null){
        
        $clienteRepository = new ClienteRepository();

        $clientes = $clienteRepository->findAll();

        $data['titulo'] = "listar clientes";
        $data['clientes'] = $clientes;

        $this->loadView("clientes/list.php", $data, $msg);
    }

    private function findClienteById(){
        $idParam = $_GET['id'];

        $clienteRepository = new ClienteRepository();
        $cliente = $clienteRepository->findClienteById($idParam);

        print "<pre>";
        print_r($cliente);
        print "</pre>";
    }

    private function deleteClienteById(){
        $idParam = $_GET['id'];
        $clienteRepository = new ClienteRepository();    

        $qt = $clienteRepository->deleteById($idParam);
        if($qt){
			$msg = "Registro excluído com sucesso.";
		}else{
			$msg = "Erro ao excluir o registro no banco de dados.";
		}
        $this->findAll($msg);
    }

    private function edit(){
        $idParam = $_GET['id'];
        $clienteRepository = new ClienteRepository(); 
        $cliente = $clienteRepository->findClienteById($idParam);
        $data['cliente'] = $cliente;

        $this->loadView("clientes/formEditaCliente.php", $data);
    }

    private function update(){
        $cliente = new ClienteModel();

		$cliente->setId($_GET["id"]);
		$cliente->setNome($_POST["nome"]);
		$cliente->setTelefone($_POST["telefone"]);
		$cliente->setEmail($_POST["email"]);

        $clienteRepository = new ClienteRepository();
        //print_r($cliente);
        $atualizou = $clienteRepository->update($cliente);
        
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