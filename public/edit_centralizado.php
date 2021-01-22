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
		$chave = $_POST["chave"];
		$ddrstar = $_POST["ddrstar"];
		$ddrend = $_POST["ddrend"];
		$total = $_POST["total"];
		$ativo = $_POST["ativo"];
		$vago = $_POST["vago"];
		$dns = $_POST["dns"];
		$data = $_POST["data"];
		$observa = $_POST["observacoes"];
				
					
		//acesando o banco		
		$query = "UPDATE centralizado SET ";
		$query .= "unidade = '{$nome}', "; 
		$query .= "chave = '{$chave}', "; 
		$query .= "ddr_inicial = '{$ddrstar}', ";
		$query .= "ddr_final = '{$ddrend}', ";
		$query .= "total_ddr = '{$total}', "; 
		$query .= "ativo = '{$ativo}', "; 
		$query .= "vago = '{$vago}', "; 
		$query .= "dns = '{$dns}', ";
		$query .= "data_instalacao = '{$data}', "; 
		$query .= "observacao = '{$observa}' "; 
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
	 		$result = mysqli_query($conexao, $query);
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "Agência atualizada com sucesso.";
			redirect_to("search_centralizado.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "A agência não pode ser atualizada.";
			redirect_to("search_centralizado.php");			
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


