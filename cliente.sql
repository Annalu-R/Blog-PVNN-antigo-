
mysql -u root -p // a senha eh bancodedados
create database pvnn;
use pvnn;

CREATE TABLE clientes (
	id int(4) NOT NULL AUTO_INCREMENT,
	nome varchar(50),
	telefone varchar(14),
	email varchar(50),
	PRIMARY KEY (id)
);

show tables;
desc clientes;
select * from tbcliente;
