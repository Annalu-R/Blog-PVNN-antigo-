<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/UserModel.php";

    class UserRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        public function create(UserModel $user) : int {
            try {
                $query = "INSERT INTO usuarios (nome, telefone, email, senha, username, dtNascimento, tipoUser) VALUES (:nome, :fone, :email, :senha, :username, :dtNascimento, :tipoUser)";
                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":nome", $user->getNome());
                $prepare->bindValue(":fone", $user->getTelefone());
                $prepare->bindValue(":email", $user->getEmail());
                $prepare->bindValue(":senha", $user->getSenha());
                $prepare->bindValue(":username", $user->getUsername());
                $prepare->bindValue(":dtNascimento", $user->getDtNasc());
                $prepare->bindValue(":tipoUser", $user->getTipoUser());
                $prepare->execute();
                
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir cliente no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM usuarios");
            $usuarios  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $usuarios;
        }

        public function findUserById(int $id) {
            $query = "SELECT * FROM usuarios WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $user = $prepare->fetchObject("UserModel");
            } else {
                $user = null;
            }
            return $user;
        }

        public function update(UserModel $user) : bool {
            $query = "UPDATE usuarios SET nome = ?, telefone = ?, email = ?, senha = ?, username = ?, dtNascimento = ?, tipoUser = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $user->getNome());
            $prepare->bindValue(2, $user->getTelefone());
            $prepare->bindValue(3, $user->getEmail());
            $prepare->bindValue(4, $user->getSenha());
            $prepare->bindValue(5, $user->getUsername());
            $prepare->bindValue(6, $user->getDtNasc());
            $prepare->bindValue(7, $user->getTipoUser());
            $prepare->bindValue(8, $user->getId());
            $result = $prepare->execute();
            //$result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }

        public function deleteById( int $id) : int {
            $query = "DELETE FROM usuarios WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
    }
