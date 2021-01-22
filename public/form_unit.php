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
		$query .= "FROM unidades ";
		$query .= "WHERE id={$id}";
		//$query .= "ORDER BY cgc ASC";
		$unidade = mysqli_query($conexao, $query);
		
	}
?>

<?php include_once("../includes/header.php"); ?>

<div id="main">
		<article>
		<div id="page">

		<?php while ($consulta = mysqli_fetch_assoc($unidade)) { ?>	
			<b><a style="color: #ffffff; text-decoration: none;" href="list_unit_cgc.php?cgc=<?php echo $consulta["cgc"];?>"><button style="background: blue; color: #ffffff; border-radius: 10px; margin-left: 8%; margin-top: 3em;">Voltar</button></a></b>
				

		<h2 style="color: #0040FF;">Informações:</h2>	

		 <div class="search">
		 <form action="edit_unit.php" method="post">
		<input hidden="" type="text" name="id" value="<?php echo $consulta["id"];?>"> 	
		<p>&nbspCGC: <input style="margin-left: 1.8em; border-radius: 10px; text-align: center;" type="text" name="cgc" size="3" maxlength="auto" width="auto" value="<?php echo $consulta["cgc"];?>"></p><br />
		<p>Nome: <input style="margin-left: 1.3em; border-radius: 10px; text-align: center;" type="text" name="nome" size="50" maxlength="auto" width="auto" value="<?php echo $consulta["nome"];?>">&nbsp
		  Link: <input style="border-radius: 10px; text-align: center;" type="text" name="link" size="2" value="<?php echo $consulta["links"];?>"></p><br />
		<p>Chave: <input style="margin-left: 1.1em; border-radius: 10px; text-align: center;" type="text" name="chave" size="10" value="<?php echo $consulta["chave"];?>">&nbsp
		DDD Inicial: <input style="border-radius: 10px; text-align: center;" type="text" name="ddrstar" size="10" value="<?php echo $consulta["ddr_inicial"];?>">&nbsp
		DDD Final: <input style="border-radius: 10px; text-align: center;" type="text" name="ddrend" size="10" value="<?php echo $consulta["ddr_final"];?>"></p><br>
		<p>Central: <input style="margin-left: 0.5em; border-radius: 10px; text-align: center;" type="text" name="central" size="25" value="<?php echo $consulta["marca"];?>">&nbsp
		Modelo: <input style="border-radius: 10px; text-align: center;" type="text" name="modelo" size="25" value="<?php echo $consulta["modelo"];?>">&nbsp
		Serie: <input style="border-radius: 10px; text-align: center;" type="text" name="serie" size="15" value="<?php echo $consulta["nun_serie"];?>"></p><br />
		<p>Portas: <input style="margin-left: 1em; text-align: center; border-radius: 10px;" type="text" name="portas" size="5" value="<?php echo $consulta["porta"];?>">&nbsp
		IP: <input style="border-radius: 10px; text-align: center;" type="text" name="ip" size="15" value="<?php echo $consulta["ip"];?>">&nbsp
		Operadora: <input style="border-radius: 10px; text-align: center;" type="text" name="opera" value="<?php echo $consulta["circuito"];?>">&nbsp
		Data: <input style="border-radius: 10px; text-align: center;" type="text" name="data" size="9" value="<?php echo $consulta["data"];?>"></p><br />
		<p>Dominio: <input style="border-radius: 10px; text-align: center;" type="text" name="dominio" size="40" value="<?php echo $consulta["dominio"];?>">&nbsp
		Garantia: <input style="border-radius: 10px; text-align: center;" type="text" name="garant" size="9" value="<?php echo $consulta["garantia"];?>">&nbsp
		Empresa: <input style="border-radius: 10px; text-align: center;" type="text" name="empresa" size="30" value="<?php echo $consulta["empresa"];?>"></p><br>
		<p>Data Manutenção : <input style="border-radius: 10px; text-align: center;" type="text" name="manuten" size="10" value="<?php echo $consulta["data_manutencao"];?>"></p><br>

		<?php } ?>	
		<?php if ($_SESSION["user_nivel"] == "admin") { ?>	
		<div class="editar">
		<input type="submit" name="submit" value="Editar">
		<?php } ?>
		</div>
		</form>
		</div>
		</article>
	</div>

</body>
<?php mysqli_free_result($unidade); ?>
<?php include_once("../includes/footer.php"); ?>


