<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php require_once("../includes/validation_functions.php");?>
<?php $unidades = find_prefixo(); ?>

 	<div id="main">
		
		<div id="page">
			
				
		  <h2 style="color: blue;">Consultar prefixo 3206: <br><br></h2>
		   <div class="search">
		    <form action="search_3206_unidade.php" method="post">
		  	 <p> Selecione o Predio:
			 	<SELECT name="unidade">
			 	<?php while ($unidade = mysqli_fetch_assoc($unidades)) { ?>	
			 	<option><?php echo $unidade["predio"]; ?>
			 	<?php } ?></option> 
			 	</SELECT> <input type="submit" style="border-radius: 10px;" name="submit" value="Consultar"></p><br>
			 	</form>
		  	    <br>
		  	    <form action="porfaixa.php">
		      <p><input type="submit" style="border-radius: 10px;" name="submit" value="Listar todos">
		       	&nbsp &nbsp<a hidden="" href="content.php">Voltar</a>
		      </form>
	      </div>	
			<div class="mensage"><?php echo mensagem();?></div>
				
		</div>
	</div>	 
<?php include_once("../includes/footer.php"); ?>