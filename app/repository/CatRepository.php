<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/CatModel.php";

    class CatRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        public function create(CatModel $cat) : int {
            try {
                $query = "INSERT INTO categorias (tag, tipo) VALUES (:tag, :tipo)";
                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":tag", $cat->getTag());
                $prepare->bindValue(":tipo", $cat->getTipo());
              
                $prepare->execute();
                
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir categoria no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM categorias");
            $categorias  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $categorias;
        }

        public function findCatById(int $idCat) {
            $query = "SELECT * FROM categorias WHERE idCat = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $idCat, PDO::PARAM_INT);

            if($prepare->execute()){
                $cat = $prepare->fetchObject("CatModel");
            } else {
                $cat = null;
            }
            return $cat;
        }

        public function update(CatModel $cat) : bool {
            $query = "UPDATE categorias SET tag = ?, tipo = ? WHERE idCat = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $cat->getTag());
            $prepare->bindValue(2, $cat->getTipo());
            $prepare->bindValue(3, $cat->getIdCat());
            $result = $prepare->execute();
            //$result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }

        public function deleteCatById( int $idCat) : int {
            $query = "DELETE FROM categorias WHERE idCat = :idCat";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":idCat", $idCat);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
    }
