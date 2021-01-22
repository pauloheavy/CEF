<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php  find_tables(); ?>

<div id="main">
		
	<div class="search" style="margin-left: 8%; margin-right: 8%; margin-top: 2%;">

				<h2 style="color: blue; margin-top: 2em; margin-left: 10%;">Documentações central <i>LEUCOTRON</i></h2>
			 	
			 	<h3><div class="mensage"><?php echo mensagem();?></div></h3>
			
		<div class="imgdown">
			<a href="manuais/configuracoes_basicas_central_leucotron.doc" download="Treinamento huawei"><img src="imagens/conf_basica_leucotron.png" alt="conf_basica_leucotron"><br>Configuração Básica Leucontron</a>&nbsp&nbsp&nbsp
			
			<a href="manuais/codigos_leucotron.xls" download><img src="imagens/codigos_leucotron.png" alt="codigos_leucotron"><br>Códigos Facilidades Leucotron</a>&nbsp&nbsp&nbsp



		</div>

	</div>	

</div>


	
<?php include_once("../includes/footer.php"); ?>


