<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php require_once("../includes/validation_functions.php");?>
<?php $agencas = find_centralizado_cgc();  ?>
<?php $agency = find_centralizado_nome();  ?>
 	<div id="main">
		
		<div id="page">
		   <div class="search">
		   		

		<?php if ($_SESSION["user_nivel"] == "admin") { ?>
				<div style="float: left; margin-left: 12%; margin-top: 4em;">
		   		<button style="background: blue; border-radius: 10px;"><a style="text-decoration: none;  color: #ffffff" href="add_centralizado.php"><b>CADASTRAR AGENCIA</b></a>
		   		</button></div><br><br>

		<?php } ?>
		   		
		   	<h2 style="color: blue;" ><i>Consultar Agências Centralizado:</i> <br><br></h2>
			<form action="search_centralizado_result.php" method="post">
			 <p style="font-size: 11pt;"><b>Consultar pelo CGC:</b>&nbsp&nbsp&nbsp		 
		    <SELECT name="cgc">
			 	<option></option>
			 	<?php while ($agencia = mysqli_fetch_assoc($agencas)) { ?>
			<option><?php echo $agencia["cgc"]; ?>
			 	<?php } ?></option></SELECT>
			 </p><br>
		  	    <p style="font-size: 11pt;"><b>Consultar pelo Nome:</b>
			<SELECT name="nome_agencia">
			 	<option></option>
			 	<?php while ($agency_name = mysqli_fetch_assoc($agency)) { ?>
			 	<option><?php echo $agency_name["unidade"]; ?>
			 	  <?php } ?></option>
			 </SELECT>

			 </p><br>
		       <p><input type="submit" style="border-radius: 10px;" name="submit" value="Consultar">
		       	&nbsp &nbsp<a hidden="" href="content.php">Voltar</a>
		       </form>
		       				
		  
	      </div >	
			<div class="mensage"><?php echo mensagem();?></div>
				
		</div>
	</div>	 
<?php mysqli_free_result($agencas); ?>
<?php include_once("../includes/footer.php"); ?>