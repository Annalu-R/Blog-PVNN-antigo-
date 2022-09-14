
mysql -u root -p // a senha eh bancodedados
create database pvnn;
use pvnn;

 CREATE TABLE usuarios (
    -> id INT(4) NOT NULL AUTO_INCREMENT,
    -> nome VARCHAR(50),
    -> email VARCHAR(100),
    -> senha VARCHAR(12),
    -> username VARCHAR(50),
    -> telefone VARCHAR(14),
    -> dtNascimento VARCHAR(8),
    -> tipoUsuario VARCHAR(30),
    -> PRIMARY KEY (id)
    -> );
Query OK, 0 rows affected, 1 warning (1,13 sec)

mysql> show tables;
+----------------+
| Tables_in_pvnn |
+----------------+
| usuarios       |
+----------------+
1 row in set (0,00 sec)

mysql> desc usuarios;
+--------------+--------------+------+-----+---------+----------------+
| Field        | Type         | Null | Key | Default | Extra          |
+--------------+--------------+------+-----+---------+----------------+
| id           | INT          | NO   | PRI | NULL    | AUTO_INCREMENT |
| nome         | VARCHAR(50)  | YES  |     | NULL    |                |
| email        | VARCHAR(100) | YES  |     | NULL    |                |
| senha        | VARCHAR(12)  | YES  |     | NULL    |                |
| username     | VARCHAR(50)  | YES  |     | NULL    |                |
| telefone     | VARCHAR(14)  | YES  |     | NULL    |                |
| dtNascimento | VARCHAR(8)   | YES  |     | NULL    |                |
| tipoUsuario  | VARCHAR(30)  | YES  |     | NULL    |                |
+--------------+--------------+------+-----+---------+----------------+
8 rows in set (0,00 sec)

mysql> use pvnn;
Database changed
mysql> CREATE TABLE postagens (
    -> idPosts INT(4) NOT NULL AUTO_INCREMENT,
    -> autor VARCHAR(50),
    -> texto VARCHAR(500),
    -> comentarios VARCHAR(100),
    -> likes INT(4),
    -> tipoPostagem VARCHAR(20),
    -> livro VARCHAR(10000),
    -> PRIMARY KEY (idPosts)
    -> );
Query OK, 0 rows affected, 2 warnings (1,28 sec)

mysql> show tables;
+----------------+
| Tables_in_pvnn |
+----------------+
| postagens      |
| usuarios       |
+----------------+
2 rows in set (0,00 sec)

mysql> desc postagens;
+--------------+----------------+------+-----+---------+----------------+
| Field        | Type           | Null | Key | Default | Extra          |
+--------------+----------------+------+-----+---------+----------------+
| idPosts      | INT            | NO   | PRI | NULL    | AUTO_INCREMENT |
| autor        | VARCHAR(50)    | YES  |     | NULL    |                |
| texto        | VARCHAR(500)   | YES  |     | NULL    |                |
| comentarios  | VARCHAR(100)   | YES  |     | NULL    |                |
| likes        | INT            | YES  |     | NULL    |                |
| tipoPostagem | VARCHAR(20)    | YES  |     | NULL    |                |
| livro        | VARCHAR(10000) | YES  |     | NULL    |                |
+--------------+----------------+------+-----+---------+----------------+
7 rows in set (0,00 sec)

mysql> use pvnn;
Database changed
mysql> CREATE TABLE categorias (
    -> idCat INT(4) NOT NULL AUTO_INCREMENT,
    -> tipo VARCHAR(30),
    -> tag VARCHAR(12),
    -> PRIMARY KEY (idCat)
    -> );
Query OK, 0 rows affected, 1 warning (1,15 sec)

mysql> show tables;
+----------------+
| Tables_in_pvnn |
+----------------+
| categorias     |
| postagens      |
| usuarios       |
+----------------+
3 rows in set (0,00 sec)

mysql> desc tables;

mysql> desc categorias;
+-------+-------------+------+-----+---------+----------------+
| Field | Type        | Null | Key | Default | Extra          |
+-------+-------------+------+-----+---------+----------------+
| idCat | INT         | NO   | PRI | NULL    | AUTO_INCREMENT |
| tipo  | VARCHAR(30) | YES  |     | NULL    |                |
| tag   | VARCHAR(12) | YES  |     | NULL    |                |
+-------+-------------+------+-----+---------+----------------+
3 rows in set (0,00 sec)

mysql> desc postagens;
+--------------+----------------+------+-----+---------+----------------+
| Field        | Type           | Null | Key | Default | Extra          |
+--------------+----------------+------+-----+---------+----------------+
| idPosts      | INT            | NO   | PRI | NULL    | AUTO_INCREMENT |
| autor        | VARCHAR(50)    | YES  |     | NULL    |                |
| texto        | VARCHAR(500)   | YES  |     | NULL    |                |
| comentarios  | VARCHAR(100)   | YES  |     | NULL    |                |
| likes        | INT            | YES  |     | NULL    |                |
| tipoPostagem | VARCHAR(20)    | YES  |     | NULL    |                |
| livro        | VARCHAR(10000) | YES  |     | NULL    |                |
+--------------+----------------+------+-----+---------+----------------+
7 rows in set (0,01 sec)

mysql> desc usuarios;
+--------------+--------------+------+-----+---------+----------------+
| Field        | Type         | Null | Key | Default | Extra          |
+--------------+--------------+------+-----+---------+----------------+
| id           | INT          | NO   | PRI | NULL    | AUTO_INCREMENT |
| nome         | VARCHAR(50)  | YES  |     | NULL    |                |
| email        | VARCHAR(100) | YES  |     | NULL    |                |
| senha        | VARCHAR(12)  | YES  |     | NULL    |                |
| username     | VARCHAR(50)  | YES  |     | NULL    |                |
| telefone     | VARCHAR(14)  | YES  |     | NULL    |                |
| dtNascimento | VARCHAR(8)   | YES  |     | NULL    |                |
| tipoUsuario  | VARCHAR(30)  | YES  |     | NULL    |                |
+--------------+--------------+------+-----+---------+----------------+
8 rows in set (0,00 sec)

