<?php 
include "menu.php";
include("classes/BD.class.php");
include("classes/operacoes.class.php");

$ops = new Operacoes();

$tiposOperacoes = array();
$tiposOperacoes = $ops->pegarTipos();

$lojas = array();
$lojas = $ops->pegarLojas();

$operacoes =  array();

	
//var_dump($tiposOperacoes);
?>
<table border = 1>

<?php
foreach($lojas as $loja)
{
?>
	<th colspan=7><?php echo $loja; ?></th>
	<tr>
		<th>Tipo</th>
		<th>Data</th>
		<th>Valor</th>
		<th>CPF</th>
		<th>Cartão</th>
		<th>Hora</th>
		<th>Dono da Loja</th>
	</tr>
	<?php
	$operacoes = $ops->operacoesLoja($loja);
	$saldoLoja = 0;
	foreach($operacoes as $operacao)
	{
		if($tiposOperacoes[$operacao["tipo"]]["sinal"] == '+')
		{
			$saldoLoja = $saldoLoja + $operacao["valor"];
		}
		else if($tiposOperacoes[$operacao["tipo"]]["sinal"] == '-')
		{
			$saldoLoja = $saldoLoja - $operacao["valor"];
		}
		
	?>
		<tr>
			<td><?php echo $operacao["tipo"]; ?></td>
			<td><?php echo $operacao["data"]; ?></td>
			<td><?php echo $operacao["valor"]; ?></td>
			<td><?php echo $operacao["cpf"]; ?></td>
			<td><?php echo $operacao["cartao"]; ?></td>
			<td><?php echo $operacao["hora"]; ?></td>
			<td><?php echo $operacao["donoLoja"]; ?></td>			
		</tr>	
	<?php
	}
	?>
	<tr>
		<td colspan=7>SALDO: <?php echo $saldoLoja; ?></td>
	</tr>
	
	<tr></tr>
	<tr></tr>
	<tr></tr>
	<tr></tr>
<?php	
}
//var_dump($operacoes);
?>

</table>