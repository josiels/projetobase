<?php
session_start();

require_once('Auth.php');
/*
$userAuth = new UserAuth();

if (!$userAuth->isLogged()) {
    header('Location: login.php');
    exit;
}
*/

// Conteúdo da página index que só pode ser acessado pelo usuário logado
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Página com usuário deslogado</h1>
    <a href="logout.php">Sair</a>
</body>
</html>