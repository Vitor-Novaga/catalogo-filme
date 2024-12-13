create database filmesdb;

use filmesdb;

create table filme (
	id int auto_increment primary key,
    nome varchar(255) not null,
    ano int not null,
    descricao text
)