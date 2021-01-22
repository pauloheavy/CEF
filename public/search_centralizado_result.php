<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php

if (isset($_POST['submit'])) {
			$cgc = $_POST['cgc'];
			$agencia = $_POST['nome_agencia'];
							 
		//$campos_requeridos = array("cgc" & "norme"); 
		//validate_presences($campos_requeridos);
				 						
			$query  = "SELECT * ";
			$query .= "FROM centralizado ";
			$query .= "WHERE (cgc='{$cgc}' OR unidade='{$agencia}')";
			$data = mysqli_query($conexao, $query);
			confirmar_resultado($data);
			$total = mysqli_num_rows($data);
				
		//tratamento dos campos vazios.		
		}if (!isset($_POST['submit'])) {
			$cgc = $_GET['cgc'];
						 						
			$query  = "SELECT * ";
			$query .= "FROM centralizado ";
			$query .= "WHERE (cgc='{$cgc}')";
			$data = mysqli_query($conexao, $query);
			confirmar_resultado($data);
			$total = mysqli_num_rows($data);
				
		//tratamento dos campos vazios.		
		}// if ($_POST['cgc'] == "" AND $_POST['nome'] == "") {
		//	$_SESSION["mensagem"] = "Por favor, Informe o CGC ou o Nome!";
		//			redirect_to("search.php");
		
		//} 
?>		   
<?php 
// Tratamento das consultas invalidas.
	if ($total == 0 ) {
				$_SESSION["mensagem"] = "dados não encontrado.";
				redirect_to("search_centralizado.php");		
			} 
   
 ?>			


<?php include_once("../includes/header.php"); ?>

<div id="main">
			

			<h1 style="text-align: center; margin-top: 2%;">Agência Centralizado 4501-1000</h1>

			<div class="search" style="margin-left: 25%; margin-top: 2%;">
			<button style="background: blue; border-radius: 10px; margin-left: -10%; margin-top: -1em;">	
			<b><a style="color: #ffffff; text-decoration: none;" href="search_centralizado.php">Voltar</a></b></button>	

			<table border="1" style="border-radius: 10px; background-color: #fff; padding: 5px; ">
				<thead>
				<tr style="font-style: italic; font-stretch: bold">
					<td style="text-align: center; color: blue;"><b>CGC</b></td>
					<td style="text-align: center; color: blue;"><b>Agência</b></td>
					<td style="text-align: center; color: blue;"><b>DDR Inicial</b></td>
					<td style="text-align: center; color: blue;"><b>DDR Final</b></td>
					<td style="text-align: center; color: blue;"><b>DnS</b></td>
					<td style="text-align: center; color: blue;"><b>Data de Instalação</b></td>
				
				</tr>
				</thead>
			   <tbody>
				<tr>
				<?php   while ($demanda = mysqli_fetch_assoc($data)) { ?>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["cgc"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["unidade"]; ?></td>
					<td style="border-radius: 2px; padding: 5px; text-align: center;"><?php echo $demanda["ddr_inicial"]; ?></td>
					<td style="border-radius: 2px; padding: 5px; text-align: center;"><?php echo $demanda["ddr_final"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["dns"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["data_instalacao"]; ?></td>
					<?php if ($_SESSION["user_nivel"] == "admin" OR $_SESSION["user_nivel"] == "suporte") { ?>
						<td style="text-align: center; color: blue;"><a style="color: blue;" href="form_centralizado.php?id=<?php echo urlencode($demanda["id"]); ?>" method="get">MAIS</a></td>
					<?php } ?>	

					<?php if ($_SESSION["user_nivel"] == "admin") { ?>	
							<td><a href="delete_centralizado.php?id=<?php echo urlencode($demanda["id"]); ?>" method="get" onclick="return confirm('Tem certeza que deseja excluir o cadastro de <?php echo $consulta["unidade"];?>')"><img src="imagens/delete.png" alt="deletar" width="20" height="20"></a></td>
					<?php } ?>	
				</tr>
				</tbody>
			<?php } ?>	
			</table>

			</div>
		</div>
	
<?php include_once("../includes/footer.php"); ?>
</body>



