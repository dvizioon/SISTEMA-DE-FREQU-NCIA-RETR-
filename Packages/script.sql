create database sistema_frequencia_retro;
use sistema_frequencia_retro;

create table professor(
id int not null auto_increment primary key,
codigo varchar (50) not null,
senha varchar(50) not null,
confirma_Senha varchar(60)not null
);

create table dados_aluno(
codigo_aluno int not null auto_increment primary key,
Nome varchar (225) not null,
data_nac varchar (225) not null,
Cpf varchar (225) not null,
Curso_scn varchar (225) not null
);

create table frequencia_aluno(
id int not null auto_increment primary key,
Nome varchar (225) not null,
Cpf varchar (225) not null
);


create table frequencia_dados(
id int not null auto_increment primary key,
nome varchar (225) not null,
Cpf varchar (225) not null,
dataTm varchar (225) default(current_timestamp),
frq_aluno varchar (225) not null
);

INSERT INTO professor(codigo, senha,confirma_Senha)  VALUES('23012004',md5('12345678'),'12345678');