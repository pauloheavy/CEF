<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php  $usuarios = encontrar_usuarios(); ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>

<div id="main">
	<div id="navigation">
	<br />
		<small>
			<a href="admin.php">&laquo; Menu Principal</a>
		</small>
	&nbsp;
 	</div>
 	<div id="page">
		<?php echo mensagem() ?>
		<h2>Gerenciar Usuários</h2>
		<table>
			<tr>
				<th style="text-align: left; width: 200px;">Usuário</th>
				<th colspan="2" style="text-align: left;">Ações</th>
			</tr>
		<?php while ($usuario = mysqli_fetch_assoc($usuarios)) { ?>
			<tr>
				<td><?php echo htmlentities($usuario["usuario"]); ?></td>
				<td><a href="edit_user.php?id=<?php echo urlencode($usuario["id"]); ?>">Editar</a></td>
				<td><a href="delete_user.php?id=<?php echo urlencode($usuario["id"]); ?>" onclick="return confirm('Tem Certeza que deseja Excluir o Usuário?');">Deletar</a></td>
			</tr>
			<?php } ?>
		</table>
		<br>	
			<a href="new_user.php">Adicionar Usuário</a>
			<hr />
			<br />

	</div>
  </div>			

<?php include_once("../includes/footer.php"); ?>


