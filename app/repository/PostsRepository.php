<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/PostsModel.php";

    class PostsRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        public function create(PostsModel $posts) : int {
            try {
                $query = "INSERT INTO postagens (idPosts, autor, texto, comentarios, likes, tipoPostagem, livro) VALUES (:idPosts, :autor, :texto, :comentarios, :likes, :tipoPostagem, :livro)";
                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":autor", $posts->getAutor());
                $prepare->bindValue(":texto", $posts->getTexto());
                $prepare->bindValue(":comentarios", $posts->getComent());
                $prepare->bindValue(":likes", $posts->getLike());
                $prepare->bindValue(":tipoPostagem", $posts->getTpPost());
                $prepare->bindValue(":livro", $posts->getLivro());
                $prepare->execute();
                
                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir cliente no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM postagens");
            $posts  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        }

        public function findPostById(int $id) {
            $query = "SELECT * FROM postagens WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){
                $posts = $prepare->fetchObject("PostsModel");
            } else {
                $posts = null;
            }
            return $posts;
        }

        public function update(PostsModel $posts) : bool {
            $query = "UPDATE postagens SET autor = ?, texto = ?, comentarios = ?, likes = ?, tipoPostagem = ?, livro = ? WHERE id = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $posts->getAutor());
            $prepare->bindValue(2, $posts->getTexto());
            $prepare->bindValue(3, $posts->getComent());
            $prepare->bindValue(4, $posts->getLike());
            $prepare->bindValue(5, $posts->getTpPost());
            $prepare->bindValue(6, $posts->getLivro());
            $prepare->bindValue(7, $posts->getIdPosts());
            $result = $prepare->execute();
            //$result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }

        public function deleteById( int $id) : int {
            $query = "DELETE FROM postagens WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
    }

