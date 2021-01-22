<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php //confirmar_login() ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
if (isset($_POST['submit'])) {
		# code...
		$campos_requeridos = array("name", "password" );
		validate_presences($campos_requeridos);

		$campos_limitados = array("name" => 45);
		validate_max_lengths($campos_limitados);
	
		if (empty($errors)) {
			//criar usuário no banco de dados
			$name = mysql_prep($_POST["name"]);
			$password = encript_password($_POST["password"]);
			$nivel = $_POST["nivel"];


			$query  = "INSERT INTO users (";
			$query .= " name, password, nivel";
			$query .= ") VALUES (";
			$query .= " '{$name}', '{$password}', '{$nivel}'";
			$query .= ")";
			$resultado = mysqli_query($conexao, $query);

			if ($resultado) {
			 	# code...
			 	$_SESSION["mensagem"] = "Usuário criado com sucesso";
			 	redirect_to("content.php");
			 } else  {
			 	$_SESSION["mensagem"] = "Criação de usuário falhou";
			 }

		}


	}

?>
<?php //$context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<div id="main">
	<div id="navigation">
		&nbsp;		
	</div>
	<div id="page">
		<div id="adduser">
		<h2 style="color: blue; margin-left: -1%;">Create Usuário</h2>
		<form action="add_user.php" method="post">
			<p>Usuário:<br>
				<input type="text" name="name" size="35" value="" />
			</p>
			<p>Senha:<br>
				<input type="password" name="password" size="35" value="" />
			</p>
			<p>
			   Nivel de acesso:			   			
			</p>
			<label>
				<input type="radio" name="nivel" value="usuario" checked>
				Usuário
			</label>
			<label>
				<input type="radio" name="nivel" value="suporte">
				Suporte
			</label>
			<label>
				<input type="radio" name="nivel" value="admin">
				Admin
			</label>

			
		<p><input style="border-radius: 5px;" type="submit" name="submit" value="Criar Usuário">
		<a href="maneger_users.php">Cancelar</a><br><br></p>
		</form>
		</div>
		<br>
		<?php echo mensagem(); ?>
		<?php echo form_errors($errors); ?>
	</div>
</div>


<?php include_once("../includes/footer.php"); ?>


