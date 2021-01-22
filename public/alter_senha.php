<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php  $usuarios = encontrar_usuarios(); ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>

<div id="main">
	<div id="navigation">
	
 	</div>
 	<div id="page">
		<?php echo mensagem() ?>
		<div id="adduser">
		<h2 style="margin-left: 0em; color: #2E2EFE;">Alterar Senha</h2>
		<table>
			<tr>
				<th style="text-align: left; width: 200px;">Usuário</th>
				<th colspan="2" style="text-align: left;">Ações</th>
			</tr>
			<tr>
				<td><?php echo htmlentities($_SESSION["user"]); ?></td>
				<td><a style="color: #298A08;" href="edit_senha_user.php?id=<?php echo urlencode($_SESSION["usuario_id"]); ?>">Editar</a></td>
				
			</tr>
		</table>
		
		<br>	
			
			<hr />
			<br />
		</div>	
	</div>
  </div>			

<?php include_once("../includes/footer.php"); ?>


