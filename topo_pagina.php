<?php
session_start();
if(!isset($_SESSION["nome"]))
{header("Location:index.php");}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="folha_estilo.css" />
	<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<div class="topo_pagina">
	<div class="topo_pagina_sig">
		<a href="menu.php"></a>Sistema de Movimentações Financeiras
	</div>
	
	<div class="topo_pagina_menu">
		<?php 
			$nomePartes = explode(" ",$_SESSION["nome"]);
			$primeiroNome = $nomePartes[0];			
		?>			
		<?php			
			echo $primeiroNome;
		?>
	</div>
</div>