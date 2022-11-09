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
                $query = "INSERT INTO postagens (idPosts, autor, titulo, texto, comentarios, likes, tipoPostagem, livro) VALUES (:idPosts, :autor, :titulo, :texto, :comentarios, :likes, :tipoPostagem, :livro)";
                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":autor", $posts->getAutor());
                $prepare->bindValue(":titulo", $posts->getTitulo());
                $prepare->bindValue(":texto", $posts->getTexto());
                $prepare->bindValue(":comentarios", $posts->getComent());
                $prepare->bindValue(":likes", $posts->getLike());
                $prepare->bindValue(":tipoPostagem", $posts->getTpPost());
                $prepare->bindValue(":livro", $posts->getLivro());
                $prepare->execute();
                
                return $this->conn->lastInsertIdPosts();
                
            } catch(Exception $e) {
                    print("Erro ao inserir postagem no banco de dados");
            }
        }

        public function findAll(): array {
            $table = $this->conn->query("SELECT * FROM postagens");
            $posts  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        }

        public function findPostByIdPosts(int $idPosts) {
            $query = "SELECT * FROM postagens WHERE idPosts = ?";
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
            $query = "UPDATE postagens SET autor = ?, titulo = ?, texto = ?, comentarios = ?, likes = ?, tipoPostagem = ?, livro = ? WHERE idPost = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $posts->getAutor());
            $prepare->bindValue(2, $posts->getTitulo());
            $prepare->bindValue(3, $posts->getTexto());
            $prepare->bindValue(4, $posts->getComent());
            $prepare->bindValue(5, $posts->getLike());
            $prepare->bindValue(6, $posts->getTpPost());
            $prepare->bindValue(7, $posts->getLivro());
            $prepare->bindValue(8, $posts->getIdPosts());
            $result = $prepare->execute();
            //$result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }

        public function deleteByIdPost( int $idPosts) : int {
            $query = "DELETE FROM postagens WHERE idPosts = :idPosts";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":idPosts", $idPosts);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;
        }
    }

