<?php include_once("../includes/session.php"); ?>
<?php include_once("../includes/db_conection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php include_once("../includes/header.php"); ?>

<div id="main">
		<div id="navigation">
			
		</div>
		<div id="page">
			<h2 style="color: #0040FF;">Informações:</h2>	
		
	<div class="container">
	<div class="row">
		<div class="text-center">
			<h1>Campos adicionais</h1>
			<p>Adicione quantos campos quiser!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 col-md-offset-1">
			<label>Email</label>
			<input type="text" class="form-control campoDefault" placeholder="Este campo é fixo!"/>
			
			<div id="imendaHTMLemail"></div>
			
			<a href="#" id="btnAdicionaEmail" ><i class="fa fa-plus"></i> Adicionar mais um(a)</a>
		</div>
		<div class="col-md-5">
			<label>Telefone</label>
			<input type="text" class="form-control campoDefault" placeholder="Este campo é fixo!"/>
			
			<div id="imendaHTMLtelefone"></div>
			
			<a href="#" id="btnAdicionaTelefone" ><i class="fa fa-plus"></i> Adicionar mais um(a)</a>
		</div>
	</div>
	<div class="row text-center">
		<button class="btn btn-lg btn-primary" id="btnSalvar">Salvar formulário</button>
	</div>
</div>
	<script type="text/javascript">

	var idContador = 0;
			
	function exclui(id){
		var campo = $("#"+id.id);
		campo.hide(200);
	}

	$( document ).ready(function() {
		
		$("#btnAdicionaEmail").click(function(e){
			e.preventDefault();
			var tipoCampo = "email";
			adicionaCampo(tipoCampo);
		})
		
		$("#btnAdicionaTelefone").click(function(e){
			e.preventDefault();
			var tipoCampo = "telefone";
			adicionaCampo(tipoCampo);
		})
		
		function adicionaCampo(tipo){

			idContador++;
			
			var idCampo = "campoExtra"+idContador;
			var idForm = "formExtra"+idContador;
		
			var html = "";
			
			html += "<div style='margin-top: 8px;' class='input-group' id='"+idForm+"'>";
			html += "<input type='text' id='"+idCampo+"' class='form-control novoCampo' placeholder='Insira um "+tipo+"'/>";
			html += "<span class='input-group-btn'>";
			html +=	"<button class='btn' onclick='exclui("+idForm+")' type='button'><span class='fa fa-trash'></span></button>";html +=	"<button class='btn' onclick='exclui("+idForm+")' type='button'><span class='fa fa-trash'></span></button>";
			html += "</span>";
			html += "</div>";
			
			$("#imendaHTML"+tipo).append(html);
		}
		
		$(".btnExcluir").click(function(){
			console.log("clicou");
			$(this).slideUp(200);
		})
		
		$("#btnSalvar").click(function(){
		
		var mensagem = "";
		var novosCampos = [];
		var camposNulos = false;
		
			$('.campoDefault').each(function(){
				if($(this).val().length < 1){
					camposNulos = true;
				}
			});
			$('.novoCampo').each(function(){
				if($(this).is(":visible")){
					if($(this).val().length < 1){
						camposNulos = true;
					}
					//novosCampos.push($(this).val());
					mensagem+= $(this).val()+"\n";
				}
			});
			
			if(camposNulos == true){
				alert("Atenção: existem campos nulos");
			}else{
				alert("Novos campos adicionados: \n\n "+mensagem);
			}
			
			novosCampos = [];
		})
		
	});
	
	</script>


		</div>
		
	</div>
	

</body>
<?php include_once("../includes/footer.php"); ?>


