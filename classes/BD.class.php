<?php
class BD
{
	var $host 		= "db";
	var $usuario	= "root";
	var	$senha 		= "102030";
	var $banco 		= "desafiobycoders";
	
	var $query;
	var $link;	
	var $result;
	
	function BD()
	{
		
	}
	
	function connect()
	{
		$this->link = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
		
		if(!$this->link)
		{
			echo "Falha na conexao com o Banco de Dados!<br />";
			echo "Erro: " . $this->link->error;
			die();
		}
		
	}	
	
	function executeQuery($query)
	{
		$this->connect();
		$this->query = $query;
		if($this->result = $this->link->query($this->query))
		{
			$this->disconnect();
			return $this->result;
		}
		else
		{
			echo "Ocorreu um erro na execução da SQL";
			echo "Erro :" . $this->link->error;
			echo "SQL: " . $query;
			die();
			disconnect();
		}
	}
	
	 function disconnect()
	 {
	 	$this->link->close();
	 }
}

?>