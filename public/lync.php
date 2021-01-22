<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php");  ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php include_once("../includes/header.php"); ?>
<?php  find_tables(); ?>

 	<div id="main">
		<div id="navigation">
			<br />
			<small>
				<a href="admin.php">&laquo; Menu Principal</a>
			</small>
			<ul class="categories">

			<b> 
			<?php
			 $table = find_tables();
			 while ($tables = mysqli_fetch_assoc($table)) {
			 ?>	
			 <li>
			 	<a href="search.php?controle=<?php echo $tables["Tables_in_telefonia"]?>"><?php echo $tables["Tables_in_telefonia"];?></a>
			 		
			</li><br>
				
			 <?php } ?>
			 
			 </ul>

			 	<nav>
			 		<ul class="prefix">
						<li><a href="">prefixo 3206</a>
						<ul class="submenu">
							<li><a href="">3206 por faixa</a></li>
							<li><a href="">3206 por predio</a></li>
						</ul>
						</li>
				</ul>	

			   </nav>
			 		
					
						
						
			<br />
		</b>
		</div>
		<div id="page">
			<h2>BEM VINDO AO SISTEMA DE CONTROLE TELECOM</h2><br />
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<h2> GITEBR!</h2>
			
		</div>
	</div>
	<?php mysqli_free_result($table); ?>

<?php include_once("../includes/footer.php"); ?>


