<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php require_once("../includes/validation_functions.php");?>
<?php $agencas = find_demanda_cgc();  ?>
<?php $agency = find_demanda_agencia();  ?>
 	<div id="main">
		
		<div id="page">
		   <div class="search">
		   		<div style="float: left; margin-left: 8%; margin-top: 4em;">


		   		<?php if ($_SESSION["user_nivel"] == "admin" OR $_SESSION["user_nivel"] == "suporte") { ?>

		   		<button style="background: blue; border-radius: 10px;"><a style="text-decoration: none;  color: #ffffff" href="add_demanda.php"><b>CADASTRAR</b></a></button></div><br><br>
		   	<?php } ?>

		   	<h2 style="color: blue;" ><i>Consultar demandas:</i> <br><br></h2>
					 
		    <form action="search_demanda_result.php" method="post">
		  	    <p style="font-size: 11pt;"><b>CGC:</b>
			<SELECT name="cgc">
			 	<option></option>
			 	<?php while ($agencia = mysqli_fetch_assoc($agencas)) { ?>
			<option><?php echo $agencia["unidade"]; ?>
			 	<?php } ?></option></SELECT>&nbsp&nbsp&nbsp
			 
		  	    <b>Agência:</b>
			<SELECT name="nome_agencia">
			 	<option></option>
			 	<?php while ($agency_name = mysqli_fetch_assoc($agency)) { ?>
			 	<option><?php echo $agency_name["nome_ag"]; ?>
			 	  <?php } ?></option>
			 </SELECT>&nbsp&nbsp&nbsp

			 	<b>WO ou REQ:</b>
				<input type="text" name="req">			
			 </p><br>&nbsp&nbsp&nbsp
		  	   <p> <b>Nome Usuário:</b>
				<input type="text" name="user">
			&nbsp&nbsp&nbsp

			 	<b>Matricula:</b>
				<input type="text" name="matricula">
			&nbsp&nbsp&nbsp
			 <b>Nome Lógico:</b>
			<input type="text" name="name_logico">
			 </p><br><br>
		       <p><input type="submit" style="border-radius: 10px;" name="submit" value="Consultar">
		       	&nbsp &nbsp<a hidden="" href="content.php">Voltar</a>
		       </form>
		       				
		  
	      </div >	
			<div class="mensage"><?php echo mensagem();?></div>
				
		</div>
</div>	 
<?php mysqli_free_result($agencas); ?>
<?php include_once("../includes/footer.php"); ?>