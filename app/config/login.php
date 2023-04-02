<?php
require_once('Auth.php');

// Verifica se o formulário de login foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cria uma instância da classe de autenticação de usuário
    $userAuth = new UserAuth();

    // Realiza o login
    if ($userAuth->login($username, $password)) {
        // Redireciona para a página inicial
        header('Location: logado.php');
        exit;
    } else {
        // Exibe mensagem de erro de login inválido
        $loginError = 'Usuário ou senha inválidos';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($loginError)) : ?>
        <div style="color: red"><?php echo $loginError; ?></div>
    <?php endif; ?>

    <form method="post">
        <div>
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username">
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
