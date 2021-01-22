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
		$query .= "FROM demandas_soft_phone ";
		$query .= "WHERE id={$id}";
		//$query .= "ORDER BY cgc ASC";
		$demanda = mysqli_query($conexao, $query);
		
	}
?>

<?php include_once("../includes/header.php"); ?>

<div id="main">
		<article>
		<div id="page">


				
		<div class="search">
		<?php	while ($consulta = mysqli_fetch_assoc($demanda)) { ?>
			<button style="background: blue; border-radius: 10px; margin-left: 6%; margin-top: 3em; margin-bottom: -10em;">	
			<b><a style="color: #ffffff; text-decoration: none;" href="search_demanda_result.php?cgc=<?php echo $consulta["unidade"];?>">Voltar</a></b>
		    </button>
		    <h2 style="color: #0040FF;">Informações:</h2>
	 
		 <form action="edit_demanda_apply.php" method="post">
		<input hidden="" type="text" name="id" value="<?php echo $consulta["id"];?>"> 	
		<p>&nbspCGC: <input style="margin-left: 1.8em; border-radius: 10px; text-align: center;" type="text" name="cgc" size="3" maxlength="auto" width="auto" value="<?php echo $consulta["unidade"];?>"></p><br />
		<p>Matricula: <input style="margin-left: 1.3em; border-radius: 10px; text-align: center;" type="text" name="matricula" size="9" maxlength="auto" width="auto" value="<?php echo $consulta["matricula"];?>">&nbsp
		  Nome: <input style="border-radius: 10px; text-align: center;" type="text" name="link" size="60" value="<?php echo $consulta["nome"];?>"></p><br />
		<p>Prefixo: <input style="margin-left: 1.1em; border-radius: 10px; text-align: center;" type="text" name="prefixo" size="10" value="<?php echo $consulta["prefixo"];?>">&nbsp
		Ramal: <input style="border-radius: 10px; text-align: center;" type="text" name="ramal" size="10" value="<?php echo $consulta["ramal"];?>">&nbsp
		Agência: <input style="border-radius: 10px; text-align: center;" type="text" name="ddrend" size="30" value="<?php echo $consulta["nome_ag"];?>"></p><br>
		<p>WO: <input style="margin-left: 0.5em; border-radius: 10px; text-align: center;" type="text" name="central" size="25" value="<?php echo $consulta["chamado"];?>">&nbsp
		Nome Lógico: <input style="border-radius: 10px; text-align: center;" type="text" name="nome_logico" size="25" value="<?php echo $consulta["nome_logico"];?>">&nbsp
		SoftPhone: <input style="border-radius: 10px; text-align: center;" type="text" name="softphone" size="15" value="<?php echo $consulta["softphone"];?>"></p><br />
		<p>Status: <input style="margin-left: 1em; text-align: center; border-radius: 10px;" type="text" name="status" size="15" value="<?php echo $consulta["status"];?>">&nbsp
		Data da Instalação: <input style="border-radius: 10px; text-align: center;" type="text" name="data" size="15" value="<?php echo $consulta["data"];?>"></p><br>
		<p>DnS: <input style="border-radius: 10px; text-align: center;" type="text" name="dns" size="30" value="<?php echo $consulta["dns"];?>"></p><br>
		<p>Descrição:</p><p> <textarea name="observacoes" rows="10" cols="65"><?php echo $consulta["descricao"];?>
				<?php } ?></textarea></p>
		
		<?php if ($_SESSION["user_nivel"] == "admin" OR $_SESSION["user_nivel"] == "suporte") { ?>

		<div class="editar">
		<input type="submit" name="submit" value="Editar">
		
		</div>
		<?php } ?>
		</form>
		</div>
		</div>
	</article>
</div>	
	

</body>
<?php mysqli_free_result($demanda); ?>
<?php include_once("../includes/footer.php"); ?>

