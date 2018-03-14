<!DOCTYPE html>
<html lang="en">
<head>
	<title>Primeiro Login Code && Play</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

	<script type="text/javascript">

	function validarSenha(form){
	    var senha = document.formulario.senha.value;
	    var senhaRepetida = document.formulario.senha2.value;
	    if (senha != senhaRepetida){
	        alert("As senhas não conferem. Repita a senha corretamente!");
	        document.formulario.passwd2.focus();
	        return false;
	    }
	    if (senha.length < 8 || senha.length > 32) {
	    	alert("As senhas estão abaixo ou acima do limite de caracteres! Senhas de 8 até 32 caracteres!");
	        document.formulario.passwd2.focus();
	        return false;
	    }
	    if (document.formulario.email.value == "" || document.formulario.email.value.indexOf('@')==-1 || document.formulario.email.value.indexOf('.')==-1 ){
	    	alert ("Preencha corretamente o campo email!");
	    	document.formulario.email.focus();
	    	return false;
	    }
}
	</script>
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" name="formulario" onsubmit="return validarSenha();" action="/aluno/primeiroLogin/atualiza.php" method="POST">
				<span class="contact100-form-title">
					Primeiro Login Code && Play!
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Digite Seu Nome</span>
					<input class="input100" required="required" type="text" name="nome" placeholder="Enter your name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Digite Seu Email</span>
					<input class="input100" required="required" type="text" name="email" placeholder="Enter your email addess">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid Password is required: The password must be a minimum of 8 characters and a maximum of 32 characters, which must be at least one number and one uppercase and lowercase letter.">
					<span class="label-input100">Digite Sua Senha</span>
					<input class="input100" type="password" required="required" name="senha" id="senha" placeholder="********"
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" minlength="8" maxlength="32" title="A senha deve ter no mínimo 8 caracteres e no máximo 32 caracteres, que sejam de pelo menos um número e uma letra maiúscula e minúscula.">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Valid Password is required: ">
					<span class="label-input100">Repita Sua Senhha</span>
					<input type="password" required="required" class="input100" id="senha2" name="senha2" placeholder="********">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type="submit">
							<span>
								Atualizar dados
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});


	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
