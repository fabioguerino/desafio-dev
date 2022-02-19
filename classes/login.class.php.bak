<?php
class Login
{
	
	// Variáveis
	private $usuario, $senha, $modulo;

	// Construtor
	public function __construct($usuario, $senha, $modulo)
	{		
		$this->usuario = $usuario;			
		$this->senha = md5($senha);			
		$this->modulo = $modulo;
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
	public function verificar_permissao()
	{
		// Incluindo arquivo de conexão/configuração
		require_once("../".$this->arquivo_conexao);
		
		$query = "SELECT * FROM ".$this->tabela." WHERE ".$this->campo_usuario." = '".$this->usuario."' and modulos like '%".$this->modulo."%'";
		
		$result = $mysqli->query($query);
		
		// Caso não tenha a permissão, dá mensagem de erro e reencaminha para página inicial
		if($result->num_rows==0)
		{
			?>
			
			<script>
				alert("Usuário não possui permissão para acessar o módulo!");
				//alert(document.getElementById("erro_permissao_modulo").value);
				window.location = "../index.php";
			</script>;
		<?php	
		
		}		
	}
}//fim class
?>
