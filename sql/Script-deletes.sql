delete from ItemBloco where id > 0;
delete from SituacaoItemBloco where id > 0;
delete from BlocoArea where id > 0;
delete from AreaAluno where id > 0;

delete from Resposta_Aluno_Problema_Atividade where id > 0;
delete from Resposta_Aluno where id > 0;

delete from Aluno where id_turma = 9;
delete from Turma where id > 0;

delete FROM ItemBloco where id_bloco in (select id from BlocoArea where id_areaaluno in (select id from AreaAluno where id_aluno in (select id from Aluno where id_turma = 9)));
delete from BlocoArea where id_areaaluno in (select id from AreaAluno where id_aluno in (select id from Aluno where id_turma = 9));
delete from AreaAluno where id_aluno in (select id from Aluno where id_turma = 9);
delete from Aluno where id_turma = 9;
