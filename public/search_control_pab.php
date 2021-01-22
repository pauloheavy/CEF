<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php

	if (isset($_GET['consultapab'])) {
		
		 
		//$campos_requeridos = array("pab");
		//validate_presences($campos_requeridos);
     	
		//if(!empty($errors)){
		$pab = $_GET['consultapab'];	
		//$categorias = "SHOW TABLES FROM $dbname";
		$query  = "SELECT * ";
		$query .= "FROM controle ";
		$query .= "WHERE cgc ='{$pab}'";
		//$query .= "ORDER BY cgc ASC";
		$data = mysqli_query($conexao, $query);
		if (!$data) {
			$_SESSION["mensagem"] = "CGC não encontrado.";
			redirect_to("search.php");
		}

	}if ($_GET['consultapab'] == "") {
			$_SESSION["mensagem"] = "Não há PAB vinculado a esta Agência!";
					redirect_to("search.php");
		
		} 
		  		
	//}
	
?>

<?php include_once("../includes/header.php"); ?>

<div id="main">
		<div id="navigation">
			<br />
			<small>
				<a href="admin.php">&laquo; Menu Principal</a>
			</small>
			<ul class="categories">
			<b>
			    <li>
			 	<p><li><a href="agenda.php">Agenda</a></li></p>
			 	<p><li><a href="search.php">Controle</a></li></p>
			 	<p><li><a href="">Unidades</a></li></p>
			 	</li>
			</ul>
			<ul class="prefix">
			 	<li><a href="">Matriz</a>
			 		<ul class="submenu">	
			 			<li><a style="color: #d0d0d0;" href="">Matriz I</a></li>
			   			<li><a style="color: #d0d0d0;" href="">Matriz II</a></li>
			   			<li><a style="color: #d0d0d0;" href="">Matriz III</a></li>
			   		</ul>
			   <br />
			   	 <li><a href="">prefixo 3206</a>
						<ul class="submenu">
							<li><a style="color: #d0d0d0;" href="">3206 por faixa</a></li>
							<li><a style="color: #d0d0d0;" href="">3206 por predio</a></li>
						</ul>
			     </li>								
			    </li>			
			</ul>

		</div>
		<article>
		<div id="page">
			<?php
		//Codigo para listar ou editar as tabelas controles 
		while ($consulta = mysqli_fetch_assoc($data)) { ?>

			<h2 style="color: blue;">PAB:&nbsp &nbsp</h2><h3 style="margin-left: 12.8em;"><?php echo $consulta["nome"]; ?></h3>
		<div class="search">
	
		 <form action="edit_search.php?cgc=<?php echo urlencode($consulta["id"]); ?>" method="post">

		<p>Id: <input type="text" name="id" size="1" maxlength="auto" width="auto" value="<?php echo $consulta["id"];?>"></p><br />
		<p>CGC: <input type="text" name="cgc" size="1" maxlength="auto" width="auto" value="<?php echo $consulta["cgc"];?>"></p><br />
		<p>Nome: <input type="text" name="nome" size="50" maxlength="auto" width="auto" value="<?php echo $consulta["nome"];?>">
		  DNS: <input type="text" name="dns" value="<?php echo $consulta["dns_centralizado"];?>"></p><br />
		<p>DDD: <input type="text" name="ddd" size="1" value="<?php echo $consulta["ddd"];?>">
		DDD Inicial: <input type="text" name="ddrstar" size="9" value="<?php echo $consulta["ddr_inicial"];?>">
		DDD Final: <input type="text" name="ddrend" size="9" value="<?php echo $consulta["ddr_final"];?>">
		DDD Total: <input type="text" name="ddrtotal" size="5" value="<?php echo $consulta["ddr_total"];?>"></p><br />
		<p>Central: <input type="text" name="central" value="<?php echo $consulta["central"];?>">
		Modelo: <input type="text" name="modelo" size="15" value="<?php echo $consulta["modelo"];?>">
		Serie: <input type="text" name="serie" size="15" value="<?php echo $consulta["num_serie"];?>"></p><br />
		<p>Portas: <input type="text" name="portas" size="5" value="<?php echo $consulta["portas"];?>">
		IP: <input type="text" name="ip" size="9" value="<?php echo $consulta["ip"];?>">
		Operadora: <input type="text" name="opera" value="<?php echo $consulta["operadora"];?>"></p><br />
		<p>Sinalização: <input type="text" name="sinaliza" size="9" value="<?php echo $consulta["sinalizacao"];?>">
		Garantia: <input type="text" name="garant" size="9" value="<?php echo $consulta["num_serie"];?>">
		Empresa: <input type="text" name="empresa" size="30" value="<?php echo $consulta["empresa"];?>"></p><br>
		<p>Alarme : <input type="text" name="alarme" size="9" value="<?php echo $consulta["alarme"];?>">
		Dial: <input type="text" name="dial" size="9" value="<?php echo $consulta["dial"];?>"></p><br>
								
	<?php } ?>	

		<div class="editar">
		<input type="submit" name="submit" value="Editar">
		
		&nbsp &nbsp<a href="search.php">Voltar</a>
		</div>
	</div><br>
  </form><br>
 </article>
		
	</div>
	</div>

</body>
<?php include_once("../includes/footer.php"); ?>


