use Codeplay;

-- Cadastrando assuntos
INSERT INTO `Assunto` VALUES (1,'Variáveis','2018-05-25 18:37:17'),(2,'Estruturas de seleção','2018-05-25 18:37:17'),(3,'Estruturas de repetição','2018-05-25 18:37:17');

insert into Assunto (id, descricao) values (1, 'Variáveis');
insert into Assunto (id, descricao) values (2, 'Estruturas de seleção');
insert into Assunto (id, descricao) values (3, 'Estruturas de repetição');
	
-- Cadastrando professor
insert into Professor (matricula, nome, email, senha, situacao) values ('XXX1', 'Francisco Junior', 'chico@gmail.com', PASSWORD('1234'), 1);



