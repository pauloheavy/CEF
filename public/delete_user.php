<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php encontrar_pagina_selecionada(); ?>
<?php
	$usuario = encontrar_usuario_por_id($_GET["id"], false);
	if (!$usuario) {
		redirect_to("maneger_users.php"); 
	}
	
	$id = $usuario["id"];
	$query = "DELETE FROM users ";
	$query .= "WHERE id = {$id} ";
	$query .= "LIMIT 1";
	$result = mysqli_query($conexao, $query);
		if ($result && mysqli_affected_rows($conexao) == 1) {
				//sucesso
			$_SESSION["mensagem"] = "Usuário Foi Excluída com sucesso!";
			redirect_to("maneger_users.php");
		} else {
				//falhou
			$_SESSION["mensagem"] = "Usuário não pode ser excluído!";
			redirect_to("maneger_users.php");
		}

?>

<?php include_once("../includes/footer.php"); ?>


