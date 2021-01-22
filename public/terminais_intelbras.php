<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php  find_tables(); ?>

 	<div id="main">
		
 		<div class="search" style="margin-left: 8%; margin-top: 2%;">
				<h2 style="color: blue; margin-top: 2em; margin-left: 10%;"><i>FIRMWARE INTELBRAS:<br><br></i></h2>
			 				 	
			
		<div class="imgdown">
			<a href="ferramentas/firmware_TIP125_2.9.17.bin" download="firmware_TIP125_2.9.17"><img src="imagens/3cxphone.png" alt="3CXPhone6"><br>Firmware Tip 125 v-2.9.17</a>&nbsp&nbsp&nbsp
			
			<a href="ferramentas/tip200_60.61.75.15.rom" download><img src="imagens/3cxphone.png" alt="tip200_60.61.75.15"><br>Firmware Tip 200 v-60.6.7.75.15</a>&nbsp&nbsp&nbsp

			<a href="ferramentas/tip30060.61.75.22.rom" download="putty"><img src="imagens/3cxphone.png" alt="tip30060.61.75.22"><br>Firmware Tip 300 v-60.61.75.22</a>&nbsp&nbsp&nbsp
			
			
		</div>

		<h2 style="color: blue; margin-top: 2em; margin-left: 10%;"><i>MANUAIS INTELBRAS TERMINAIS:<br><br></i></h2>
	   </div>	

	</div>


	
<?php include_once("../includes/footer.php"); ?>


