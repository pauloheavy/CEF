<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php encontrar_pagina_selecionada(); ?>

<?php
	if (!$pagina_atual) {
		redirect_to("content.php"); 
	}
?>


<?php
	if (isset($_POST['submit'])) {
		// formulario foi submetido
		$id = $pagina_atual["id"];
		$nome = mysql_prep($_POST["nome"]);
		$ordem = $_POST["ordem"];
		$publicado = $_POST["publicado"];
		$conteudo = mysql_prep($_POST["conteudo"]);

		$campos_requeridos = array("nome", "ordem", "publicado", "conteudo");
		validate_presences($campos_requeridos);

		$campos_limitados = array("nome" => 45);
		validate_max_lengths($campos_limitados);
		
		if(empty($errors)) {							
		
		
		//ecesando o banco		
		$query = "UPDATE paginas SET ";
		$query .= "nome = '{$nome}', "; 
		$query .= "ordem = {$ordem}, "; 
		$query .= "publicado = {$publicado}, "; 
		$query .= "conteudo = '{$conteudo}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
	 		$result = mysqli_query($conexao, $query);
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "A página Foi Atualizada.";
			redirect_to("edit_category.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "A página não Foi Atualizada.";
			
		}
	} 
}else {
		// formulario não foi submetido
		
	}
?>

<?php include_once("../includes/header.php"); ?>

 	<div id="main">
		<div id="navigation">
			<?php echo menu($categoria_atual, $pagina_atual); ?>
		</div>
		<div id="page">

		<div class="mensage"><?php echo mensagem();?></div>

		  <h2>Editar Página: <?php echo htmlentities($pagina_atual["nome"]); ?></h2>

		  <form action="edit_page.php?pagina=<?php echo urlencode($pagina_atual["id"]); ?>" method="post">
		  	 <p>Nome:
		  	 	<input type="text" name="nome" value="<?php echo htmlentities($pagina_atual["nome"]);?>">
		  	 </p>

		  <p>Ordem:
		  	<select name="ordem">
		  		<?php 
		  			$paginas = encontrar_paginas($pagina_atual["categoria_id"], false);
		  			$total_paginas = mysqli_num_rows($paginas);
			  			for ($i=1; $i <= $total_paginas; $i++) { 
		  				echo "<option value=\"{$i}\"";
		  					if ($pagina_atual["ordem"] == $i) {
		  						echo " selected";
		  					}

		  				echo ">{$i}</option>";
		  	
		  			}	
		  		?>
		  		
		  	</select>
		  </p>

		  <p>Publicado:
		  	<input type="radio" name="publicado" value="0"
		  		<?php if ($pagina_atual["publicado"] == 0) {echo "checked";} ?>
		
		  	/> Não
		  	
		  	<input type="radio" name="publicado" value="1"
		  		<?php if ($pagina_atual["publicado"] == 1) {echo "checked";} ?>
		  	/> Sim
		  </p>

		  <p>Conteúdo:<br />
		  	 	<textarea name="conteudo" rows="20" cols="80">
		  	 		<?php echo htmlentities($pagina_atual["conteudo"]);?>
		  	 	</textarea>
		  	 </p>

		  <input type="submit" name="submit" value="Editar Pagina">				
		</form>
		<br>
			<a href="content.php">Cancelar</a>		
			&nbsp;
			&nbsp;
			<a href="delete_page.php?pagina=<?php echo urlencode($pagina_atual["id"]);?>"
				onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</a>
		
		<div id="error"><?php echo form_errors($errors); ?></div>

		
		</div>
	</div>

<?php include_once("../includes/footer.php"); ?>


