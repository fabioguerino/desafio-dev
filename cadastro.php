<?php
include "menu.php";
?>
<html>
<head></head>
<body>
<?php
include("classes/BD.class.php");
include("classes/operacoes.class.php");

if(isset($_POST["arquivo"]) && $_POST["arquivo"] != "")
{
	$arquivo = $_POST["arquivo"];
	$file = new Operacoes();
	$file->gravarArquivo($arquivo);
}
?>

<form action="cadastro.php" method="post">
	<br>
	<br>
	<h1 align="center">Cadastro de Movimentações Financeiras</h1>
	<br>
	<br>
	<div align="center">
		<label>Selecione o arquivo CNAB para enviar para o banco de dados:</label>
		<br>
		<br>	
		<input type="file" name="arquivo">	
		<br>
		<br>
		<br>
		<input type="submit" value="Enviar" class="botao">
	</div>
</form>
</body>


</html>