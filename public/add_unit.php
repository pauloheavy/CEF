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
		$campos_requeridos = array("cgc", "nome", "central", "chave", "ddr_start", "ddr_end", "ip", "porta", "operadora", "circuito" );
		validate_presences($campos_requeridos);

		$campos_limitados = array("nome" => 60);
		validate_max_lengths($campos_limitados);

		if(empty($errors)) {
					
		$nome = mysql_prep($_POST["nome"]);
		$cgc = $_POST["cgc"];
		$central = $_POST["central"];
		$chave = $_POST["chave"];
		$ddr_start = $_POST["ddr_start"];
		$operadora = mysql_prep($_POST["operadora"]);
		$ip = $_POST["ip"];
		$porta = $_POST["porta"];
		$ddr_end = $_POST["ddr_end"];
		$circuito = $_POST["circuito"];
		$dominio = $_POST["dominio"];
		$serie = $_POST["serie"];
		$data_ativa = $_POST["data_ativa"];
		$garantia = $_POST["garantia"];
		$data_manu = $_POST["data_manu"];
		$link = $_POST["link"];
		$modelo = $_POST["modelo"];
		$empresa = $_POST["empresa"];


		//ecesando o banco		
		$query = "INSERT INTO unidades (";
		$query .= " cgc, nome, links, chave, ddr_inicial, ddr_final, marca, modelo, nun_serie, porta, ip, dominio, circuito, data, garantia, data_manutencao, empresa";
		$query .= ") VALUES (";
		$query .= " '{$cgc}', '{$nome}', '{$link}', '{$chave}', '{$ddr_start}', '{$ddr_end}', '{$central}', '{$modelo}', '{$serie}', '{$porta}', '{$ip}', '{$dominio}', '{$circuito}', '{$data_ativa}', '{$garantia}', '{$data_manu}', '{$empresa}'";
		$query .= ")";
		$result = mysqli_query($conexao, $query);

		if ($result) {
				//sucesso
			$_SESSION["mensagem"] = "Unidade adicionada com sucesso!";
			redirect_to("search_unidades.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "A unidade não pode ser  criada.";
			redirect_to("search_unidades.php");
		}
		}
		 
		 
	} 
?>
<div id="main">
		
		<article>
	<div id="page">
			<div><?php echo mensagem();?></div>
		 	
					
			<h2 style="color: blue;">Adicionar Unidade:</h2>
				
		<div class="search">
	 
	    <form action="add_unit.php" method="post">
	    <p>CGC: <input type="text" name="cgc" size="6" maxlength="auto" width="auto" value=""></p><br />
	    <p>Nome: <input type="text" name="nome" size="60" maxlength="auto" width="auto" value=""></p><br />
	    <p>N° Chave: <input type="text" name="chave" size="12" maxlength="auto" width="auto" value="">
	    DDR Inicial: <input type="text" name="ddr_start" size="12" maxlength="auto" width="auto" value="">
	    DDR Final: <input type="text" name="ddr_end" size="12" maxlength="auto" width="auto" value="">
	    Total de Links: <input type="text" name="link" size="4" maxlength="auto" width="auto" value=""></p><br />
	    <p>Central: <input type="text" name="central" size="30" maxlength="auto" width="auto" value="">
	    N° Série: <input type="text" name="serie" size="30" maxlength="auto" width="auto" value=""></p><br />
	   <p>Modelo: <input type="text" name="modelo" size="15" maxlength="auto" width="auto" value="">	
	    N° Portas: <input type="text" name="porta" size="5" maxlength="auto" width="auto" value="">
	    IP: <input type="text" name="ip" size="15" maxlength="auto" width="auto" value=""></p><br>
	    <p>Domínio: <input type="text" name="dominio" size="30" maxlength="auto" width="auto" value="">	
		Operadora: <input type="text" name="operadora" size="15" maxlength="auto" width="auto" value=""></p><br />
		<p>Data Ativação: <input type="text" name="data_ativa" size="10" maxlength="auto" width="auto" value="">
		  Circuito: <input type="text" name="circuito" size="15" value=""></p><br />
		<p>Data Manutenção: <input type="text" name="data_manu" size="10" value="">
		Garantia: <input type="text" name="garantia" size="15" value="">
		Empresa: <input type="text" name="empresa" size="15" value=""></p><br>
		
		
		
   
	<div class="editar">
		<input type="submit" name="submit" value="Cadastrar">
		
		&nbsp &nbsp<a href="search.php">Voltar</a>
		</div><br>
		</form><br>
					<div style="margin-left: 10%;"><h3><?php echo form_errors($errors); ?></h3></div>
			</article>
			
		</div>	

	</div>		

</div>

	
<?php if (isset($conexao)) { mysqli_close($conexao); } ?>

<?php include_once("../includes/footer.php"); ?>
</body>