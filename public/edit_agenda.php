<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php

if (isset($_GET['id'])) {
			$id = $_GET['id'];
		//Consulta agenda por id		 						
			$query  = "SELECT * ";
			$query .= "FROM agenda ";
			$query .= "WHERE (id='{$id}')";
			$data = mysqli_query($conexao, $query);
			$total = mysqli_num_rows($data);
				
		//tratamento dos campos vazios.		
		} if ($_GET['id'] == ""){
			$_SESSION["mensagem"] = "Por favor, Informe o CGC ou o Nome!";
					redirect_to("content.php");
		} 
?>		   
<?php 
// Tratamento das consultas invalidas.
	if ($total == 0 ) {
				$_SESSION["mensagem"] = "CGC não encontrado.";
				redirect_to("search.php");		
			} 
 ?>			
<?php include_once("../includes/header.php"); ?>

<div id="main">
		<div id="navigation">
			

		</div>
		<article>
		<div id="page">
		<?php
		//Codigo para listar ou editar as tabelas controles 
		while ($consulta = mysqli_fetch_assoc($data)) { ?>	
			<h2 style="color: blue;">Agenda:</h2>
				
		<div class="search">
	 
	    <form action="edit_agenda_apply.php" method="post">

		<p>Id: <input type="text" style="margin-left: 2px;" name="id" size="1" maxlength="auto" width="auto" value="<?php echo $consulta["id"];?>"></p><br />
		<p>Nome:&nbsp&nbsp&nbsp <input style="margin-left: 2px;" type="text" name="nome" size="60" maxlength="auto" width="auto" value="<?php echo $consulta["nome"];?>"></p><br />
		<p>Telefone: <input type="text" name="telefone" size="22" maxlength="auto" width="auto" value="<?php echo $consulta["telefone"];?>">&nbsp&nbsp
		  Celular: <input type="text" name="celular" size="22" value="<?php echo $consulta["celular"];?>"></p><br />
		<p>E-mail:&nbsp&nbsp&nbsp <input type="text" name="email" size="60" value="<?php echo $consulta["email"];?>"></p><br>
		<p>Observações:</p><p><textarea name="observacoes" rows="10" cols="65"><?php echo $consulta["observacoes"]; ?></textarea></p> 
		
		
   
	<div class="editar">
		<input type="submit" name="submit" value="Editar">
		
		&nbsp &nbsp<a hidden="" href="search.php">Voltar</a>
		</div><br>
	<?php } ?>	

		</form><br>
			</article>

</div>
	
<?php include_once("../includes/footer.php"); ?>
</body>