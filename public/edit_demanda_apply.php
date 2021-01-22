<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php
	if (isset($_POST['submit'])) {
		// formulario foi submetido
		$id = $_POST["id"];
		$prefixo = $_POST["prefixo"];
		$matricula = $_POST["matricula"];
		$ramal = $_POST["ramal"];
		$dns = $_POST["dns"];
		$softphone = $_POST["softphone"];
		$status = $_POST["status"];
		$data = $_POST["data"];
		$observacoes = $_POST["observacoes"];
		$cgc = $_POST["cgc"];

		$campos_requeridos = array("prefixo", "ramal", "softphone", "status", "data", "observacoes");
		validate_presences($campos_requeridos);

		if(empty($errors)) {							
				
		//ecesando o banco		
		$query = "UPDATE demandas_soft_phone SET ";
		$query .= "matricula = '{$matricula}', ";
		$query .= "prefixo = '{$prefixo}', "; 
		$query .= "ramal = '{$ramal}', "; 
		$query .= "softphone = '{$softphone}', ";
		$query .= "dns = '{$dns}', "; 
		$query .= "status = '{$status}', ";
		$query .= "data = '{$data}', ";
		$query .= "descricao = '{$observacoes}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
	 		$result = mysqli_query($conexao, $query);
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "A demanda foi atualizada.";
			redirect_to("search_demanda_result.php?cgc=$cgc");
		} else {
				//falhou
			$_SESSION["mensagem"] = "A demanda não pode ser atualizada.";
			redirect_to("search_demandas.php");			
		}
	} 
}
?>

