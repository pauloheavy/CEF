<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php  find_tables(); ?>

 	<div id="main">
		

				<h2 style="color: blue; margin-top: 2em; margin-left: 10%;"><i>FERRAMENTAS</i></h2>
			 	
			 	<h3><div class="mensage"><?php echo mensagem();?></div></h3>
			
		<div class="imgdown">
			<a href="ferramentas/3CXPhone6.msi" download="3CXPhone6"><img src="imagens/3cxphone.png" alt="3CXPhone6"><br>3CX Phone 6</a>&nbsp&nbsp&nbsp
			
			<a href="ferramentas/programadorWEB_setup_v2.0.12.msi.rar" download><img src="imagens/programadorweb.png" alt="programadorweb"><br>Programador WEB v2.0.12</a>&nbsp&nbsp&nbsp

			<a href="ferramentas/putty.rar" download="putty"><img src="imagens/putty.png" alt="putty"><br>PuTTy</a>&nbsp&nbsp&nbsp
			
			<a href="ferramentas/TextPad.rar" download><img src="imagens/textpad.png" alt="textpad"><br>TextPad</a>&nbsp&nbsp&nbsp


		</div>



	</div>


	
<?php include_once("../includes/footer.php"); ?>


