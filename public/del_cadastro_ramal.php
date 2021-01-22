<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php encontrar_pagina_selecionada(); ?>
<?php
	if (isset($_GET['id'])) {
		$id = $_GET["id"];
		$cgc = $_GET["cgc"];
		$cgc_id = $_GET["cgc_id"];
		$query = "DELETE FROM ramais_ag_centralizado ";
		$query .= "WHERE ramal = {$id} ";
		$query .= "LIMIT 1";
		$result = mysqli_query($conexao, $query);
			if ($result && mysqli_affected_rows($conexao) == 1) {
					//sucesso
				$_SESSION["mensagem"] = "Ramal Exclído com sucesso!";
				redirect_to("form_ramais_cadastro_teste.php?id=$cgc&&cgc=$cgc_id");
			} else {
					//falhou
				$_SESSION["mensagem"] = "O ramal não pode ser Excluído. Por favor, contate o Administrador do sistema!";
				redirect_to("form_ramais_cadastro_teste.php?id=$cgc&&cgc=$cgc_id");
			}

		}
			
?>

<?php include_once("../includes/footer.php"); ?>


