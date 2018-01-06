<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> Login </title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  
  <script type="text/javascript">


        function validaSenha(){

          var senha = document.getElementById("senha")
          var confirmaSenha = document.getElementById("confirmaSenha");

          if(senha.value != confirmaSenha.value) {
            alert("Senhas diferentes, por favor insira as senha iguais!");
              confirmaSenha.focus();
                return false;
          }

                         
        }
          
    </script>
    <?php

          if (isset($_SESSION['nome'])) {
    # code...
             header("Location: ../index.php");
          }

            include '../verifica.php';

            

    ?>
 
</head>

<body>
  <br><br>
  
<div class="container">
  <div class="info">
    <h1> Login </h1><span>Acesse sua conta</span>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
  <form action="inserindo_dados_banco.php" method="POST" onsubmit="return validaSenha();" class="register-form" >
   
  
    <label>
      Insira seu nome
    </label>
    <input type="text" required autocomplete="off" placeholder="Fulano de Tal" name="nome">
    <label>
      Insira uma senha
    </label>
    <input type="password" required autocomplete="off" id="senha" placeholder="********" name="senha">
    <label>
      Repita a senha
    </label>
    <input type="password" required autocomplete="off" id="confirmaSenha" placeholder="********">
    <label>
      Insira um email
    </label>
    <input type="text" required autocomplete="off" placeholder="fulano@gmail.com" name="email">

	<label> Professor</label>
	<input type="radio" name="tipoUsuario" required="required" value="1"> <br>
	
	<label>Aluno</label>
	<input type="radio" name="tipoUsuario" value="0"> <br>

    <button>criar</button>
    <p class="message">Já registrado? <a href="#">Sign In</a></p>
	


  </form>
  <form action="/loginCadastro/verificaLogin.php" method="POST" class="login-form">
  	<label>
       Email 
    </label>
    <input type="text" name="email" required placeholder="fulano@gmail.com">
    <label>
      Senha
    </label>
    <input type="password" name="senha" required placeholder="********"><br>

	<label> Professor</label>
	<input type="radio" name="tipoUsuario" required value="1"> <br>
	
	<label>Aluno</label>
	<input type="radio" name="tipoUsuario" value="0"> <br>

    <button>login</button>
    <p class="message">Não registrado? <a href="#">Crie uma conta</a></p>
  </form>


</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="../js/index.js"></script>

</body>
</html>
