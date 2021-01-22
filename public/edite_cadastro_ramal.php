<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php
	if (isset($_POST['submit']) || isset($_GET['id'])) {
		// formulario foi submetido
		$cgc = $_POST["cgc"];
 		$id = $_POST['id'];
 		$ramal = $_POST['ramal'];
 		$aparelho = $_POST['aparelho'];
 		$matricula = $_POST['matricula'];
 		$data = $_POST['data'];
 		$observacao = $_POST['observa'];
		
		

		 							
		
		
		//ecesando o banco		
		$query = "UPDATE ramais_ag_centralizado SET ";
		$query .= "ramal = '{$ramal}', "; 
		$query .= "aparelho = '{$aparelho}', "; 
		$query .= "matricula = '{$matricula}', ";
		$query .= "data_instalacao = '{$data}', "; 
		$query .= "observacao = '{$observacao}' ";
		$query .= "WHERE ramal = '{$ramal}' ";
		$query .= "LIMIT 1";
	 		$result = mysqli_query($conexao, $query);
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "O Prédio Foi Atualizado.";
			redirect_to("form_ramais_cadastro_teste.php?id=$cgc");
		} else {
				//falhou
			$_SESSION["mensagem"] = "Não Foi Atualizada.";
			redirect_to("content.php");
		}
	 
}
?>
