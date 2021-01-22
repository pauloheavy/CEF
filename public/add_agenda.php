<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php require_once("../includes/validations.php"); ?>
<?php include_once("../includes/header.php"); ?>


<?php
	if (isset($_POST['submit'])) {
		// formulario foi submetido
			//validações 
		$campos_requeridos = array("nome", "telefone", "celular", "email", "observacoes");
		validate_presences($campos_requeridos);

		$campos_limitados = array("nome" => 60);
		validate_max_lengths($campos_limitados);

		if(empty($errors)) {
					
		$nome = mysql_prep($_POST["nome"]);
		$telefone = $_POST["telefone"];
		$celular = $_POST["celular"];
		$email = $_POST["email"];
		$obser = $_POST["observacoes"];
		//ecesando o banco		
		$query = "INSERT INTO agenda (";
		$query .= " nome, telefone, celular, email, observacoes";
		$query .= ") VALUES (";
		$query .= " '{$nome}', '{$telefone}', '{$celular}', '{$email}', '{$obser}'";
		$query .= ")";
		$result = mysqli_query($conexao, $query);

		if ($result) {
				//sucesso
			$_SESSION["mensagem"] = "Agenda criada com sucesso!";
			redirect_to("content.php?categoria=" . urlencode($categoria_atual["id"]));
		} else {
				//falhou
			$_SESSION["mensagem"] = "A agenda não pode ser  criada.";
			redirect_to("agenda.php");
		}
		}
		 
		 
	} 
?>
<div id="main">
		<article>
	<div id="page">
			<div><?php echo mensagem();?></div>
		 	
					
			<h2 style="color: blue;">Agenda:</h2>
				
		<div class="search">
	 
	    <form action="add_agenda.php" method="post">
		<p>Nome: <input type="text" name="nome" size="60" maxlength="auto" width="auto" value=""></p><br />
		<p>Telefone: <input type="text" name="telefone" size="20" maxlength="auto" width="auto" value="">
		  Celular: <input type="text" name="celular" size="20" value=""></p><br />
		<p>E-mail: <input type="text" name="email" size="60" value=""></p><br>
		<p>Observações:</p><p><textarea name="observacoes" rows="20" cols="80"></textarea></p>
		
		
   
	<div class="editar">
		<input type="submit" name="submit" value="Cadastrar">
		
		&nbsp &nbsp<a href="search.php">Voltar</a>
		</div><br>
		</form><br>
			</article>
			<?php echo form_errors($errors); ?>
		</div>	

	</div>		

</div>

	
<?php if (isset($conexao)) { mysqli_close($conexao); } ?>

<?php include_once("../includes/footer.php"); ?>
</body>