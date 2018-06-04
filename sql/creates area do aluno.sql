-- Tabelas referentes a Area do Aluno
create table AreaAluno (
 id int AUTO_INCREMENT,
 id_aluno int,
 data_Alteracao timestamp default current_timestamp,
 primary key (id),
 foreign key (id_aluno) references Aluno (id)
);

create table BlocoArea (
 id int AUTO_INCREMENT,
 id_areaaluno int,
 id_assunto int,
 data_Alteracao timestamp default current_timestamp,
 primary key (id),
 foreign key (id_areaaluno) references AreaAluno(id),
 foreign key (id_assunto) references Assunto(id)
);

create table SituacaoItemBloco (
 id int AUTO_INCREMENT,
 status int default 0,
 quantidade_tentativas int default 0,
 pontuacao_possivel int default 0,
 pontuacao_obtida int default 0,
 feedback text(1000),
 data_ultima_submissao timestamp NULL,
 data_Alteracao timestamp default current_timestamp,
 primary key (id)
);

-- alter table SituacaoItemBloco add column feedback text(1000);


create table ItemBloco (
 id int AUTO_INCREMENT,
 id_bloco int,
 id_problema int,
 ordem int, 
 id_situacaoitem int,
 data_Alteracao timestamp default current_timestamp,
 primary key (id),
 foreign key (id_bloco) references BlocoArea(id),
 foreign key (id_problema) references Problema(id),
 foreign key (id_situacaoitem) references SituacaoItemBloco(id)
);

