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
<br>
<div align="center">
<br>
<br>
	<table border = 0 class="lista">

	<?php
	foreach($lojas as $loja)
	{
	?>
		<th colspan=7><?php echo $loja; ?></th>
		<tr>
			<th class = "vermelho">Tipo</th>
			<th class = "vermelho">Data</th>
			<th class = "vermelho">Valor</th>
			<th class = "vermelho">CPF</th>
			<th class = "vermelho">Cartão</th>
			<th class = "vermelho">Hora</th>
			<th class = "vermelho">Dono da Loja</th>
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
				<td class = "vermelho"><?php echo $operacao["tipo"]; ?></td>
				<td class = "vermelho"><?php echo $operacao["data"]; ?></td>
				<td class = "vermelho"><?php echo $operacao["valor"]; ?></td>
				<td class = "vermelho"><?php echo $operacao["cpf"]; ?></td>
				<td class = "vermelho"><?php echo $operacao["cartao"]; ?></td>
				<td class = "vermelho"><?php echo $operacao["hora"]; ?></td>
				<td class = "vermelho"><?php echo $operacao["donoLoja"]; ?></td>			
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
</div>