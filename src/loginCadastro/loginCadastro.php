<?php
  include ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
?>
<!DOCTYPE html>
<html >
  <head>
  <meta charset="UTF-8">
  <title>Code && Play - Login </title>
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">

  <script type="text/javascript">

      
    function validaCadastro(){

      var email = document.formulario.email.value;
      var senha = document.getElementById("senha");
      var confirmaSenha = document.getElementById("confirmaSenha");

      if (email == "" || email.indexOf('@')==-1 || email.indexOf('.')==-1 ){
              alert ("Preencha corretamente o campo email! \n example@example.com");
              document.formulario.email.focus();
              return false;
            }

       if (senha.value > 8 || senha.value > 32) {
        alert("O campo 'senha' deve ser preenchido com no mínimo 8 e no máximo 32 catacters.");
        senha.focus();
        return false;
       }else if(senha.value != confirmaSenha.value) {
         alert("Senhas diferentes, por favor insira as senha iguais!");
         confirmaSenha.focus();
         return false;
       }else{
        return true;
       }
        
    }


  function ocultaLogin(base, final){
    ocultar=document.getElementById(base);
    mostrar=document.getElementById(final);
    ocultar.style.display="none";
    mostrar.style.display="";

  }

    function ocultaCadastro(final, base){
    mostrar=document.getElementById(base);
    ocultar=document.getElementById(final);
    mostrar.style.display="none";
    ocultar.style.display="";

  }
   (function () {

          var limite = 7;
          
          function limitaInput(input) {
              if (input.value.length > limite) {
                  input.value = input.value.substr(0, limite);
                  alert("A mátricula só vai até 7 caracteres.");
              }
          }
          
          $(document).on("propertychange change keyup", "#matricula", function () {
              if (this.timerLimitInput) {
                 clearTimeout(this.timer);
              }
          
              this.timerLimitInput = setTimeout(limitaInput, 7, this);//Timeout para evitar conflitos
          });

        })();
        
  </script>
  </head>
  <body>
    <?php if (isset($_GET["msg"])): ?>
      <center>
      <h2><?=$_GET["msg"];?></h2>
    </center>
      
    <?php endif ?>
    
    <div class="container">
      <div class="wrap-login100">
        <div  class="login100-pic js-tilt" data-tilt="" style="transform: perspective(300px) rotateX(7.8deg) rotateY(-3.01deg) scale3d(1.1, 1.1, 1.1); will-change: transform; transition: 400ms cubic-bezier(0.03, 0.98, 0.52, 0.99);">
          <img src="/img/blockly/image.jpg" alt="IMG">
        </div>
          
        <form id="idLogin" action="/loginCadastro/loga.php" method="POST">
          <span class="login100-form-title">
            Acesse sua conta
          </span>
         
            
          
          <label>Email</label>
          <div class="wrap-input100">
            <input class="input100" type="text" name="email" required placeholder="Digite seu Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <label>Senha</label>
          <div class="wrap-input100">
            <input class="input100" type="password" name="senha" required placeholder="*******">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <div align="center">
	         
	          <label>
	          	<input type="radio" name="tipoUsuario" required value="1">
	          </label>
	          <span>Professor</span>
	          &emsp;&emsp;&emsp;
	          <label>
	          	<input type="radio" name="tipoUsuario" value="0">
	          </label>
	          <span>Aluno</span>
          </div>
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Esqueci
            </span>
            <a class="txt2" href="#">
              Senha
            </a>
            <br>
            <button  class="txt2" onclick="ocultaLogin('idLogin','idCadastro')">
              Crie sua conta
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true" ></i>
            </button>
          </div>
        </form>
        <form id="idCadastro" style="display:none" onsubmit="return validaCadastro();" name="formulario" action="/loginCadastro/inserindo_dados_banco.php" method="POST">
            <span class="login100-form-title">
              Crie uma conta
            </span>

            <label>Mátricula</label>
            <div class="wrap-input100">
              <input onkeyup="limitarMatricula(this)" class="input100" type="text" required placeholder="Digite sua mátricula" minlength="7" maxlength="8" name="matricula" id="matricula">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              </span>
            </div>

            <label>Nome</label>
            <div class="wrap-input100">
              <input class="input100" type="text" required placeholder="Digite seu nome" name="nome">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-address-card-o" aria-hidden="true"></i>
              </span>
            </div>
            <label>Senha</label>
            <div class="wrap-input100">
              <input class="input100" type="password" name="senha" required placeholder="Digite sua senha">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>


            <label>Confirmar Senha</label>
            <div class="wrap-input100">
              <input class="input100" type="password" required id="confirmaSenha" placeholder="Confirmar senha">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>
            <label>Email</label>
            <div class="wrap-input100 validate-input" data-validate="exemplo@exemplo.com">
              <input class="input100" type="email" required id="email" placeholder="Digite seu e-mail" name="email">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>

            <div class="container-login100-form-btn">
              <button type="submit" class="login100-form-btn">
                Cadastrar
              </button>
              <br>
              <button class="txt2" onclick="ocultaCadastro('idLogin','idCadastro')">
                Entre na sua conta
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true" ></i>
              </button>
            </div>
          </form>
      </div>
    </div>
  </body>
</html>
