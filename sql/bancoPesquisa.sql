drop database Codeplay;

create database Codeplay;

use Codeplay;


create table Professor (
id int AUTO_INCREMENT,
matricula varchar(20),
nome varchar(50),
email varchar(40),
senha varchar(100),
situacao tinyint(1),
data_Alteracao timestamp default current_timestamp,
primary key(id)
);

create table Aluno (
id int AUTO_INCREMENT,
id_turma int,
id_professor int,
matricula varchar(20),
nome varchar(50),
email varchar(40),
senha varchar(100),
situacao tinyint(1),
pontuacao int,
nivel tinyint(1),
data_Alteracao timestamp default current_timestamp,
primary key(id),
foreign key(id_professor) references Professor(id)
);

create table Assunto (
	id int,
	descricao text(10000),
	data_alteracao timestamp default current_timestamp,
	primary key(id)
);

create table Problema (
id int AUTO_INCREMENT,
desc_Problema text(10000),
id_Professor int,
id_assunto int,
classificacao char(1),
data_Alteracao timestamp default current_timestamp,
primary key(id),
foreign key (id_Professor) references Professor(id),
foreign key (id_assunto) references Assunto(id)
);
	
create table Gabarito (
id int AUTO_INCREMENT,
desc_Gabarito text(10000),
id_Problema int,
data_Alteracao timestamp default current_timestamp,
primary key (id),
foreign key (id_Problema) references Problema (id)
);

create table Resposta_Aluno (
id int AUTO_INCREMENT,
desc_resposta text(10000),
id_Aluno int,
id_Problema int,
data_Alteracao timestamp default current_timestamp,
primary key (id),
foreign key (id_Aluno) references Aluno (id),
foreign key (id_Problema) references Problema(id)
);

create table Atividade_Turma (
id int AUTO_INCREMENT,
id_Atividade int,
id_Turma int,
data_limite date,
primary key (id)
);


create table Atividade (
id int AUTO_INCREMENT,
desc_Atividade text(50000),
data_Alteracao timestamp default current_timestamp,
id_Professor int,
primary key (id),
foreign key (id_Professor) references Professor(id)
);

create table Atividade_Turma_Respondida(
	id_Atividade_Turma int,
	id_Aluno int,
	foreign key (id_Atividade_Turma) references Atividade_Turma(id),
	foreign key (id_Aluno) references Aluno(id)
);

create table Problema_Atividade_Respondido(
	id_Atividade int,
	id_Aluno int,
	id_Problema int,
	foreign key (id_Atividade) references Atividade(id),
	foreign key (id_Aluno) references Aluno(id),
	foreign key (id_Problema) references Problema(id)
);


create table Problema_Atividade(
id_atividade int,
id_problema int,
foreign key (id_atividade) references Atividade(id),
foreign key (id_problema) references Problema(id)
);

create table Turma (
id int AUTO_INCREMENT,
id_Professor int,
desc_Turma varchar(200),
data_Alteracao timestamp default current_timestamp,
primary key (id),
foreign key (id_Professor) references Professor (id)
);

create table Aluno_Turma(
	id_aluno int,
	id_turma int,
	foreign key (id_aluno) references Aluno(id),
	foreign key (id_turma) references Turma(id)
);

create table Resposta_Aluno_Problema_Atividade (
	id int AUTO_INCREMENT,
	desc_resposta text(10000),
	correto tinyint(1),
	id_Aluno int,
	id_Problema int,
	id_Atividade int,
	data_Alteracao timestamp default current_timestamp,
	primary key (id),
	foreign key (id_Aluno) references Aluno (id),
	foreign key (id_Problema) references Problema(id),
	foreign key (id_Atividade) references Atividade(id)
);