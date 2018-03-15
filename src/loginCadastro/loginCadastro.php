<!DOCTYPE html>
<html >
  <head>
  <meta charset="UTF-8">
  <title> Login </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./Login_V1_files/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./Login_V1_files/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./Login_V1_files/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./Login_V1_files/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./Login_V1_files/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="./Login_V1_files/util.css">
  <link rel="stylesheet" type="text/css" href="./Login_V1_files/main.css">
<!--===============================================================================================-->
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

        
  </script>
  <?php

    if (isset($_SESSION["USUARIO_LOGADO"])) {
      header("Location: /index.php");
    }
    include ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  ?>
   
  </head>

  <body>

    <div class="container">
      <div class="wrap-login100">
        <div  class="login100-pic js-tilt" data-tilt="" style="transform: perspective(300px) rotateX(7.8deg) rotateY(-3.01deg) scale3d(1.1, 1.1, 1.1); will-change: transform; transition: 400ms cubic-bezier(0.03, 0.98, 0.52, 0.99);">
          <img src="/img/blockly/image.jpg" alt="IMG">
        </div>

        <form id="idLogin" action="/loginCadastro/verificaLogin.php" method="POST">
          <span class="login100-form-title">
            Acesse sua conta
          </span>

          <div class="wrap-input100">
            <input class="input100" type="text" name="email" required placeholder="Digite sua matricula ou seu Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100">
            <input class="input100" type="password" name="senha" required placeholder="*******">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <div align="center">
          <label> Professor</label>
          <input type="radio" name="tipoUsuario" required value="1">
          <label>Aluno</label>
          <input type="radio" name="tipoUsuario" value="0">
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
          </div>

          <div class="text-center p-t-136">
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

            <div class="wrap-input100">
              <input class="input100" type="text" required placeholder="20142TIJGXXXX" minlength="13" maxlength="13" name="matricula">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              </span>
            </div>

            <div class="wrap-input100">
              <input class="input100" type="text" required placeholder="Josisvardol" name="nome">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-address-card-o" aria-hidden="true"></i>
              </span>
            </div>
            
            <div class="wrap-input100">
              <input class="input100" type="password" name="senha" required placeholder="******">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>


            <div class="wrap-input100">
              <input class="input100" type="password" required id="confirmaSenha" placeholder="*******">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="exemplo@exemplo.com">
              <input class="input100" type="email" required id="email" placeholder="fulano@gmail.com" name="email">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>

            <div class="container-login100-form-btn">
              <button type="submit" class="login100-form-btn">
                Cadastrar
              </button>
            </div>

            <div class="text-center p-t-136">
              <button class="txt2" onclick="ocultaCadastro('idLogin','idCadastro')">
                Entre na sua conta
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true" ></i>
              </button>
            </div>
          </form>
      </div>
    </div>
          




<!--===============================================================================================-->
  <script type="text/javascript" async="" src="./Login_V1_files/analytics.js"></script><script src="./Login_V1_files/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="./Login_V1_files/popper.js"></script>
  <script src="./Login_V1_files/bootstrap.min.js"></script>
<!--===============================================================================================-->
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="../js/index.js"></script>
<!-- ============= -->
  <script src="./Login_V1_files/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="./Login_V1_files/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="./Login_V1_files/js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
<script src="./Login_V1_files/main.js"></script>
  </body>
</html>
