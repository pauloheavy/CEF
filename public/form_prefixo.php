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
		$query .= "FROM ddr_por_predio ";
		$query .= "WHERE id={$id}";
		//$query .= "ORDER BY cgc ASC";
		$unidade = mysqli_query($conexao, $query);
		
	}
?>

<?php include_once("../includes/header.php"); ?>

<div id="main">
		<article>
		<div id="page">

		<button style="background: blue; border-radius: 10px; margin-left: 8%; margin-top: 3em;">	
			<b><a style="color: #ffffff; text-decoration: none;" href="search_prefixo.php">Voltar</a></b>
		</button>		

			<h2>Informações:</h2>	
		<div class="search">
	

	<?php
		//Codigo para listar ou editar as tabelas controles 
		while ($consulta = mysqli_fetch_assoc($unidade)) { ?>
		 
		<form action="edit_prefixo.php" method="post">
		<input hidden="" type="text" name="id" value="<?php echo $consulta["id"];?>"> 	
		<p>Predio: <input type="text" name="predio" size="50" maxlength="auto" width="auto" value="<?php echo $consulta["predio"];?>">
		  Endereço: <input type="text" name="endereco" size="50" value="<?php echo $consulta["endereco"];?>"></p><br />
		<p>Numro Chave: <input type="text" name="chave" size="10" value="<?php echo $consulta["nu_chave"];?>">
		DDR Inicial: <input type="text" name="ddrstar" size="10" value="<?php echo $consulta["ddr_inicial"];?>">
		DDR Final: <input type="text" name="ddrend" size="10" value="<?php echo $consulta["ddr_final"];?>">
		Total: <input type="text" name="total" value="<?php echo $consulta["total"];?>"></p>
		
	<?php } ?>	   
	    <div class="editar">
		<input type="submit" name="submit" value="Editar">
		</div>
		</form>
	</div>
	</div>
		</article>
</div>
	

</body>
<?php mysqli_free_result($unidade); ?>
<?php include_once("../includes/footer.php"); ?>


