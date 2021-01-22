<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php  find_tables(); ?>

<div id="main">
		
	<div class="search" style="margin-left: 8%; margin-right: 8%; margin-top: 2%;">
				<h2 style="color: blue; margin-top: 2em; margin-left: 10%;">Documentação <i>ASTERISK/SNEP.</i></h2>
			 	
			 	<h3><div class="mensage"><?php echo mensagem();?></div></h3>
			
		<div class="imgdown">
			<a href="manuais/asterisk_treinamento.pdf" download="Treinamento huawei"><img src="imagens/treinamento_asterisk.png" alt="treinamento_asterisk"><br>Treinamento Asterisk 4º geração</a>&nbsp&nbsp&nbsp
			<a href="manuais/Manual_Virtualizacao_SIP_SNEP3.pdf" download><img src="imagens/manu_virtualiza_snep3.png" alt="manu_virtualiza_snep3"><br>Manual instalação virtual SNEP3 </a>&nbsp&nbsp&nbsp

			<a href="manuais/Manual_instalacao_Debian_Squeeze_6.pdf" download><img src="imagens/manu_instala_asterisk.png" alt="manu_instala_asterisk"><br>Manual instalação Debain 6 </a>&nbsp&nbsp&nbsp

			<a href="manuais/Configuração_BLF_SNEP.pdf" download><img src="imagens/configura_blf_snep.png" alt="configura_blf_snep"><br>BLF no SNEP</a>&nbsp&nbsp&nbsp

			<a href="manuais/Procedimento_de_instalação_do_ICTI_e_Programador_WEB_2_0_04.pdf" download><img src="imagens/snep_manu_usuario.png" alt="snep_manu_usuario"><br>Manual usuário SNEP</a>&nbsp&nbsp&nbsp

			<a href="manuais/palestra_asterisk.ppt" download><img src="imagens/palestra_asterisk.png" alt="palestra_asterisk"><br>Palestra ASTERISK</a>&nbsp&nbsp&nbsp
			<?php if ($_SESSION["user_nivel"] == "admin" OR $_SESSION["user_nivel"] == "suporte" ) { ?>
				<a href="manuais/Cheque_lists_Servidor_Asterisk.docx" download><img src="imagens/checklist_asterisk.png" alt="checklist_asterisk"><br>Checklist ASTERISK</a>&nbsp&nbsp&nbsp
			<?php } ?>
		</div>

	</div>

</div>


	
<?php include_once("../includes/footer.php"); ?>


