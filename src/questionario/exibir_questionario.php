<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Code && Play - Questionário</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">

  </script>
  </head>
  <body>
    <br><br><br>
    <div class="table-users">
      <div class="header">Questionário Inicial</div>
        <form name="formulario" onsubmit="return validarSenha();" action="/questionario/salvar.php" method="POST">
          
        <table cellspacing="0">
          <tr>
            <th>Nova senha: </th>
            <th>
          <input type="password" required="required" name="senha" id="senha" placeholder="********"
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" maxlength="32" title="A senha deve ter no mínimo 8 caracteres e no máximo 32 caracteres, que sejam de pelo menos um número e uma letra maiúscula e minúscula.">
            </th>
          </tr>
          <tr>
            <th>Redigite a senha: </th>
            <th>
          <input type="password" required="required" name="senha2" id="senha2" placeholder="********">
            </th>
          </tr>
          <tr>
            <td colspan="2">
              <button class="contact100-form-btn" type="submit" onclick="return validarSenha();">
                Atualizar dados
            </button>
          </td>
        </tr>
        </table>
      </div>
  </body>
</html>
