<?php

require_once('../controllers/UserController.php');

$userController = new UserController();
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user->setName($_POST['nome']);
    $user->setEmail($_POST['email']);
    $user->setPasskey($_POST['senha']);

    $created = $userController->create($user);

    if ($created) {
       echo "Usuário criado com sucesso!";
    } else {
        echo "Erro ao criar usuário.";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create</title>
    <style type="text/css">
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        li {
            margin-right: 15px;
        }
        ul a{
            text-decoration: none;
        }
        ul a:hover{
            text-decoration: underline;
            color: #F00;
        }
    </style>
</head>
<body>
<h1>Criar novo usu&aacute;rio</h1>
<ul>
    <li><a href="createUser.php">Criar</a></li>
    <li><a href="updateUser.php">Atualizar</a></li>
    <li><a href="readUser.php">Exibir</a></li>
    <li><a href="deleteUser.php">Deletar</a></li>
</ul>
<hr />
	<form method="POST" action="createUser.php">
		<label>Nome</label>
		<input type="text" name="nome" required><br><br>
		<label>E-mail</label>
		<input type="email" name="email" required><br><br>
		<label>Senha</label>
		<input type="password" name="senha" required><br><br>
		<button type="submit">Criar usuário</button>
	</form>
	<hr />
</body>
</html>
	