<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
if (isset($_POST['submit'])) {
		# code...
		$campos_requeridos = array("usuario", "senha" );
		validate_presences($campos_requeridos);

		$campos_limitados = array("usuario" => 30);
		validate_max_lengths($campos_limitados);
	
		if (empty($errors)) {
			//criar usuário no banco de dados
			$usuario = mysql_prep($_POST["usuario"]);
			$senha = encript_password($_POST["senha"]);

			$query  = "INSERT INTO usuarios (";
			$query .= " usuario, senha";
			$query .= ") VALUES (";
			$query .= " '{$usuario}', '{$senha}'";
			$query .= ")";
			$resultado = mysqli_query($conexao, $query);

			if ($resultado) {
			 	# code...
			 	$_SESSION["mensagem"] = "Usuário criado com sucesso";
			 	redirect_to("users.php");
			 } else  {
			 	$_SESSION["mensagem"] = "Criação de usuário falhou";
			 }

		}


	}

?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<div id="main">
	<div id="navigation">
		&nbsp;		
	</div>
	<div id="page">
		
		<h2>Create Usuário</h2>
		<form action="new_user.php" method="post">
			<p>Usuário:
				<input type="text" name="usuario" value="" />
			</p>
			<p>Senha:
				<input type="password" name="senha" value="" />
			</p>
			<input type="submit" name="submit" value="Criar Usuário">
		</form>
		<br>
		<a href="users.php">Cancelar</a><br><br>
		<?php echo mensagem(); ?>
		<?php echo form_errors($errors); ?>
	</div>
</div>


<?php include_once("../includes/footer.php"); ?>


