<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php  find_tables(); ?>

<div id="main">
		
	<div class="search" style="margin-left: 8%; margin-right: 8%; margin-top: 2%;">
				<h2 style="color: blue; margin-top: 2em; margin-left: 10%;">Documentação central <i>INTELBRAS.</i></h2>
			 	
			 	<h3><div class="mensage"><?php echo mensagem();?></div></h3>
			
		<div class="imgdown">
			<a href="manuais/manual_impacta_portugues_01-17_site.pdf" download="Treinamento huawei"><img src="imagens/intelbras_guia.png" alt="home"><br>Manual Intelbras Impacta</a>&nbsp&nbsp&nbsp
			<a href="manuais/manual_interface_e1_impactas_portugues_02_11.pdf" download><img src="imagens/intelbras_int_e1.png" alt="home"><br>Manual Interface E1 </a>&nbsp&nbsp&nbsp

			<a href="manuais/manual_placa_ethernet_impacta_portugues_02-16_site.pdf" download><img src="imagens/intelbras_int_eTH.png" alt="asbuilt"><br>Manual Placa de Rade Impacta </a>&nbsp&nbsp&nbsp

			<a href="manuais/Configuracoes_basicas_central_intelbras.doc" download><img src="imagens/conf_basica_impacta.png" alt="asbuilt "><br>Configuração 68i</a>&nbsp&nbsp&nbsp


			<a href="manuais/Manual_de_instalação_Prog_versão_1.4.14.pdf" download><img src="imagens/manu_insta_programadorweb1.4,14.png" alt="manu_insta_programadorweb1_4_14"><br>Programador WEB 1.4.14 </a>&nbsp&nbsp&nbsp

			<a href="manuais/Procedimento_de_instalação_do_ICTI_e_Programador_WEB_2_0_04.pdf" download><img src="imagens/manu_insta_programadorweb2.0.6.png" alt="asbuilt"><br>Programador WEB 2.0.4</a>&nbsp&nbsp&nbsp

			
		</div>

	</div>	

</div>


	
<?php include_once("../includes/footer.php"); ?>


