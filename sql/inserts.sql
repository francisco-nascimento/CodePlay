--Cadastrando aluno
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0001', 'Oseias Ferreira', 'oseias@gmail.com', '1234', 1, 1500, 10);
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0002', 'Jowesley Batista', 'jojo@gmail.com', '5678', 1, 1000, 10);
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0003', 'Avila Ferreira', 'alla@gmail.com', '9101', 1, 1200, 12);
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0004', 'Dani Silva', 'silva@gmail.com', '1121', 1, 5000, 15);
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0005', 'Wesley Silva', 'wesley@gmail.com', '3141', 1, 1400, 11);
--Cadastrando professor
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX1', 'Francisco Junior', 'chico@gmail.com', '1234', 1);
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX2', 'Jonas Junior', 'jj@gmail.com', '5678', 1);
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX3', 'Francisca Junior', 'chica@gmail.com', '9101', 1);
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX4', 'Honda Siviki', 'carro@gmail.com', '11213', 1);
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX5', 'Quem Junior', 'perguntou@gmail.com', '2014', 1);
--Inserindo em Problemas(Cadastrados pelo professor)
insert into Problema (desc_Problema, id_Professor, classificacao) values ("Imprima o numero 1", 1, "F");
insert into Problema (desc_Problema,  id_Professor, classificacao) values ("Imprima o numero 2", 2, "F");
insert into Problema (desc_Problema, id_Professor, classificacao) values ("Imprima o numero 3", 3, "M");
insert into Problema (desc_Problema, id_Professor, classificacao) values ("Imprima o numero 4",  4, "M");
insert into Problema (desc_Problema, id_Professor, classificacao) values ("Imprima o numero 5",  5, "D");
--Inserindo em Gabarito(Professor)
insert into Gabarito (id_Problema, desc_Gabarito) values (1, "alert(1);");
insert into Gabarito (id_Problema, desc_Gabarito) values (2, "alert(2);");
insert into Gabarito (id_Problema, desc_Gabarito) values (3, "alert(3);");
insert into Gabarito (id_Problema, desc_Gabarito) values (4, "alert(4);");
insert into Gabarito (id_Problema, desc_Gabarito) values (5, "alert(5);");
--Inserindo em Resposta do Aluno
insert into Resposta_Aluno (desc_Resposta,id_Aluno) values ("print 1", 1);
insert into Resposta_Aluno (desc_Resposta,id_Aluno) values ("print 1", 2);
insert into Resposta_Aluno (desc_Resposta,id_Aluno) values ("print 1", 3);
insert into Resposta_Aluno (desc_Resposta,id_Aluno) values ("print 1", 4);
insert into Resposta_Aluno (desc_Resposta,id_Aluno) values ("print 1", 5);



