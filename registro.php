<?php
session_start();
include('inc/conectar.php');

include('inc/recaptchalib.php');

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['csenha'], $_POST['cpf'], $_POST['telefone'], $_POST['endereco'], $_POST['foto'], $_POST['data']) &&  $_POST['senha'] == $_POST['csenha']){
		
		
		
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$csenha = $_POST['csenha'];
	$cpf = $_POST['cpf'];
	$telefone = $_POST['telefone'];
	$endereco = $_POST['endereco'];
	$data = $_POST['data'];
	$destino=  $_POST['foto'];




$custo = '08';
$salt = 'HjU1di12HbfDub54Sjbda2';

$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');


	$sql = "INSERT INTO usuario 
			VALUES (NULL, '". $nome ."', '". $email ."', '". $hash ."', '". $cpf ."', '". $telefone ."', '". $data ."', '". $endereco ."', '". $destino ."','". 0 ."', '". 1 ."', '". 0 ."')";
		if ($result=$mysqli->query($sql)) {
			$_SESSION['usuario']=$_POST['email'];
			header("location:perfil.php");
		}
			

}
?>

<!-- HEAD -->
<?php include('inc/head.php');?>

<!-- TÍTULO DA PÁGINA -->
<title>Trampo Centro - Sobre Nós</title>

<!-- NAVBAR -->
<?php include('inc/navbar.php');?>

<!-- CONTEÚDO DA PÁGINA -->
<div id="tc-index">
	<section class="parallax-registro">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center flip-in-ver-right">
					<form method="post" enctype="multpart/form-data">
						<h2 class="h2-login">Registro</h2>

						<h6 class="text-light h6-adjust-registro">Nome</h6>
						<i class="fa fa-user-plus text-light"></i>
						<input type="text" name="nome" class="input-registro" placeholder="Insira seu nome" required><br>
						<small class="text-muted">ex. Elton Soares</small>


						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Email</h6>
						<i class="fa fa-envelope text-light"></i>
						<input type="email" name="email" class="input-registro" placeholder="Insira seu Email" required><br>
						<small class="text-muted">ex. eltonsoares@email.com</small>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Senha</h6>
						<i class="fa fa-lock text-light"></i>
						<input type="password" name="senha" class="input-registro" placeholder="Insira sua senha" required>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Confirmar Senha</h6>
						<i class="fa fa-lock text-light"></i>
						<input type="password" name="csenha" class="input-registro" placeholder="Confirme sua senha" required>
						<br><br>

				</div>
				<div class="col-sm-6 text-center flip-in-ver-left">
						<h2 class="h2-login">Informações</h2>

						<h6 class="text-light h6-adjust-registro">CPF</h6>
						<i class="fa fa-address-card text-light"></i>
						<input type="text" class="cpf-mask input-registro" id="example-input-2" placeholder="Insira seu CPF" maxlength="11" autocomplete="off" data-mask="000.000.000-00" name="cpf" required><br>
						<small class="text-muted">ex. 99966633311</small>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Celular</h6>
        				<i class="fa fa-mobile-alt text-light"></i>
						<input type="text" class="input-registro" id="phone-input" name="telefone" placeholder="Insira seu número de celular" required><br>
 						<small class="text-muted">ex. (99) 99999-9999</small>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Endereço</h6>
						<i class="fa fa-map-marked-alt text-light"></i>
						<input type="text" name="endereco" class="input-registro" placeholder="Insira sua cidade/rua/número da casa" required><br>
						<small class="text-muted">ex. Eltolandia, Rua Eltano - 212</small>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Foto</h6>
						<i class="fa fa-file-image text-light"></i>
						
						<input type="text" name="foto" class=""> Escolha sua foto
						</span>

						<br>
						<br>

						<h6 class="text-light h6-adjust-registro">Data de Nascimento</h6>
						<i class="fa fa-birthday-cake text-light"></i>
						<input type="date" class="input-registro" placeholder="Ex.: dd/mm/aaaa" data-mask="00/00/0000" maxlength="10" autocomplete="off" name="data" required>
						<br>
						<br>

						<center>
						<div class="g-recaptcha" data-sitekey="6LdSRLEZAAAAABe2CqORPriywRIEaHMdezMYvAHj"></div>
						</center>
						<script src="https://www.google.com/recaptcha/api.js?hl=pt-BR"></script>
						<?php 
							$secret = "6LdSRLEZAAAAAKLVqe9ygJNC-McCr9TUaCoi4vpC";
							$response = null;
							$reCaptcha = new reCaptcha($secret);
							if(isset($_POST['g-recaptcha-response'])){
								$response = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'], $_POST['g-recaptcha-response']);
							}
							if($response != null && $response->success){
								echo "Prosseguir";
							}
						?>
						
						<br>
						<br>
						<input type="radio" name="" required><label class="text-light label-registro">Li e concordo com os</label> <a href="policies.php" class="tc-animation-registro" id="a-registro">Termos de Uso</a>
						<br>
						<br>
						<input type="submit" name="enviar" class="btn btn-outline-success" value="Cadastrar">
						<br><br>
					</form>				
				</div>
	    	</div>
		</div>
	</section>
</div>
	
<!-- SCRIPTS -->
<?php include('inc/scripts.php');?>

<!-- FOOTER -->
<?php include('inc/footer.php');?>

<script type="text/javascript">
	
$('#phone').mask('(999) 999-9999');

</script>