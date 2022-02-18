<?php
class Operacoes
{
	//include("BD.class.php");
	
	function Operacoes()
	{
		
	}	
	function gravarArquivo($arquivo)
	{
		$pointer = fopen($arquivo, 'r');		
		$mySQL = new BD();
		
		while(!feof($pointer))
		{
			$linha = fgets($pointer);		
			//echo "<br>$linha";
			$tipo = (int)substr($linha,0,1);
			
			$dataAno = substr($linha,1,4);
			$dataMes = substr($linha,5,2);
			$dataDia = substr($linha,7,2);			
			$data = $dataAno."-".$dataMes."-".$dataDia;
			
			$valor = ((float)substr($linha,9,10))/100.00;
			
			$cpf = substr($linha,19,11);

			$cartao = substr($linha,30,12);
	
			$hora = substr($linha,42,6);
			
			$donoLoja = substr($linha,48,14);
			
			$nomeLoja = substr($linha,62);
			
			/*	
			echo "<br>$linha";
			echo "<br>$tipo";
			echo "<br>$data";
			echo "<br>$valor";
			echo "<br>$cpf";
			echo "<br>$cartao";
			echo "<br>$hora";
			echo "<br>$donoLoja";
			echo "<br>$nomeLoja";
			echo "<br>";
			*/
			
			if($linha!="")			
			{
				$res = $mySQL->executeQuery("INSERT INTO movimentacoesfinanceiras(
				tipo,
				data,
				valor,
				cpf,
				cartao,
				hora,
				donoLoja,
				nomeLoja)VALUES(
				'$tipo',
				'$data',
				'$valor',
				'$cpf',
				'$cartao',
				'$hora',
				'$donoLoja',
				'$nomeLoja')");	
			}
		}			
	}
	
	function operacoesLoja($nome)
	{
		$mySQL = new BD();
		$res = $mySQL->executeQuery("SELECT * FROM movimentacoesfinanceiras WHERE nomeLoja ='".$nome."' ORDER BY nomeLoja");
		
		$operacoesLojas = array();
		$cont = 0;
		while($row = $res->fetch_object())
		{
				$operacoesLojas[$cont]["tipo"] = $row->tipo;
				$operacoesLojas[$cont]["data"] = $row->data;
				$operacoesLojas[$cont]["valor"] = $row->valor;
				$operacoesLojas[$cont]["cpf"] = $row->cpf;
				$operacoesLojas[$cont]["cartao"] = $row->cartao;
				$operacoesLojas[$cont]["hora"] = $row->hora;
				$operacoesLojas[$cont]["donoLoja"] = $row->donoLoja;				
				
				$cont++;
		}
		
		return $operacoesLojas;
		
	}
	
	function pegarTipos()
	{
		$mySQL = new BD();
		$res = $mySQL->executeQuery("SELECT * FROM tiposoperacoes ORDER BY tipo");
		
		$tipos = array();
		
		while($row = $res->fetch_object())
		{
				$tipos[$row->tipo]["descricao"] = $row->descricao;
				$tipos[$row->tipo]["natureza"] 	= $row->natureza;
				$tipos[$row->tipo]["sinal"] 	= $row->sinal;								
				
				
		}
		
		return $tipos;
	}
	
	function pegarLojas()
	{
		$mySQL = new BD();
		$res = $mySQL->executeQuery("SELECT DISTINCT nomeLoja FROM movimentacoesfinanceiras ORDER BY nomeLoja");
		
		$lojas = array();
		
		while($row = $res->fetch_object())
		{
				array_push($lojas, $row->nomeLoja);				
		}
		
		return $lojas;
	}		
}
?>