<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php 

?>

<?php 
		if (isset($_POST['submit'])){
		$cgc = $_POST['cgc'];

		$query = "SELECT * ";
		$query .= "FROM unidades ";
		$query .= "WHERE cgc={$cgc}";
		//}		
		//$query .= "ORDER ASC";
		$unidades = mysqli_query($conexao, $query);
		confirmar_resultado($unidades);
		
	} if (!isset($_POST['submit'])){
		$cgc = $_GET['cgc'];

		$query = "SELECT * ";
		$query .= "FROM unidades ";
		$query .= "WHERE cgc={$cgc}";
		//}		
		//$query .= "ORDER ASC";
		$unidades = mysqli_query($conexao, $query);
		confirmar_resultado($unidades);
	}
?>
 	<div id="main">
		
		<div id="agenda">
			<div class="search" style="margin-left: 25%; margin-top: 2%;">
				<button style="background: blue; border-radius: 10px; margin-left: -10%; margin-top: -1em;"><b><a style="color: #ffffff; text-decoration: none;" href="search_unidades.php">Voltar</a></b></button>

			<table border="1" style="border-radius: 10px; background-color: #fff; padding: 5px;" cellspacing="1" cellpadding="3">
				<thead>
				<tr>
					<b><td style="text-align: center; color: blue;">cgc</td>
					<td style="text-align: center; color: blue;">Nome</td>
					<td style="text-align: center; color: blue;"><b>Nº Chave</b></td>
					<td style="text-align: center; color: blue;">DDR Inicial</td>
					<td style="text-align: center; color: blue;">DDR Final</td>
					<td style="text-align: center; color: blue;">Central</td>
					<td style="text-align: center; color: blue;">Nº Série</td>
					<td style="text-align: center; color: blue;">Nº Portas</td>
					<td style="text-align: center; color: blue;"><a style="color: blue;" href="add_unit.php">CADASTRAR</a></td></b>					
				</tr>
				</thead>
			   <tbody>
				<tr>
				<?php   while ($unidade = mysqli_fetch_assoc($unidades)) { ?>
					<td><?php echo $unidade["cgc"]; ?></td>
					<td><?php echo $unidade["nome"]; ?></td>
					<td><?php echo $unidade["chave"]; ?></td>
					<td><?php echo $unidade["ddr_inicial"]; ?></td>
					<td><?php echo $unidade["ddr_final"]; ?></td>
					<td><?php echo $unidade["marca"]; ?></td>
					<td><?php echo $unidade["nun_serie"]; ?></td>
					<td><?php echo $unidade["porta"]; ?></td>
					<td style="text-align: center; color: blue;"><a style="color: blue;" href="form_unit.php?id=<?php echo urlencode($unidade["id"]); ?>" method="get">mais</a>
						
				</tr>
				</tbody>
			<?php } ?>
			</table>
					
			</div>
		</div>
	</div>
<?php mysqli_free_result($unidade); ?>
<?php include_once("../includes/footer.php"); ?>


