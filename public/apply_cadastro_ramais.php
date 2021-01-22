<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirmar_login() ?>
<?php $context = "admin";?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php require_once("../includes/validations.php"); ?>
<?php include_once("../includes/header.php"); ?>


<?php
	if (isset($_POST["campo"])) {
		// formulario foi submetido

	//	$campo = array(
		$cgc = $_POST["cgc"];
		$cgc_id = $_POST["cgc_id"];
		$ramal = $_POST['campo'][0];
 		$aparelho = $_POST['campo'][1];
 		$matricula = $_POST['campo'][2];
 		$data_instalacao = $_POST['campo'][3];
 		$observacao = $_POST['campo'][4];
 	//);
   		//foreach($campo as $key => $value ){
   		//$cgc = mysql_prep($_POST["cgc"]);
   		//$k[]=$key;
   		//$ap[]=$value;
   		//}	 
		//$ap=implode(",", $ap);
     	///$k=implode(",", $k);	
		//ecesando o banco
		$query = "INSERT INTO ramais_ag_centralizado (cgc, ramal, aparelho, matricula, data_instalacao, observacao) VALUES ('{$cgc}', '{$ramal}', '{$aparelho}', '{$matricula}', '{$data_instalacao}', '{$observacao}')";		
		
		$result = mysqli_query($conexao, $query);		
		
		if ($result) {
			$_SESSION["mensagem"] = "Ramal adicionado com sucesso!";
			redirect_to("form_ramais_cadastro_teste.php?id=$cgc&&cgc=$cgc_id");
		} else {
				//falhou
			$_SESSION["mensagem"] = "O ramal não pode ser criado.";
			redirect_to("form_ramais_cadastro_teste.php?id=$cgc");
		}
		
		 
}		 
	 
?>
