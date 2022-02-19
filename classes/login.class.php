<?php
class Login
{
	
	// Variáveis
	private $usuario, $senha;

	// Construtor
	public function __construct($usuario, $senha )
	{		
		$this->usuario = $usuario;			
		$this->senha = md5($senha);		
		
	}	
	
	// Realiza o login do usuário, cria as sessões e retorna mensagem de erro ou sucesso
	public function logar()
	{		
		$mySQL = new BD();
		
		$query = "SELECT * FROM usuarios WHERE login = '".$this->usuario."'";
		
		$result = $mySQL->executeQuery($query);		
		
		// Caso não encontre o usuário
		if($result->num_rows==0)
		{
			$retorno["erro"] = true;
			$retorno["mensagem_erro"] = "Usuário não cadastrado no sistema!";
			
			echo json_encode($retorno);
		}
		else
		{
			$row = $result->fetch_array();
			//echo $row["senha"];			
			
			// Verifica se a senha está correta
			if($this->senha == $row["senha"])
			{				
				$retorno["erro"] = false;
				$retorno["mensagem_erro"] = "Login efetuado com sucesso!";
				
				//CRIA A SESSÃO E ARMAZENA OS DADOS
				session_start();
				
				$_SESSION["nome"] = $row["nome"];
				$_SESSION["login"] = $row["login"];
				$_SESSION["senha"] = $row["senha"];
			
				echo json_encode($retorno);
			}
			else
			{
				$retorno["erro"] = true;
				$retorno["mensagem_erro"] = "Senha incorreta!";
			
				echo json_encode($retorno);
			}
		}		
	}// fim function logar	
	
}//fim class
?>
