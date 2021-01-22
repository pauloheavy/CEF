<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php

	if (isset($_GET['id'])) {
		
		 
		$id = $_GET['id'];	
		//$categorias = "SHOW TABLES FROM $dbname";
		$query  = "SELECT * ";
		$query .= "FROM centralizado ";
		$query .= "WHERE id={$id}";
		//$query .= "ORDER BY cgc ASC";
		$centralizado = mysqli_query($conexao, $query);
		
	}
?>

<?php include_once("../includes/header.php"); ?>

<div id="main">
	<article>
		<div id="page">
		<?php
		//Codigo para listar ou editar as tabelas controles 
		while ($consulta = mysqli_fetch_assoc($centralizado)) { ?>
			
			<b><a style="text-decoration: none;" href="search_centralizado_result.php?cgc=<?php echo $consulta["cgc"]; ?>"><button style="background: blue; color: #ffffff; border-radius: 10px; margin-left: 6%; margin-top: 3em;">Voltar</button></a></b>
		

		<h2 style="color: #0040FF;">Informações:</h2>

	
	  <div class="search"> 
	   <form action="edit_centralizado.php" method="post">
		<input hidden="" type="text" name="id" value="<?php echo $consulta["id"];?>"> 	
		<p>&nbspCGC: <input style="margin-left: 1.8em; border-radius: 10px; text-align: center;" type="text" name="cgc" size="3" maxlength="auto" width="auto" value="<?php echo $consulta["cgc"];?>"></p><br />
		<p>Nome: <input style="margin-left: 1.3em; border-radius: 10px; text-align: center;" type="text" name="nome" size="50" maxlength="auto" width="auto" value="<?php echo $consulta["unidade"];?>"></p>&nbsp
		<p>Chave: <input style="margin-left: 1.1em; border-radius: 10px; text-align: center;" type="text" name="chave" size="10" value="<?php echo $consulta["chave"];?>">&nbsp
		DDD Inicial: <input style="border-radius: 10px; text-align: center;" type="text" name="ddrstar" size="10" value="<?php echo $consulta["ddr_inicial"];?>">&nbsp
		DDD Final: <input style="border-radius: 10px; text-align: center;" type="text" name="ddrend" size="10" value="<?php echo $consulta["ddr_final"];?>"></p><br>
		<p>Total DDR: <input style="margin-left: 0.5em; border-radius: 10px; text-align: center;" type="text" name="total" size="10" value="<?php echo $consulta["total_ddr"];?>">&nbsp
		Ativo: <input style="border-radius: 10px; text-align: center;" type="text" name="ativo" size="10" value="<?php echo $consulta["ativo"];?>">&nbsp
		Vago: <input style="border-radius: 10px; text-align: center;" type="text" name="vago" size="10" value="<?php echo $consulta["vago"];?>"></p><br />
		<p>DNS: <input style="margin-left: 1em; text-align: center; border-radius: 10px;" type="text" name="dns" size="35" value="<?php echo $consulta["dns"];?>">&nbsp
		Data de Instalação: <input style="border-radius: 10px; text-align: center;" type="text" name="data" size="15" value="<?php echo $consulta["data_instalacao"];?>"></p><br>
		<p><a href="form_ramais_cadastro_teste.php?id=<?php echo urlencode($consulta["cgc_id"]); ?>&&cgc=<?php echo urlencode($consulta["id"]); ?>"><button type="button">Consulta/Cadatrar Ramais</button></a></p><br>
		<p>Observação:<br><br> <textarea name="observacoes" rows="10" cols="65"><?php echo $consulta["observacao"];?></textarea></p>&nbsp
		<?php } ?>	
			<?php if ($_SESSION["user_nivel"] == "admin"){?>	
				<div class="editar">
				<input type="submit" name="submit" value="Editar">
				</div>
			<?php } ?>	
	  </form>
	 </div>
	</article>
</div>
	
	

</body>
<?php mysqli_free_result($centralizado); ?>
<?php include_once("../includes/footer.php"); ?>


