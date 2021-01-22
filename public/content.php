<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>


 	<div id="main">
 				<h3 style="color: blue; text-align: center; margin-top: 10em; ">BEM VINDO AO SISTEMA DE CONTROLE TELECOM</h3>
			 	<h2 style="color: blue; text-align: center; font-size: 28px; ">CIAUS-BR!</h2><br>
			 	<h3><div style="text-align: center; font-size: 13pt; color: #0B610B;" class="mensage"><?php echo mensagem();?></div></h3>
			
	</div>

	
<?php include_once("../includes/footer.php"); ?>


