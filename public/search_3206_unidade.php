<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>

<?php if (isset($_POST['submit'])) {
	
		$unidade = $_POST['unidade'];
		    	
		$query = "SELECT * ";
		$query .= "FROM ddr_por_predio ";
		$query .= "WHERE (predio='{$unidade}')";
		$query .= "ORDER BY predio ASC";
		$ddr = mysqli_query($conexao, $query);
		confirmar_resultado($ddr);
		
		}  		
?>

 	
		
		<div id="main">
			<div id="navigation1">
			
			</div>

			<div class="search">
			<table border="2" align="center" cellspacing="2" cellpadding="4">
				<div>
					<h2 style="text-align: center; text-shadow: 2PX; color: #0B614B;">PREFIXO 3206 POR PRÉDIOS:</h2>
				</div>
				<button style="background: blue; border-radius: 10px; margin-left: 13%; margin-top: -1em;">	
			<b><a style="color: #ffffff; text-decoration: none;" href="search_prefixo.php">Voltar</a></b></button>	

				<thead>
				<tr style="background-color: #04B4AE; color: #FFFFFF; border-radius: 5px; font-size: 11pt;">
					<td style="text-align: center;">Predio</td>
					<td style="text-align: center;">Endereço</td>	
					<td style="text-align: center;">Nº Chave</td>
					<td style="text-align: center;">DDR Inicial</td>
					<td style="text-align: center;">DDR Final</td>
					<td style="text-align: center;">Total</td>
					<?php if ($_SESSION["user_nivel"] == "admin") { ?>
						<td style="text-align: center;"><a style="color: blue;" href="add_agenda.php">CADASTRAR</a></td></b>
					<?php } ?>	
				</tr>
				</thead>
			   <tbody>
				<tr>
				<?php   while ($unidade = mysqli_fetch_assoc($ddr)) { ?>
						<td style="background-color: #CEF6EC;" ><?php echo $unidade["predio"]; ?></td>
						<td style="background-color: #CEF6EC;"><?php echo $unidade["endereco"]; ?></td>
						<td style="background-color: #CEF6EC;"><?php echo $unidade["nu_chave"]; ?></td>
						<td style="background-color: #CEF6EC;"><?php echo $unidade["ddr_inicial"]; ?></td>
						<td style="background-color: #CEF6EC;"><?php echo $unidade["ddr_final"]; ?></td>
						<td style="background-color: #CEF6EC;"><?php echo $unidade["total"]; ?></td>
					<?php if ($_SESSION["user_nivel"] == "admin"){
					//valida se nivel de acesso ?>
						<td style="text-align: center; color: blue;"><a style="color: blue;" href="form_prefixo.php?id=<?php echo urlencode($unidade["id"]); ?>" method="get"><img src="imagens/edite.png" alt="editar" width="28" height="30"></a></td>
					<?php } ?>	


						<!--	&nbsp<a href="delete_unidade.php?id=<?php //echo urlencode($unidade["id"]); ?>" method="get" onclick="return confirm('Tem certeza que deseja excluir o cadastro de <?php //echo $consulta["nome"];?>?')">Deletar</a></td>-->
						
				</tr>
				</tbody>
			<?php } ?>	
			</table>

			</div>
		</div>
	</div>
	<?php mysqli_free_result($ddr); ?>

<?php include_once("../includes/footer.php"); ?>


