<?php
// 1. Criar conexao com o banco de dados
//	$bd_host = "localhost";
//	$bd_usuario = "carmelia";
//	$bd_senha = "temp123";
//	$bd_nome = "carmelia_vinho";


// Definindo as variaveis em funções 
	define("DB_HOST", "localhost");
	define("DB_USUARIO", "telecomdb");
	define("DB_SENHA", "telecom@teleco");
	define("DB_NOME", "telefonia");
	
	$conexao = mysqli_connect(DB_HOST, DB_USUARIO, DB_SENHA, DB_NOME);
	// 2. Testar conexão criada
	if (mysqli_connect_errno()) {
		die("Coneão com o banco de dados falhou: " . mysqli_connect_error() . 
			" (" . mysqli_connect_errno() . "	)"
	   ); 
		
	}

		if (isset($_POST['submit'])) {
		
		

		$cgc = $_POST['cgc'];	
		//$categorias = "SHOW TABLES FROM $dbname";
		$query  = "SELECT * ";
		$query .= "FROM controle ";
		$query .= "WHERE cgc={$cgc}";
		//$query .= "ORDER BY cgc ASC";
		$data = mysqli_query($conexao, $query);
		$total = mysqli_num_rows($data); 
		if($total === 0){
			die("consulta ao banco falhou");
		}

		}
?>

<?php include_once("../includes/header.php"); ?>

<body>
	<form action="teste_categoria.php" method="post">
		<input type="text" name="cgc" value=""><br>
		<input type="submit" name="submit" value="Consultar">

	</form><br>
	
	<?php

		while ($consulta = mysqli_fetch_assoc($data)) {
			echo "<b>"."CGC: "."</b>". $consulta["cgc"] . "<br>";
			echo "<b>"."Agencia: "."</b>" . $consulta["nome"] . "<br>";
			echo "<b>"."Serial NUmber: "."</b>" . $consulta["num serie"] . "<br>";
			echo "<b>"."Centralizado: "."</b>" . $consulta["dns_centralizado"] . "<br>";
			echo "<b>"."DDD: "."</b>" . $consulta["ddd"] . "<br>";
			echo "<b>"."DDR Inicial: "."</b>" . $consulta["ddr_inicial"] . "<br>";

			

}

	?>
	<?php mysqli_close($conexao); ?>
</body>


