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
<head></head>
<body>
<?php
include "menu.php";

?>
<form action="index.php" method="post">
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
		<input type="submit" value="Enviar">
	</div>
</form>
</body>


</html>