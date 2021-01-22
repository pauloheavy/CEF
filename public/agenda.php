<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php //confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php  find_agenda(); ?>

<?php  $query = "SELECT * ";
		$query .= "FROM agenda ";
		//if ($public) {
		//	$query .= "WHERE cgc=" " ";
		//}		
		//$query .= "ORDER ASC";
		$agenda = mysqli_query($conexao, $query);
		confirmar_resultado($agenda);
		
?>
 	
		<div id="agenda">
			<div class="search">
				<h3><div style="text-align: center; font-size: 13pt; color: #0B610B;" class="mensage"><?php echo mensagem();?></div></h3>
				
			<table border="1" style="border-radius: 10px; background-color: #fff; padding: 5px; " >
				<thead>
				<tr style="background-color: #0B610B; color: #FFFFFF; border-radius: 5px; font-size: 11pt;">
					<td hidden="" style="text-align: center;">ID</td>
					<td style="text-align: center; border-radius: 9px; padding: 5px; ">Nome</td>
					<td style="text-align: center;border-radius:  8px; "><b>Telefone</b></td>
					<td style="text-align: center; border-radius: 8px; ">Celular</td>
					<td style="text-align: center; border-radius: 8px;">Email</td>
					<td style="text-align: center; border-radius: 8px;">Observações</td>
					<?php if ($_SESSION["user_nivel"] == "admin"){
						echo "<td style=\"text-align: center; border-radius: 8px;\"><a style=\"color: blue;\" href=\"add_agenda.php\">CADASTRAR</a></td></b>";	
					}?>				
				</tr>
				</thead>
			   <tbody>
				<tr><a href="">
				<?php   while ($consulta = mysqli_fetch_assoc($agenda)) { ?>
					<td hidden=""><?php echo $consulta["id"]; ?></td>
					<td style="background-color: #F5F6CE; border-radius: 2px; padding: 5px;"><?php echo $consulta["nome"]; ?></td>
					<td style="background-color: #F5F6CE; border-radius: 2px;"><?php echo $consulta["telefone"]; ?></td>
					<td style="background-color: #F5F6CE; border-radius: 2px;"><?php echo $consulta["celular"]; ?></td>
					<td style="background-color: #F5F6CE; border-radius: 2px;"><?php echo $consulta["email"]; ?></td>
					<td style="background-color: #F5F6CE; border-radius: 2px;"><?php echo $consulta["observacoes"]; ?></td>

					<?php if ($_SESSION["user_nivel"] == "admin"){
					//valida se nivel de acesso ?>
					<td style="text-align: center;">
					<a href="edit_agenda.php?id=<?php echo urlencode($consulta["id"]); ?>"
					method="post"><img src="imagens/edite.png" alt="editar" width="25" height="25"></a>&nbsp&nbsp&nbsp<a href="delete_agenda.php?id=<?php echo urlencode($consulta["id"]); ?>" method="post" onclick="return confirm('Tem certeza que deseja excluir o cadastro de <?php echo $consulta["nome"];?>?')"><img src="imagens/delete.png" alt="delete" width="25\" height="25"></a></td>	
				</a><?php }?>		
				</tr>
				</tbody>
			<?php } ?>	
			</table>

			</div>
		</div>
	</div>
<?php include_once("../includes/footer.php"); ?>


