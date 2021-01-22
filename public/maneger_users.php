<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php  $usuarios = encontrar_usuarios(); ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>

<div id="main">
	<div class="search" style="margin-left: 8%; margin-right: 8%; margin-top: 2%;">
 	<div id="page">
		<?php echo mensagem() ?>
		<div id="adduser">
		<h2 style="margin-left: 0em; color: #2E2EFE;">Gerenciar Usuários</h2>
		<table>
			<tr>
				<th style="text-align: left; width: 200px;">Usuário</th>
				<th colspan="2" style="text-align: left;">Ações</th>
			</tr>
		<?php while ($usuario = mysqli_fetch_assoc($usuarios)) { ?>
			<tr>
				<td><?php echo htmlentities($usuario["name"]); ?></td>
				<td><a style="color: #298A08;" href="edit_user.php?id=<?php echo urlencode($usuario["id"]); ?>">Editar</a></td>
				<td><a href="delete_user.php?id=<?php echo urlencode($usuario["id"]); ?>" onclick="return confirm('Tem Certeza que deseja Excluir o Usuário?');">Deletar</a></td>
			</tr>
			<?php } ?>
		</table>
		
		<br>	
			<button style="background: #088A85;"><a style="color: #ffff; text-decoration: none;" href="add_user.php">Adicionar Usuário</a></button>
			<hr />
			<br />
		</div>	
	</div>
  </div>
 </div> 			

<?php include_once("../includes/footer.php"); ?>


