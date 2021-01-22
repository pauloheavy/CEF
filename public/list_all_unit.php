<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php find_agenda(); ?>

<?php  $query = "SELECT * ";
		$query .= "FROM unidades ";
		//if ($public) {
		//	$query .= "WHERE cgc=" " ";
		//}		
		//$query .= "ORDER ASC";
		$unidades = mysqli_query($conexao, $query);
		confirmar_resultado($unidades);
		
?>
 	
		
	<div id="agenda">
		
			<div class="search">
				<article>
			<table border="1" style="border-radius: 10px; background-color: #fff; padding: 5px; margin-left: 6%; ">
				<thead>
				<tr style="font-style: italic; font-stretch: bold">
					<td style="text-align: center; color: blue;"><b>cgc</b></td>
					<td style="text-align: center; color: blue;"><b>Nome</b></td>
					<td style="text-align: center; color: blue;"><b>Nº Chave</b></td>
					<td style="text-align: center; color: blue;"><b>DDR Inicial</b></td>
					<td style="text-align: center; color: blue;"><b>DDR Final</b></td>
					<td style="text-align: center; color: blue;"><b>Central</b></td>
					<td style="text-align: center; color: blue;"><b>Nº Série</b></td>
					<td style="text-align: center; color: blue;"><b>Nº Portas</b></td>
					<?php if ($_SESSION["user_nivel"] == "admin"){?>
					<td style="text-align: center; color: blue; background: #F5F6CE;"><a style="color: blue;" href="add_unit.php"><b>CADASTRAR</b></a></td>				
				<?php } ?>
				</tr>
				</thead>
			   <tbody>
				<tr>
				<?php   while ($unidade = mysqli_fetch_assoc($unidades)) { ?>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $unidade["cgc"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $unidade["nome"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $unidade["chave"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $unidade["ddr_inicial"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $unidade["ddr_final"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $unidade["marca"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $unidade["nun_serie"]; ?></td>
					<td style="border-radius: 2px; padding: 5px;"><?php echo $unidade["porta"]; ?></td>
					<?php if ($_SESSION["user_nivel"] == "admin") { ?>
						<td style="text-align: center; color: blue;"><a style="color: blue;" href="form_unit.php?id=<?php echo urlencode($unidade["id"]); ?>" method="get"><img src="imagens/edite.png" alt="deletar" width="20" height="20"></a>&nbsp&nbsp<a href="delete_unidade.php?id=<?php echo urlencode($unidade["id"]); ?>" method="get" onclick="return confirm('Tem certeza que deseja excluir o cadastro de <?php echo $consulta["nome"];?>')"><img src="imagens/delete.png" alt="deletar" width="20" height="20"></a></td>
					<?php } ?>	
				</tr>
				</tbody>
			<?php } ?>	
			</table>
				</article>
			</div>
			
	</div>

	
	<?php mysqli_free_result($unidades); ?>
<?php include_once("../includes/footer.php"); ?>


