<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
	if (isset($_POST['submit'])) {
		// formulario foi submetido
		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$telefone = $_POST["telefone"];
		$celular = $_POST["celular"];
		$email = $_POST["email"];
		$observa = $_POST["observacoes"];

		$campos_requeridos = array("nome", "telefone", "celular", "email", "observacoes");
		validate_presences($campos_requeridos);

		$campos_limitados = array("nome" => 60);
		validate_max_lengths($campos_limitados);
		
		if(empty($errors)) {							
				
		//ecesando o banco		
		$query = "UPDATE agenda SET ";
		$query .= "nome = '{$nome}', "; 
		$query .= "telefone = '{$telefone}', "; 
		$query .= "celular = '{$celular}', "; 
		$query .= "email = '{$email}', ";
		$query .= "observacoes = '{$observa}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
	 		$result = mysqli_query($conexao, $query);
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "A agenda foi atualizada.";
			redirect_to("content.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "A agenda não pode ser atualizada.";
			redirect_to("agenda.php");			
		}
	} 
}else {
		// formulario não foi submetido
		
	}
?>

<?php include_once("../includes/header.php"); ?>

 	<div id="main">
		<div id="navigation">
			<br />
			<small>
				<a href="admin.php">&laquo; Menu Principal</a>
			</small>
			<ul class="categories">
			<b>
			    <li>
			 	<p><li><a href="agenda.php">Agenda</a></li></p>
			 	<p><li><a href="search.php">Controle</a></li></p>
			 	<p><li><a href="agenda.php">Unidades</a></li></p>
			 	</li>
			</ul>
			<ul class="prefix">
			 	<li><a href="">Matriz</a>
			 		<ul class="submenu">	
			 			<li><a style="color: #d0d0d0;" href="">Matriz I</a></li>
			   			<li><a style="color: #d0d0d0;" href="">Matriz II</a></li>
			   			<li><a style="color: #d0d0d0;" href="">Matriz III</a></li>
			   		</ul>
			   <br />
			   	 <li><a href="">prefixo 3206</a>
						<ul class="submenu">
							<li><a style="color: #d0d0d0;" href="">3206 por faixa</a></li>
							<li><a style="color: #d0d0d0;" href="">3206 por predio</a></li>
						</ul>
			     </li>								
			    </li>			
			</ul>

		</div>
		
	</div>

<?php include_once("../includes/footer.php"); ?>


