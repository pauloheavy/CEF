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
		$campos_requeridos = array("password");
		validate_presences($campos_requeridos);

		$campos_limitados = array("password" => 45);
		validate_max_lengths($campos_limitados);
		
		if(empty($errors)) {							
		
		// Atualizar usuarios
		$id = $_GET["id"];
		$password = encript_password($_POST["password"]);
				
		//ecesando o banco		
		$query = "UPDATE users SET ";
		$query .= "password = '{$password}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
	 	$result = mysqli_query($conexao, $query);
		
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "Senha atualizada com sucesso.";
			redirect_to("alter_senha.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "A senha não pode ser atualizada.";
			
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
		<h2 style="margin-left: 0em; color: #2E2EFE;">Editar senha usuário:&nbsp<?php echo htmlentities($usuario["name"])?></h2>
		<form action="edit_senha_user.php?id=<?php echo $_SESSION["usuario_id"];?>" method="post">
			
			<p>Informe a nova senha:
				<input style="margin-left: 0.1em;" type="password" name="password" size="35" value="" />
			</p>
			   Nivel de acesso:			   			
			</p>
			<b><?php echo $_SESSION["user_nivel"];
			  ?></b>
			</label></p><br>
			<p><input type="submit" name="submit" value="Salvar">&nbsp
			<a href="alter_senha.php">Cancelar</a></p>

		</form>
		
		<div class="mensage"><?php echo mensagem();?></div>
	</div>
		<?php echo mensagem(); ?>
		<?php echo form_errors($errors); ?>

		</div>
	</div>

<?php include_once("../includes/footer.php"); ?>


