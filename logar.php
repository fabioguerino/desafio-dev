<?php
require_once("classes/login.class.php");
require_once("classes/BD.class.php");

$login = $_POST["login"];
$senha = $_POST["senha"];

$usuario = new Login($login,$senha);

// Realiza o login do usuário, cria as sessões e retorna mensagem de erro ou sucesso 
$usuario->logar(); 
?>