<?php
include "topo_pagina.php";
?>
<div class="mensagem_erro" id="erro_permissao_modulo">
	Usuário não possui permissão para acessar o módulo!
</div>

<div id="conteiner_menu">
	
	<div class="conteiner" id="inicio">
		<?php // A imagem do ícone fica no CSS como background do div conteiner ?>
		<a href="index.php" class="icone_menu"><div class="texto">INÍCIO</div></a>
	</div>
	
	<div class="conteiner" id="cadastro">
		<?php // A imagem do ícone fica no CSS como background do div conteiner ?>
		<a href="cadastro.php" class="icone_menu"><div class="texto">CADASTRO</div></a>
	</div>
	
	<div class="conteiner" id="consulta">
		<?php // A imagem do ícone fica no CSS como background do div conteiner ?>
		<a href="consulta.php" class="icone_menu"><div class="texto">CONSULTA</div></a>
	</div>
	
</div>
</body>
</html>