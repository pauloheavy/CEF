<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
	if (isset($_POST['submit'])) {
		// formulario foi submetido

		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$link = $_POST["link"];
		$chave_pri = $_POST["chav_pri"];
		$chave_sec = $_POST["chave_sec"];
		$chave_ter = $_POST["chave_ter"];
		$chave_quar = $_POST["chave_quar"];
		$chave_quint = $_POST["chave_quint"];
		$chave_sext = $_POST["chave_sext"];
		$ddrstar_pri = $_POST["ddrstar_pri"];
		$ddrstar_sec = $_POST["ddrstar_sec"];
		$ddrstar_ter = $_POST["ddrstar_ter"];
		$ddrstar_quar = $_POST["ddrstar_quar"];
		$ddrstar_quint = $_POST["ddrstar_quint"];
		$ddrstar_sext = $_POST["ddrstar_sext"];
		$ddrend_pri = $_POST["ddrend_pri"];
		$ddrend_sec = $_POST["ddrend_sec"];
		$ddrend_ter = $_POST["ddrend_ter"];
		$ddrend_quart = $_POST["ddrend_quart"];
		$ddrend_quint = $_POST["ddrend_quint"];
		$ddrend_sext = $_POST["ddrend_sext"];
		$central = $_POST["central"];
		$modelo = $_POST["modelo"];
		$portas = $_POST["portas"];
		$ip_pri = $_POST["ip_pri"];
		$ip_sec = $_POST["ip_sec"];
		$ip_gw = $_POST["ip_gw"];
		$nun_serie_pri = $_POST["serie_pri"];
		$nun_serie_sec = $_POST["serie-sec"];
		$nun_serie_gw = $_POST["serie_gw"];
		$opera = $_POST["opera"];
		$data = $_POST["data"];
		$garant = $_POST["garant"];
		$empresa = $_POST["empresa"];
		$manuten = $_POST["manuten"];
		
					
		//ecesando o banco		
		$query = "UPDATE matriz SET ";
		$query .= "nome = '{$nome}', "; 
		$query .= "link = '{$link}', "; 
		$query .= "chave_pri = '{$chave_pri}', ";
		$query .= "chave_sec = '{$chave_sec}', "; 
		$query .= "chave_ter = '{$chave_ter}', ";
		$query .= "chave_quar = '{$chave_quar}', ";
		$query .= "chave_quint = '{$chave_quint}', ";
		$query .= "chave_sext = '{$chave_sext}', ";
		$query .= "ddr_inicial_pri = '{$ddrstar_pri}', ";
		$query .= "ddr_inicial_sec = '{$ddrstar_sec}', ";
		$query .= "ddr_inicial_ter = '{$ddrstar_ter}', ";
		$query .= "ddr_inicial_quar = '{$ddrstar_quar}', ";
		$query .= "ddr_inicial_quint = '{$ddrstar_quint}', ";
		$query .= "ddr_inicial_sext = '{$ddrstar_sext}', ";
		$query .= "ddr_final_pri = '{$ddrend_pri}', ";
		$query .= "ddr_final_sec = '{$ddrend_sec}', ";
		$query .= "ddr_final_ter = '{$ddrend_ter}', ";
		$query .= "ddr_final_quar = '{$ddrend_quart}', ";
		$query .= "ddr_final_quint = '{$ddrend_quint}', ";
		$query .= "ddr_final_sext = '{$ddrend_sext}', ";
		$query .= "marca = '{$central}', "; 
		$query .= "modelo = '{$modelo}', "; 
		$query .= "serie = '{$nun_serie_pri}', ";
		$query .= "serie_sec = '{$nun_serie_sec}', "; 
		$query .= "serie_gw = '{$nun_serie_gw}', ";
		$query .= "porta = '{$portas}', ";
		$query .= "ip = '{$ip_pri}', ";
		$query .= "ip_sec = '{$ip_sec}', ";
		$query .= "ip_gw = '{$ip_gw}', ";
		$query .= "operadora = '{$opera}', "; 
		$query .= "data_migra = '{$data}', "; 
		$query .= "garantia = '{$garant}', "; 
		$query .= "data = '{$manuten}', ";
		$query .= "empresa = '{$empresa}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
	 		$result = mysqli_query($conexao, $query);
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "Atualização da $nome   realizada com sucesso.";
			redirect_to("content.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "A atualização não pode ser realizada.";
			redirect_to("content.php");			
		}
	} 
?>

<?php include_once("../includes/header.php"); ?>

 	<div id="main">
		<div id="navigation">
			<br />
			<small>
				<a href="admin.php">&laquo; Menu Principal</a>
			</small>
			<ul class="categories">
			<b>
			    <li>
			 	<p><li><a href="agenda.php">Agenda</a></li></p>
			 	<p><li><a href="search.php">Controle</a></li></p>
			 	<p><li><a href="agenda.php">Unidades</a></li></p>
			 	</li>
			</ul>
			<ul class="prefix">
			 	<li><a href="">Matriz</a>
			 		<ul class="submenu">	
			 			<li><a style="color: #d0d0d0;" href="">Matriz I</a></li>
			   			<li><a style="color: #d0d0d0;" href="">Matriz II</a></li>
			   			<li><a style="color: #d0d0d0;" href="">Matriz III</a></li>
			   		</ul>
			   <br />
			   	 <li><a href="">prefixo 3206</a>
						<ul class="submenu">
							<li><a style="color: #d0d0d0;" href="">3206 por faixa</a></li>
							<li><a style="color: #d0d0d0;" href="">3206 por predio</a></li>
						</ul>
			     </li>								
			    </li>			
			</ul>

		</div>
		
	</div>

<?php include_once("../includes/footer.php"); ?>


