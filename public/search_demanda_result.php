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
			$req = $_POST['req'];
			$user = $_POST['user'];
			$matricula = $_POST['matricula'];
			$logico = $_POST['name_logico'];
		//$campos_requeridos = array("cgc" & "norme"); 
		//validate_presences($campos_requeridos);
			$query  = "SELECT * ";
			$query .= "FROM demandas_soft_phone ";
			$query .= "WHERE (unidade='{$cgc}' OR nome_ag='{$agencia}' OR chamado='{$req}' OR nome='{$user}' OR matricula='{$matricula}' OR nome_logico='{$logico}')";
			$data = mysqli_query($conexao, $query);
			confirmar_resultado($data);
			$total = mysqli_num_rows($data);
				
		//tratamento dos campos vazios.		
		} if (!isset($_POST['submit'])) {
				$cgc = $_GET['cgc'];
				
				$query  = "SELECT * ";
				$query .= "FROM demandas_soft_phone ";
				$query .= "WHERE (unidade='{$cgc}')";
				$data = mysqli_query($conexao, $query);
				confirmar_resultado($data);
				$total = mysqli_num_rows($data);
					
		//tratamento dos campos vazios.		
		}
?>		   
<?php 
// Tratamento das consultas invalidas.
	if ($total == 0 ) {
				$_SESSION["mensagem"] = "dados não encontrado.";
				redirect_to("search_demandas.php");		
			} 
   
 ?>			


<?php include_once("../includes/header.php"); ?>

<div id="main">
			



			<div class="search" style="margin-left: 20%; margin-top: 2%;">
			<button style="background: blue; border-radius: 10px; margin-left: -8%; margin-top: -1em;">	
			<b><a style="color: #ffffff; text-decoration: none;" href="search_demandas.php">Voltar</a></b></button>	

			<table border="1" style="border-radius: 10px; background-color: #fff; padding: 5px; ">
				<thead>
				<tr style="font-style: italic; font-stretch: bold">
					<td style="text-align: center; color: blue;"><b>Matricula</b></td>
					<td style="text-align: center; color: blue;"><b>Usuário</b></td>
					<td style="text-align: center; color: blue;"><b>Ramal</b></td>
					<td style="text-align: center; color: blue;"><b>Unidade</b></td>
					<td style="text-align: center; color: blue;"><b>Agência</b></td>
					<td style="text-align: center; color: blue;"><b>Nome Lógico</b></td>
					<td style="text-align: center; color: blue;"><b>WO</b></td>
				
				</tr>
				</thead>
			   <tbody>
				<tr>
				<?php   while ($demanda = mysqli_fetch_assoc($data)) { ?>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["matricula"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["nome"]; ?></td>
					<td style="border-radius: 2px; padding: 5px; text-align: center;"><?php echo $demanda["ramal"]; ?></td>
					<td style="border-radius: 2px; padding: 5px; text-align: center;"><?php echo $demanda["unidade"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["nome_ag"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["nome_logico"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $demanda["chamado"]; ?></td>
					
						<td style="text-align: center; color: blue;"><a style="color: blue;" href="form_demanda.php?id=<?php echo urlencode($demanda["id"]); ?>" method="get">MAIS</a></td>
							
						<?php if ($_SESSION["user_nivel"] == "admin") { ?>	

							<td><a href="delete_demanda.php?id=<?php echo urlencode($demanda["id"]); ?>" method="get" onclick="return confirm('Tem certeza que deseja excluir o cadastro de <?php echo $consulta["nome"];?>')"><img src="imagens/delete.png" alt="deletar" width="20" height="20"></a></td>
						<?php } ?>	
					
				</tr>
				</tbody>
			<?php } ?>	
			</table>

			</div>
		</div>
	
<?php include_once("../includes/footer.php"); ?>
</body>



