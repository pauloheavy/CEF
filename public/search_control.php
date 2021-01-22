<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php

if (isset($_POST['submit'])) {
			$cgc = $_POST['cgc'];
			$nome = $_POST['nome'];
				 
		//$campos_requeridos = array("cgc" & "norme"); 
		//validate_presences($campos_requeridos);
				
     	
			 						
			$query  = "SELECT * ";
			$query .= "FROM controle ";
			$query .= "WHERE (cgc='{$cgc}' OR nome='{$nome}')";
			$data = mysqli_query($conexao, $query);
			$total = mysqli_num_rows($data);
				
		//tratamento dos campos vazios.		
		} if ($_POST['cgc'] == "" AND $_POST['nome'] == "") {
			$_SESSION["mensagem"] = "Por favor, Informe o CGC ou o Nome!";
					redirect_to("search.php");
		
		} 
?>		   
<?php 
// Tratamento das consultas invalidas.
	if ($total == 0 ) {
				$_SESSION["mensagem"] = "CGC não encontrado.";
				redirect_to("search.php");		
			} 
   
 ?>	



<?php include_once("../includes/header.php"); ?>

<div id="main">
		
		<article>
		<div id="page">

		<button style="background: blue; border-radius: 10px; margin-left: 8%; margin-top: 3em;">	
			<b><a style="color: #ffffff; text-decoration: none;" href="search.php">Voltar</a></b>
		</button>	

		<?php
		//Codigo para listar ou editar as tabelas controles 
		while ($consulta = mysqli_fetch_assoc($data)) { ?>	
			<h2 style="color: blue;">Agência:&nbsp &nbsp</h2><h3><i style="color: #ffffff;"><?php echo $consulta["nome"]; ?></i></h3>
				
		<div class="search">
	 
	    <form action="edit_search.php?cgc=<?php echo urlencode($consulta["id"]); ?>" method="post">

		<p>&nbspId: <input style="margin-left: 2.5em; text-align: center; border-radius: 10px;" type="text" name="id" size="1" maxlength="auto" width="auto" value="<?php echo $consulta["id"];?>"></p><br />
		<p>CGC: <input style="margin-left: 1.7em; text-align: center; border-radius: 10px;" type="text" name="cgc" size="6" maxlength="auto" width="auto" value="<?php echo $consulta["cgc"];?>"></p><br />
		<p>Nome: <input style="margin-left: 1em; border-radius: 10px; text-align: center;" type="text" name="nome" size="50" maxlength="auto" width="auto" value="<?php echo $consulta["nome"];?>">&nbsp
		  DNS: <input type="text" style="text-align: center; border-radius: 10px;" name="dns" size="25" value="<?php echo $consulta["dns_centralizado"];?>"></p><br />
		<p>DDD: <input style="margin-left: 1.6em; text-align: center; border-radius: 10px;" type="text" name="ddd" size="1" value="<?php echo $consulta["ddd"];?>">&nbsp
		DDD Inicial: <input type="text" style="text-align: center; border-radius: 10px;" name="ddrstar" size="10" value="<?php echo $consulta["ddr_inicial"];?>">&nbsp
		DDD Final: <input type="text" style="text-align: center; border-radius: 10px;" name="ddrend" size="10" value="<?php echo $consulta["ddr_final"];?>">&nbsp
		DDD Total: <input type="text" style="text-align: center; border-radius: 10px;" name="ddrtotal" size="10" value="<?php echo $consulta["ddr_total"];?>"></p><br />
		<p>Central: <input style="margin-left: 0.3em; text-align: center; border-radius: 10px;" type="text" name="central" value="<?php echo $consulta["central"];?>">&nbsp
		Modelo: <input type="text" style="border-radius: 10px; text-align: center;" name="modelo" size="23" value="<?php echo $consulta["modelo"];?>">&nbsp
		Serie: <input type="text" style="text-align: center;border-radius: 10px;" name="serie" size="15" value="<?php echo $consulta["num_serie"];?>"></p><br />
		<p>Portas: <input style="margin-left: 0.8em; text-align: center; border-radius: 10px;" type="text" name="portas" size="5" value="<?php echo $consulta["portas"];?>">&nbsp
		IP: <input type="text" style="text-align: center; border-radius: 10px;" name="ip" size="15" value="<?php echo $consulta["ip"];?>">&nbsp
		Operadora: <input type="text" style="text-align: center; border-radius: 10px;" name="opera" value="<?php echo $consulta["operadora"];?>"></p><br />
		<p>Sinalização: <input type="text" style="text-align: center; border-radius: 10px;" name="sinaliza" size="9" value="<?php echo $consulta["sinalizacao"];?>">&nbsp
		Garantia: <input type="text" style="text-align: center; border-radius: 10px;" name="garant" size="20" value="<?php echo $consulta["num_serie"];?>">&nbsp
		Empresa: <input type="text" style="text-align: center; border-radius: 10px;" name="empresa" size="20" value="<?php echo $consulta["empresa"];?>"></p><br>
		<p>Alarme : <input type="text" style="text-align: center; border-radius: 10px;" name="alarme" size="9" value="<?php echo $consulta["alarme"];?>">&nbsp
		Dial: <input type="text" style="text-align: center; border-radius: 10px;" name="dial" size="9" value="<?php echo $consulta["dial"];?>"></p><br>
		
		<?php //$pab = $consulta["pab"]; 	
			if ($consulta["pab"] > 0) { ?>
			
			
		<a href="search_control_pab.php?consultapab=<?php echo $consulta["pab"]; ?>" method="GET"><p>PAB</p></a>
	<?php	}?>
		
   <?php if ($_SESSION["user_nivel"] == "admin") {
   	# code...
   	    echo "<div class=\"editar\">";
		echo "<input type=\"submit\" style=\"border-radius: 10px;\" name=\"submit\" value=\"Editar\">";
		
	}	
	?>	
		
		</form>
		</div>

	<?php } ?>	
		</div>
		
		</article>
</div>
<?php mysqli_free_result($data); ?>
<?php include_once("../includes/footer.php"); ?>
</body>



