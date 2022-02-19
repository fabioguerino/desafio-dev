<?php
include("classes/BD.class.php");
include("classes/operacoes.class.php");
/*
if(isset($_POST["login"]) && $_POST["login"] != "")
{
	require_once("classes/login.class.php");
	require_once("classes/BD.class.php");

	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	$usuario = new Login($login,$senha, "");

	// Realiza o login do usuário, cria as sessões e retorna mensagem de erro ou sucesso 
	$usuario->logar();
	
	if($retorno["erro"] === true)
	{
		echo "Erro";

	}
	else
	{
		header("menu.php");	
	}
}
*/
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
			$("#button_login").click(function()
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
		<form id="form_login" action="index.php" method="post">					
			
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