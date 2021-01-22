<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php require_once("../includes/validations.php"); ?>
<?php include_once("../includes/header.php"); ?>


<?php
	if (isset($_POST['submit'])) {
		// formulario foi submetido

		if ($_POST['tipo'] == "Agencia" ) {

			$tipo = _1;
		
		} elseif ($_POST['tipo'] == "PAB") {
			# code...
			$tipo = _2;
		
		}if ($_POST['tipo'] == "PAE") {
			# code...
			$tipo = _3;
		}
		//validações 
		$campos_requeridos = array("cgc", "unidade", "chave", "ddr_start", "ddr_end", "data", "dns");
		validate_presences($campos_requeridos);

		$campos_limitados = array("nome" => 60);
		validate_max_lengths($campos_limitados);

		if(empty($errors)) {
					
		$cgc = mysql_prep($_POST["cgc"]);
		$unidade = mysql_prep($_POST["unidade"]);
		$chave = $_POST["chave"];
		$ddr_start = mysql_prep($_POST["ddr_start"]);
		$ddr_end = $_POST["ddr_end"];
		$ativo = $_POST["ativo"];
		$dns = $_POST["dns"];
		$data = $_POST["data"];
		$observacoes = mysql_prep($_POST["observacoes"]);
		$cgcid = $tipo;
		
		//ecesando o banco		
		$query = "INSERT INTO centralizado (";
		$query .= "cgc, unidade, chave, ddr_inicial, ddr_final, ativo, dns, data_instalacao, observacao, cgc_id ";
		$query .= ") VALUES (";
		$query .= " '{$cgc}', '{$unidade}', '{$chave}', '{$ddr_start}', '{$ddr_end}', '{$ativo}', '{$dns}', '{$data}', '{$observacoes}', concat('{$cgc}','{$cgcid}')";
		$query .= ")";
		$result = mysqli_query($conexao, $query);

		if ($result) {

		$query = "INSERT INTO ramais_ag_centralizado (";
		$query .= "cgc, ramal ";
		$query .= ") VALUES (";
		$query .= " concat('{$cgc}','{$cgcid}'), $ddr_start";
		$query .= ")";
		$result = mysqli_query($conexao, $query);

				//sucesso
			$_SESSION["mensagem"] = "Agência adicionada com sucesso!";
			redirect_to("search_centralizado.php?categoria=" . urlencode($categoria_atual["id"]));
		} else {
				//falhou
			$_SESSION["mensagem"] = "A agência não pode ser criada.";
			redirect_to("search_centralizado.php");
		}
		}
		 
		 
	} 
?>
<div id="main">
		
		<article>
	<div id="page">
			<div><?php echo mensagem();?></div>

		 	
					
			<h2 style="color: blue;">Cadastrar Agência no Ambiente Centralizado:</h2>
				
		<div class="search">
	 
	    <form action="add_centralizado.php" method="post">
		<p>CGC*: <input type="text" style="text-align: center;" name="cgc" size="2" maxlength="auto" width="auto" value="">&nbsp
		PV:	<SELECT name="tipo">
			 	<option>Agencia</option>
			 	<option>PAB</option>
			 	<option>PAE</option>
			 </SELECT></p><br />
		<p>Unidade Nome*: <input type="text" name="unidade" size="30" maxlength="auto" width="auto" value=""></p><br />
		<p>Chave*: <input type="text" style="text-align: center;" name="chave" size="10" value="">&nbsp&nbsp
		DDR Inicial*: <input type="text" style="text-align: center;" name="ddr_start" size="5" maxlength="auto" width="auto" value="">&nbsp&nbsp
		DDR Final*: <input type="text" style="text-align: center;" name="ddr_end" size="5" maxlength="auto" width="auto" value="">
		Total de Ramais Ativo: <input type="ativo" style="text-align: center;" name="ativo" size="5" value=""></p><br />
		<p>DnS*: <input type="text" name="dns" size="20" value="">
		Data de Intalação*: <input type="text" style="text-align: center;" name="data" size="15" maxlength="auto" width="auto" value=""></p><br>
		  
		<p>Observações:</p><p><textarea name="observacoes" rows="8" cols="70"></textarea></p>
		
		
   
	<div class="editar">
		<input type="submit" name="submit" value="Cadastrar">
		
		&nbsp &nbsp<a href="search_centralizado.php">Voltar</a>
		</div><br>
		</form><br>
			</article>
			<?php echo form_errors($errors); ?>
		</div>	

	</div>		

</div>

	
<?php if (isset($conexao)) { mysqli_close($conexao); } ?>

<?php include_once("../includes/footer.php"); ?>
</body>