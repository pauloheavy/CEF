<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php encontrar_pagina_selecionada(); ?>
 	<div id="main">
		<div id="navigation">
			<?php echo menu($categoria_atual, $pagina_atual); ?>
		</div>
		<div id="page">

		<div class="mensage"><?php echo mensagem();?></div>		  		  
		  <h2>Criar Página</h2>

		  <form action="create_pagina.php?categoria=<?php echo urlencode($categoria_atual["id"]); ?>" method="post">
		  	 <p>Nome:
		  	 	<input type="text" name="nome" value="">
		  	 </p>

		  <p>Ordem:
		  	<select name="ordem">
		  		<?php 
		  			$paginas = encontrar_paginas($categoria_atual["id"]);
		  			$total_paginas = mysqli_num_rows($paginas);
			  			for ($i=1; $i <= ($total_paginas + 1); $i++) { 
		  				echo "<option value=\"{$i}\">{$i}</option>";
		  	
		  			}	
		  		?>
		  		
		  	</select>
		  </p>

		  <p>Publicado:
		  	<input type="radio" name="publicado" value="0"/> Não
		  	<input type="radio" name="publicado" value="1"/> Sim
		  </p>
		  	
		  	
		  	<p>Conteúdo:<br />
		  	 	<textarea name="conteudo" rows="20" cols="80"></textarea>
		  	 </p>
		  	

		  <input type="submit" name="submit" value="Criar Pagina">				
		</form>
		<br>
			<a href="content.php">Cancelar</a>			
		
		<div id="error"><?php $errors = errors();	  
		  echo form_errors($errors);
		  ?></div>

		
		</div>
	</div>

<?php include_once("../includes/footer.php"); ?>


