<?php
// Inicia a sessão
session_start();

// Requer a classe UserAuth
require_once('Auth.php');

// Cria uma instância da classe UserAuth passando a conexão PDO como parâmetro
$userAuth = new UserAuth();

// Chama o método logout() da classe UserAuth para encerrar a sessão do usuário
$userAuth->logout();

// Redireciona o usuário para a página de login
header('Location: login.php');

// Encerra o script PHP
exit;
?>
