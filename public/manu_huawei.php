<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php  find_tables(); ?>

<div id="main">
		
	<div class="search" style="margin-left: 8%; margin-right: 8%; margin-top: 2%;">
				<h2 style="color: blue; margin-top: 2em; margin-left: 10%;">Documentações Huawei.</h2>
			 	
			 	<h3><div class="mensage"><?php echo mensagem();?></div></h3>
			
		<div class="imgdown">
			<a href="manuais/treinamentohuawei.pdf" download="Treinamento huawei"><img src="imagens/teinamento_huawei.jpg" alt="home"><br>Treinamento Huawei U1980 </a>&nbsp&nbsp&nbsp
			<?php if ($_SESSION["user_nivel"] == "admin" OR $_SESSION["user_nivel"] == "suporte") { ?>
				<a href="manuais/passso_passo_interface_web_web.ppt" download><img src="imagens/passo_a_passo_huawei.png" alt="home"><br>Configuração de usuários na WEB </a>&nbsp&nbsp&nbsp

				<a href="manuais/AS_BUILT_CAIXA_Matriz_1_V1.00.xlsx" download><img src="	imagens/ASBUILT_MZ1.png" alt="asbuilt"><br>Asbuilt Matriz 1 </a>&nbsp&nbsp&nbsp

				<a href="manuais/AS_BUILT_CAIXA_Matriz_2_V1.00.xlsx" download><img src="imagens/ASBUILT_MZ2.png" alt="asbuilt "><br>Asbuilt Matriz 2</a>
			<?php } ?>


		</div>

	</div>	

</div>


	
<?php include_once("../includes/footer.php"); ?>


