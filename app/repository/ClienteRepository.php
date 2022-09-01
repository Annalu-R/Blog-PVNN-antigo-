<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/ClienteModel.php";

    class ClienteRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        public function create(ClienteModel $cliente) : int {
            try {
                $query = "INSERT INTO clientes (nome, telefone, email) VALUES (:nome, :fone, :email)";
                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":nome", $cliente->getNome());
                $prepare->bindValue(":fone", $cliente->getTelefone());
                $prepare->bindValue(":email", $cliente->getEmail());

                $prepare->execute();
                
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir cliente no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM clientes");
            $clientes  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $clientes;
        }

        public function findClienteById(int $id) {
            $query = "SELECT * FROM clientes WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $cliente  = $prepare->fetchObject("ClienteModel");
            } else {
                $cliente = null;
            }
            return $cliente;
        }

        public function update(ClienteModel $cliente) : bool {
            $query = "UPDATE clientes SET nome = ?, telefone = ?, email = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $cliente->getNome());
            $prepare->bindValue(2, $cliente->getTelefone());
            $prepare->bindValue(3, $cliente->getEmail());
            $prepare->bindValue(4, $cliente->getId());
            $result = $prepare->execute();
            //$result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }

        public function deleteById( int $id) : int {
            $query = "DELETE FROM clientes WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
    }
