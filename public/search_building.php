<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php

	if (isset($_GET['id'])) {
		
		 
		$id = $_GET['id'];	
		//$categorias = "SHOW TABLES FROM $dbname";
		$query  = "SELECT * ";
		$query .= "FROM matriz ";
		$query .= "WHERE id={$id}";
		//$query .= "ORDER BY cgc ASC";
		$unidade = mysqli_query($conexao, $query);
		
	}
?>

<?php include_once("../includes/header.php"); ?>

<div id="main">
		
	<article>
	 	<div id="page">
			<h2 style="color: blue;">Informações:</h2>	
		
	

	<?php
		//Codigo para listar ou editar as tabelas controles 
		while ($consulta = mysqli_fetch_assoc($unidade)) { ?>
			

		<div class="search">	
		 
		 <form action="edit_matriz.php" method="post">
		<input hidden="" type="text" name="id" value="<?php echo $consulta["id"];?>"> 	
		<p>&nbspCGC:&nbsp <input id="teste" style="margin-left: 0.3em; text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="cgc" size="3" maxlength="auto" width="auto" value="<?php echo $consulta["cgc"];?>"></p><br>
		<p>Nome: <input style="background-color: #F0F8FF; border-radius: 10px;" type="text" name="nome" size="50" maxlength="auto" width="auto" value="<?php echo $consulta["nome"];?>">&nbsp
		 		 Total E1:&nbsp <input style="margin-left: 0.2em; text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="link" size="4" value="<?php echo $consulta["link"];?>"></p><br />
		
	    <p>Tronco Chave 1: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="chav_pri" size="10" value="<?php echo $consulta["chave_pri"];?>">
		 		DDR Inicial: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="ddrstar_pri" size="10" value="<?php echo $consulta["ddr_inicial_pri"];?>"> 
					 DDR Final: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;"  type="text" name="ddrend_pri" size="10" value="<?php echo $consulta["ddr_final_pri"];?>"></p>
				

				<?php if ($consulta["chave_sec"]) {
					
					
	        		echo " <p>Tronco Chave 2: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"chave_sec\" size=\"10\" value=\"";
	        		echo $consulta["chave_sec"];
	        		echo "\">&nbsp";	        		
		 			echo "DDR Inicial: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrstar_sec\" size=\"10\" value=\"";
		 			echo $consulta["ddr_inicial_sec"];
		 			echo "\">&nbsp";
				  	echo "DDR Final: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrend_sec\" size=\"10\" value=\"";
				  	echo $consulta["ddr_final_sec"];
				  	echo "\"></p>";
				  	}
	        		 ?>	
					
	        	<?php if ($consulta["chave_ter"]) {
	        		
	        		echo "<p>Tronco Chave 3: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"chave_ter\" size=\"10\" value=\"";
	        		echo $consulta["chave_ter"];
	        		echo "\">&nbsp";
		     		echo "DDR Inicial: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrstar_ter\" size=\"10\" value=\"";
		     		echo $consulta["ddr_inicial_ter"];
		     		echo "\">&nbsp";
			    	echo "DDR Final: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrend_ter\" size=\"10\" value=\"";
			    	echo $consulta["ddr_final_ter"];
			    	echo "\"></p>";
			    } ?>	 


			    <?php if ($consulta["chave_quar"]) {
	        		
	        		echo "<p>Tronco Chave 4: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"chave_quar\" size=\"10\" value=\"";
	        		echo $consulta["chave_quar"];
	        		echo "\">&nbsp";
		     		echo "DDR Inicial: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrstar_quar\" size=\"10\" value=\"";
		     		echo $consulta["ddr_inicial_quar"];
		     		echo "\">&nbsp";
			    	echo "DDR Final: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrend_quart\" size=\"10\" value=\"";
			    	echo $consulta["ddr_final_quar"];
			    	echo "\"></p>";
			    } ?>	 				


			    <?php if ($consulta["chave_quint"]) {
	        		
	        		echo "<p>Tronco Chave 5: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"chave_quint\" size=\"10\" value=\"";
	        		echo $consulta["chave_quint"];
	        		echo "\">&nbsp";
		     		echo "DDR Inicial: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrstar_quint\" size=\"10\" value=\"";
		     		echo $consulta["ddr_inicial_quint"];
		     		echo "\">&nbsp";
			    	echo "DDR Final: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrend_quint\" size=\"10\" value=\"";
			    	echo $consulta["ddr_final_quint"];
			    	echo "\"></p>";
			    } ?>	 	
		           
		     	
		     	 <?php if ($consulta["chave_sext"]) {
	        		
	        		echo "<p>Tronco Chave 6: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"chave_sext\" size=\"10\" value=\"";
	        		echo $consulta["chave_sext"];
	        		echo "\">&nbsp";
		     		echo "DDR Inicial: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrstar_sext\" size=\"10\" value=\"";
		     		echo $consulta["ddr_inicial_sext"];
		     		echo "\">&nbsp";
			    	echo "DDR Final: <input style=\"text-align: center; background-color: #F0F8FF; border-radius: 10px;\" type=\"text\" name=\"ddrend_sext\" size=\"10\" value=\"";
			    	echo $consulta["ddr_final_sext"];
			    	echo "\"></p><br>";
			    } ?>	
		
	                	        <p>Central: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="central" size="36" value="<?php echo $consulta["marca"];?>">
							       	Modelo: <input style="text-align: center; margin-left: 0.3em; background-color: #F0F8FF; border-radius: 10px;" type="text" name="modelo" size="25" value="<?php echo $consulta["modelo"];?>"></p>
		
					        <p>IP Primário:<input style="margin-left: 1.2em;text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="ip_pri" size="13" value="<?php echo $consulta["ip"];?>">&nbsp  
					     			Serie Primario: <input style="margin-left: 1.8em;text-align: center; background-color: #F0F8FF; border-radius: 10px; " type="text" name="serie_pri" size="30" value="<?php echo $consulta["serie"];?>"></p>
		
	        		     <p>IP Secudário: <input style="margin-left: 0.1em; text-align: center; background-color: #F0F8FF; border-radius: 10px;" style="margin-left: 0.2em;" type="text" name="ip_sec" size="13" value="<?php echo $consulta["ip_sec"];?>">&nbsp 
							  Serie Secundario:<input style="margin-left: 0.8em; text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="serie-sec" size="30" value="<?php echo $consulta["serie_sec"];?>"></p>
		
		        	<p>IP Gateway: <input style="margin-left: 0.6em; text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="ip_gw" size="13" value="<?php echo $consulta["ip_gw"];?>">&nbsp 
				       Serie Gateway: <input style="margin-left: 1.8em; text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="serie_gw" size="30" value="<?php echo $consulta["serie_gw"];?>"></p><br />
	 
				<p>Operadora: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="opera" value="<?php echo $consulta["operadora"];?>">&nbsp
					Portas: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="portas" size="5" value="<?php echo $consulta["porta"];?>">&nbsp		
			Data Migração: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="data" size="10" value="<?php echo $consulta["data_migra"];?>"></p><br>

		<p>Garantia: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="garant" size="9" value="<?php echo $consulta["garantia"];?>">
					Empresa: <input style="text-align: center; background-color: #F0F8FF; border-radius: 10px;" type="text" name="empresa" size="28" value="<?php echo $consulta["empresa"];?>">
							Data:&nbsp <input style="text-align: center; background-color: #B0C4DE; border-radius: 10px;" type="text" name="manuten" size="9" value="<?php echo $consulta["data"];?>"></p><br>
		
	<?php } ?>	
	
		<div class="editar">
		<?php if ($_SESSION["user_nivel"] == "admin") { ?>	
		<input type="submit" name="submit" value="Editar">
	<?php } ?>
		</div>
	   </form>
	  </div>
	 </div>
	</article>
</div>
</body>
<?php mysqli_free_result($unidade); ?>
<?php include_once("../includes/footer.php"); ?>


