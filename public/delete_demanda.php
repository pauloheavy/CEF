<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php encontrar_pagina_selecionada(); ?>
<?php
	if (isset($_GET['id'])) {
		$id = $_GET["id"];
		$query = "DELETE FROM demandas_soft_phone ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";
		$result = mysqli_query($conexao, $query);
			if ($result && mysqli_affected_rows($conexao) == 1) {
					//sucesso
				$_SESSION["mensagem"] = "demanda excluída com sucesso!";
				redirect_to("content.php");
			} else {
					//falhou
				$_SESSION["mensagem"] = "A demanda não pode ser Excluída. Por favor, contate o Administrador do sistema!";
				redirect_to("content.php");
			}

		}
			
?>

<?php include_once("../includes/footer.php"); ?>


