<?php
require_once("classes/login.class.php");
require_once("classes/BD.class.php");

$login = $_POST["login"];
$senha = $_POST["senha"];

// Paramêtros do construtor: 
// Arquivo de conexão
// Tabela do banco de dados
// Nome do usuário
// Senha do usuário
// Nome do campo de login
// Nome do campo de senha
// Módulo de acesso 
$usuario = new Login($login,$senha, "");

// Realiza o login do usuário, cria as sessões e retorna mensagem de erro ou sucesso 
$usuario->logar(); 
?>