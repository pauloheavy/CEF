<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php

	if (isset($_GET['id'])) {
		
		 
		$id = $_GET['id'];
		$cgc_id = $_GET['cgc'];
		//$categorias = "SHOW TABLES FROM $dbname";
		$query  = "SELECT * ";
		$query .= "FROM ramais_ag_centralizado ";
		$query .= "WHERE cgc='{$id}'";
		//$query .= "ORDER BY cgc ASC";
		$data = mysqli_query($conexao, $query);
		
	}
?>

<?php include_once("../includes/header.php"); ?>

<div id="main">
	<article>
		<div id="page">
	
			<h1 style="text-align: center; margin-top: 3%;">Agência Centralizado :<?php echo $id; ?>  </h1>

			<h3><div style="margin-left: 20%; font-size: 13pt; color: #0B610B; margin-top: 5%; margin-bottom: -3%;" class="mensage"><?php echo mensagem();?></div></h3>

			<div class="search" style="margin-left: 10%; margin-top: 2%;">
				
			<b><a style=" text-decoration: none;" href="form_centralizado.php?id=<?php echo $cgc_id; ?>"><button style="background: blue; color: #ffffff; border-radius: 10px; margin-left: -10%; margin-top: -1em;">Voltar</button></a></b>	
		
		<form name="form2" action="edite_cadastro_ramal.php" method="post">
		
		<?php   while ($demanda = mysqli_fetch_assoc($data)) { ?>
			<!-- <input type="text"  name="cgc" value="<?php //echo $demanda['cgc'];?>"> -->

			<input type="text" hidden="" name="id" value="<?php echo $demanda['id'];?>">
			Ramal:&nbsp<input type="text" name="ramal" size="6" style="text-align: center;" value="<?php echo $demanda['ramal'];?>">
			Aparelho:&nbsp<input type="text" name="aparelho" style="text-align: center;" value="<?php echo $demanda['aparelho'];?>">
			Matricula:&nbsp<input type="text" name="matricula" style="text-align: center;" value="<?php echo $demanda['matricula'];?>">
			Data Instalação:&nbsp<input type="text" size="10" name="data" style="text-align: center;" value="<?php echo $demanda['data_instalacao'];?>">
			Observação:&nbsp<input type="text" name="observa" style="text-align: center;" value="<?php echo $demanda['observacao'];?>">

			<!--<input type="submit" name="submit" value="Editar">--> 

			<a href="del_cadastro_ramal.php?id=<?php echo $demanda['ramal'];?>&&cgc=<?php echo $id; ?>&&cgc_id=<?php echo $cgc_id; ?>">

			<input type="button" value='Excluir campo'></a><br>
		
	</form>
		<form name="form1" action="apply_cadastro_ramais.php?id=<?php echo $cgc_id; ?>" method="post">
			<input hidden="" type="text" name="cgc" value="<?php echo $demanda['cgc']; ?>">
			<input hidden="" type="text" name="cgc_id" value="<?php echo $cgc_id; ?>">
<?php } ?>
		 	<script type="text/javascript">
			var qtdeCampos = 1;

			function addCampos() {
			var objPai = document.getElementById("campoPai");
			//Criando o elemento DIV;
			var objFilho = document.createElement("div");
			//Definindo atributos ao objFilho:
			objFilho.setAttribute("id","filho"+qtdeCampos);

			//Inserindo o elemento no pai:
			objPai.appendChild(objFilho);
			//Escrevendo algo no filho recém-criado:
			document.getElementById("filho"+qtdeCampos).innerHTML = "Ramal:&nbsp<input type='text' id='campo"+qtdeCampos+"' name='campo[]' size='6' style='text-align: center;' value=''>&nbspAparelho:&nbsp<input type='text' id='campo"+qtdeCampos+"' name='campo[]' style='text-align: center;' value=''> Matricula:&nbsp<input type='text' id='campo"+qtdeCampos+"' name='campo[]' style='text-align: center;' value=''> Data Instalação:&nbsp<input type='text' id='campo"+qtdeCampos+"' size='10' name='campo[]' style='text-align: center;' value=''> Observação:&nbsp<input type='text' id='campo"+qtdeCampos+"' name='campo[]' style='text-align: center;' value=''> <input type='button' onClick='removerCampo("+qtdeCampos+")' value='Apagar campo'>";
			qtdeCampos++;
			}

			function removerCampo(id) {
			var objPai = document.getElementById("campoPai");
			var objFilho = document.getElementById("filho"+id);

			//Removendo o DIV com id específico do nó-pai:
			var removido = objPai.removeChild(objFilho);
			}
			</script>

		
			
				<div id="campoPai"></div><br>
				<input type="button" value="Adicionar campos" onclick="addCampos()">
				<br><br><input type="submit" value="Enviar">
			</form>	

			
		
	    </div>
    </div>
	</article>
</div>    
	

</body>
<?php mysqli_free_result($data); ?>
<?php include_once("../includes/footer.php"); ?>


