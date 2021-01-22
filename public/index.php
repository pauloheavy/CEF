<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php $usuario = "";  ?>

<?php 
if (isset($_POST['submit'])) {
		# code...
		$campos_requeridos = array("user", "password" );
		validate_presences($campos_requeridos);

			
		if (empty($errors)) {
			//tentar login
			$user = $_POST["user"];
			$password = $_POST["password"];

			$usuario_logado = login($user, $password);

			if ($usuario_logado) {
				$_SESSION["usuario_id"] = $usuario_logado["id"];
				$_SESSION["user"] = $usuario_logado["name"];
				$_SESSION["user_nivel"] = $usuario_logado["nivel"];
			 	redirect_to("content.php");
			 } else  {
			 	$_SESSION["mensagem"] = "Usuário ou senha invalida.";
			 }

		}


	}

?>
<?php $context = "admin";?>
<?php include_once("../includes/header_login.php"); ?>
<div id="main">
	<!--<div id="navigation">-->
		&nbsp;		
	<!--</div>-->
	<div id="page">
		<div id="login">
			<img style="margin-left: 48%; margin-right: -1em; margin-top: -2em; margin-bottom: -4em; float: all;" src="imagens/xcaixa.png" alt="home" width="37" height="33">
		<i><h2 style="margin-left: 0px; color: #0101DF;">Login:</h2></i>
		<form action="index.php" method="post">
			<p>Usuário:
				<input style="width: 100%;" type="text" placeholder="usuario" name="user" t value="" />
			</p>
			<p>Senha:
				<input style="width: 100%;" type="password" name="password" placeholder="senha" value="" />
			</p><br>
			<b><input style="width: 101.8%; background-color: #DF7401; color: #ffff; /*background: #81BEF7*/" type="submit" name="submit" value="Logar"></b>
		</form>
		</div>
		<div id="loginmess">
		<?php echo mensagem(); ?>
		<?php echo form_errors($errors); ?>
	</div>
	</div>
</div>


<?php include_once("../includes/footer.php"); ?>


