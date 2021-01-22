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
			//validações 
		$campos_requeridos = array("cgc", "matricula", "nome", "prefixo", "ramal", "status", "data", "logico", "chamado", "agencia", "softphone");
		validate_presences($campos_requeridos);

		$campos_limitados = array("nome" => 60);
		validate_max_lengths($campos_limitados);

		if(empty($errors)) {
					
		$cgc = mysql_prep($_POST["cgc"]);
		$matricula = $_POST["matricula"];
		$nome = $_POST["nome"];
		$prefixo = $_POST["prefixo"];
		$status = mysql_prep($_POST["status"]);
		$ramal = $_POST["ramal"];
		$data = $_POST["data"];
		$observacoes = mysql_prep($_POST["observacoes"]);
		$logico = $_POST["logico"];
		$chamado = $_POST["chamado"];
		$agencia = mysql_prep($_POST["agencia"]);
		$dns = mysql_prep($_POST["dns"]);
		$softphone = $_POST["softphone"];
		
		//ecesando o banco		
		$query = "INSERT INTO demandas_soft_phone (";
		$query .= "  matricula, nome, prefixo, ramal, unidade, dns, nome_ag, chamado, nome_logico, softphone, status, data, descricao ";
		$query .= ") VALUES (";
		$query .= " '{$matricula}', '{$nome}', '{$prefixo}', '{$ramal}', '{$cgc}', '{$agencia}', '{$dns}', '{$chamado}', '{$logico}', '{$softphone}', '{$status}', '{$data}', '{$observacoes}'";
		$query .= ")";
		$result = mysqli_query($conexao, $query);

		if ($result) {
				//sucesso
			$_SESSION["mensagem"] = "Demanda criada com sucesso!";
			redirect_to("content.php?categoria=" . urlencode($categoria_atual["id"]));
		} else {
				//falhou
			$_SESSION["mensagem"] = "A Demanda não pode ser  criada.";
			redirect_to("content.php");
		}
		}
		 
		 
	} 
?>
<div id="main">
		
		<article>
	<div id="page">
			<div><?php echo mensagem();?></div>

		<div class="search"> 

		<button style="background: blue; border-radius: 10px; margin-left: 6%; margin-top: 3em;">	
			<b><a style="color: #ffffff; text-decoration: none;" href="search_demandas.php">Voltar</a></b></button>			
			<h2 style="color: blue;">Cadastrar Demanda:</h2>
					 
	    <form action="add_demanda.php" method="post">
		<p>CGC*: <input type="text" name="cgc" size="5" maxlength="auto" width="auto" value=""></p><br />
		<p>Matricula*: <input type="text" name="matricula" size="10" maxlength="auto" width="auto" value="">
		  Nome*: <input type="text" name="nome" size="55" value=""></p><br />
		<p>Prefixo*: <input type="text" name="prefixo" size="5" value="">&nbsp&nbsp
		Ramal*: <input type="text" name="ramal" size="5" maxlength="auto" width="auto" value="">&nbsp&nbsp
		Agência*: <input type="text" name="agencia" size="30" maxlength="auto" width="auto" value=""></p><br>
		<p>DnS: <input type="text" name="dns" size="30" maxlength="auto" width="auto" value="">
		 WO ou REQ*: <input type="text" name="chamado" size="30" value=""></p><br>
		<p>Nome Lógico*: <input type="text" name="logico" size="24" value="">
		Soft Phone*: <input type="text" name="softphone" size="15" value="">
		Status*: <input type="text" name="status" size="15" maxlength="auto" width="auto" value=""></p><br>
		<p>Data*: <input type="text" name="data" size="15" maxlength="auto" width="auto" value=""></p><br>
		  
		<p>Observações:</p><p><textarea name="observacoes" rows="8" cols="70"></textarea></p>
		
		
   
	<div class="editar">
		<input type="submit" name="submit" value="Cadastrar">
		
		
		</div>
		</form>
	</article>
			<div style="margin-right: 50%; float: right; margin-top: 1%;">
			<?php echo form_errors($errors); ?>
			</div>
		</div>	

	</div>		

</div>

	
<?php if (isset($conexao)) { mysqli_close($conexao); } ?>

<?php include_once("../includes/footer.php"); ?>
</body>