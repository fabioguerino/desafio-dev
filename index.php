<?php
include("classes/BD.class.php");
include("classes/operacoes.class.php");
/*
$mySQL 			= new BD();
$res 			= $mySQL->executeQuery("SELECT * FROM teste;");
$rs_totalRows 	= $res->num_rows;

echo $rs_totalRows;

$file = new Operacoes();
$file->gravarArquivo("CNAB.txt");
*/
if(isset($_POST["arquivo"]) && $_POST["arquivo"] != "")
{
	$arquivo = $_POST["arquivo"];
	$file = new Operacoes();
	$file->gravarArquivo($arquivo);
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="folha_estilo.css" />
	<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.form.min.js"></script>
	<script type="text/javascript">
		// Quando carregado a página
		$(function()
		{ 
			$(document).on("click","#button_login",function()
			{				
				var login = $("#login").val();
				var senha = $("#senha").val();
				
				$.ajax(
				{
					type: "POST",
					data: {login:login, senha:senha},
					url: "logar.php",
					dataType: "json",
					success: function(resultado)
					{   
						// Mostra mensagem de erro ou sucesso
						alert(resultado.mensagem_erro);
						
						// Se não deu erro, redireciona para página de menu
						if(resultado.erro==false)
						{
							window.location.href = "menu.php";
						}					
					}										
				});	// Fim ajax			
			});	// Fim button login click		
			
		});	// Fim function que carrega com a página
	</script>
</head>
<body>
<div class="quadrado_login">
	<h2 align="center">SISMF</h2>	
	<p align="center">Sistema de Movimentações Financeiras</p>
	<br><br>
	
	<div class="conteiner_logo_forms">	
		<div class="formularios_login" id="formularios_login">
		<form id="form_login" action="logar.php" method="post">					
			
			<input type="text" id="login" name="login" class="text_login" placeholder="Usuário">
			<br><br>

			<input type="password" id="senha" name="senha" class="text_login" placeholder="Senha">		
			<br><br>
		
			<input type="button" id="button_login" class="button_login" value="Acessar">			
			
		</form>	
		</div>	
	</div>
</div>
</body>
</html>