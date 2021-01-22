<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php require_once("../includes/validation_functions.php");?>
<?php $unidades = find_unidades(); ?>

 	<div id="main">
		<!--<div id="navigation">
			
		</div>-->
		<div id="page">
			
				
		  <h2 style="color: blue;"><i>Consultar unidade:</i> <br><br></h2>
		  <div class="search">
		    <form action="list_unit_cgc.php" method="post">
		  	   <p style="font-size: 11pt;"> <b> Selecione o CGC</b>:
			 	<SELECT name="cgc">
			 	<option></option>
			 	<?php while ($unidade = mysqli_fetch_assoc($unidades)) { ?>
			 	<option><?php echo $unidade["cgc"]; ?>
			 	<?php } ?></option> 
			 	</SELECT> <input type="submit" style="border-radius: 10px;" name="submit" value="Consultar"></p><br>
			 	</form>
		  	    <br>
		  	    <form action="list_all_unit.php">
		       <p><input type="submit" style="border-radius: 10px;" name="submit" value="Listar todos">
		       	&nbsp &nbsp<a hidden="" href="content.php">Voltar</a>
		       </form>
	      </div>	
			<div style="margin-left: 10%" class="mensage"><?php echo mensagem();?></div>
				
		</div>
</div>	 
<?php include_once("../includes/footer.php"); ?>