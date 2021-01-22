<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php encontrar_usuarios();?>

<?php 
	$usuario = encontrar_usuario_por_id($_GET["id"]);

	if (!$usuario) {
		redirect_to("users.php");
	}
?>

<?php
	if (isset($_POST['submit'])) {
		// formulario foi submetido

		// Validações
		$campos_requeridos = array("user");
		validate_presences($campos_requeridos);

		$campos_limitados = array("user" => 45);
		validate_max_lengths($campos_limitados);
		
		if(empty($errors)) {							
		
		// Atualizar usuarios
		$id = $usuario["id"];
		$user = mysql_prep($_POST["user"]);
		$password = encript_password($_POST["password"]);
		$nivel = $_POST["nivel"];

		
		//ecesando o banco		
		$query = "UPDATE users SET ";
		$query .= "name = '{$user}', "; 
		$query .= "password = '{$password}', ";
		$query .= "nivel = '{$nivel}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
	 	$result = mysqli_query($conexao, $query);
		
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "Usuário atualizado com sucesso.";
			redirect_to("maneger_users.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "O usuário não pode ser atualizado.";
			
		}
	} 
}else {
		// formulario não foi submetido
		
	}
?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>

 	<div id="main">
		<div id="navigation">
		&nbsp;
		</div>
		<div id="page">
		<div id="adduser">	
		<h2 style="margin-left: 0em; color: #2E2EFE;">Editar Usuário</h2>
		<form action="edit_user.php?id=<?php echo urlencode($usuario["id"]);?>" method="post">
			<p>Usuário:
				<input type="text" name="user" size="35" value="<?php echo htmlentities($usuario["name"])?>" />
			</p>
			<p>Senha:
				<input style="margin-left: 0.6em;" type="password" name="password" size="35" value="" />
			</p>
			   Nivel de acesso:			   			
			</p>
			<p><label>
				<input type="radio" name="nivel" value="usuario" <?php if ($usuario["nivel"] == "usuario") {
					echo "checked";
				}  ?>>
				Usuário
			</label>
			<label>
				<input  type="radio" name="nivel" value="suporte" <?php if ($usuario["nivel"] == "suporte") {
					echo "checked";
				}  ?>>
				Suporte
			</label>
			<label>
				<input  type="radio" name="nivel" value="admin" <?php if ($usuario["nivel"] == "admin") {
					echo "checked";
				}  ?>>
				Admin
			</label></p><br>
			<p><input type="submit" name="submit" value="Salvar">&nbsp
			<a href="maneger_users.php">Cancelar</a></p>

		</form>
		
		<div class="mensage"><?php echo mensagem();?></div>
	</div>
		<?php echo mensagem(); ?>
		<?php echo form_errors($errors); ?>

		</div>
	</div>

<?php include_once("../includes/footer.php"); ?>


