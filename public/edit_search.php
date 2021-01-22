<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
	//if (!$categoria_atual) {
	//	redirect_to("content.php"); 
//	}
?>

<?php
	if (isset($_POST['submit'])) {
		// formulario foi submetido
			
		//validações 
		$campos_requeridos = array("id");
		validate_presences($campos_requeridos);

		//$campos_limitados = array("nome" => 45);
		//validate_max_lengths($campos_limitados);

		$id = $_POST["id"];
		$cgc = $_POST["cgc"];	
		$nome = $_POST["nome"];	
		$serie  = $_POST["serie"]; 
		$dns = $_POST["dns"];	
		$ddd = $_POST["ddd"];	
		$ddrstar = $_POST["ddrstar"];
		$ddrend = $_POST["ddrend"]; 
		$ddrtotal = $_POST["ddrtotal"];
		$central = $_POST["central"]; 
		$modelo = $_POST["modelo"]; 
		$portas = $_POST["portas"];
		$ip = $_POST["ip"]; 
		$opera = mysql_prep($_POST["opera"]);
		$sinaliza = $_POST["sinaliza"];
		$garant = mysql_prep($_POST["garant"]);
		$empresa = mysql_prep($_POST["empresa"]);
		$alarme = $_POST["alarme"]; 
		$dial = $_POST["dial"];

		if(empty($errors)) {
			//processar logica senão houver erros.
		$query = "UPDATE controle SET ";
		$query .= "nome = '{$nome}', ";
		$query .= "num_serie = '{$serie}', ";
		$query .= "dns_centralizado = '{$dns}', ";
		$query .= "ddd = {$ddd}, ";
		$query .= "ddr_inicial = '{$ddrstar}', ";
		$query .= "ddr_final = '{$ddrend}', ";
		$query .= "ddr_total = '{$ddrtotal}', ";
		$query .= "central = '{$central}', ";
		$query .= "modelo = '{$modelo}', ";
		$query .= "portas = {$portas}, ";
		$query .= "ip = '{$ip}', ";
		$query .= "operadora = '{$opera}', ";
		$query .= "sinalizacao = '{$sinaliza}', ";
		$query .= "garantia = '{$garant}', ";
		$query .= "empresa = '{$empresa}', ";
		$query .= "alarme = '{$alarme}', ";
		$query .= "dial = '{$dial}' ";
		$query .= "WHERE `controle`.`id` = {$id} ";
		$query .= "LIMIT 1";
		$result = mysqli_query($conexao, $query);

		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "Agencia Atualizada.";
			redirect_to("search.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "Agencia não pode ser Atualizada.";
			redirect_to("search.php");
			
		}
	}
} else {
		// formulario não foi submetido
		
	}

?>

<?php include_once("../includes/header.php"); ?>

 	<div id="main">
		<div id="navigation">
		</div>
		<div id="page">

		<div class="mensage"><?php echo mensagem();?></div>

		 
		<br>
			<a href="search.php">Voltar</a>		
							
		<div id="error"><?php echo form_errors($errors); ?></div>

		
		</div>
	</div>

<?php include_once("../includes/footer.php"); ?>


