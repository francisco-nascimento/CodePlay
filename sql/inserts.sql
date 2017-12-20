insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0001', 'Oseias Ferreira', 'oseias@gmail.com', '1234', 1, 1500, 'Intermediario');
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0002', 'Jowesley Batista', 'jojo@gmail.com', '5678', 1, 1000, 'Iniciante');
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0003', 'Avila Ferreira', 'alla@gmail.com', '9101', 1, 1200, 'Intermediario');
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0004', 'Dani Silva', 'silva@gmail.com', '1121', 1, 5000, 'Avançado');
insert into Aluno (matricula, nome, email, senha, situacao, pontuacao, nivel) values ('0005', 'Wesley Silva', 'wesley@gmail.com', '3141', 1, 1400, 'Intermediario');

insert into Professor (matricula, nome, email, senha, situacao) values ('XXX1', 'Francisco Junior', 'chico@gmail.com', '1234', 1);
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX2', 'Jonas Junior', 'jj@gmail.com', '5678', 1);
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX3', 'Francisca Junior', 'chica@gmail.com', '9101', 1);
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX4', 'Honda Siviki', 'carro@gmail.com', '11213', 1);
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX5', 'Quem Junior', 'perguntou@gmail.com', '2014', 1);

insert into Problema (desc_Problema, desc_Gabarito, id_Professor, classificacao) values ("Imprima o numero 1", "print 1", 1, "fácil");
insert into Problema (desc_Problema, desc_Gabarito, id_Professor, classificacao) values ("Imprima o numero 2", "print 2", 2, "fácil");
insert into Problema (desc_Problema, desc_Gabarito, id_Professor, classificacao) values ("Imprima o numero 3", "print 3", 3, "média");
insert into Problema (desc_Problema, desc_Gabarito, id_Professor, classificacao) values ("Imprima o numero 4", "print 4", 4, "média");
insert into Problema (desc_Problema, desc_Gabarito, id_Professor, classificacao) values ("Imprima o numero 5", "print 5", 5, "difícil");

insert into Resposta_Aluno (desc_Resposta_Aluno,id_Aluno) values ("print 1", 1);
insert into Resposta_Aluno (desc_Resposta_Aluno,id_Aluno) values ("print 1", 2);
insert into Resposta_Aluno (desc_Resposta_Aluno,id_Aluno) values ("print 1", 3);
insert into Resposta_Aluno (desc_Resposta_Aluno,id_Aluno) values ("print 1", 4);
insert into Resposta_Aluno (desc_Resposta_Aluno,id_Aluno) values ("print 1", 5);



