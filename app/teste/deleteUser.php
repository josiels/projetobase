<?php

require_once('../controllers/UserController.php');

$userController = new UserController();
$user = new User();

if(isset($_POST['key_code']))
{
    $codeUser = $_POST['key_code'];

    $dadosUser = $userController->delete($codeUser);

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
<h1>Buscar/Listar usu&aacute;rio</h1>
<ul>
    <li><a href="createUser.php">Criar</a></li>
    <li><a href="updateUser.php">Atualizar</a></li>
    <li><a href="readUser.php">Exibir</a></li>
    <li><a href="deleteUser.php">Deletar</a></li>
</ul>
<hr />
	<form method="POST" action="readUser.php">
		<label>Key_code</label>
		<input type="text" name="key_code"><br><br>
		<button type="submit">Deletar usuário</button>
	</form>
	<hr />
<?php
    $dadosAllUser = $userController->readAll();

    if(!empty($dadosAllUser)){
        foreach($dadosAllUser as $value)
        {
            echo $value['name_user'].' - '.$value['key_code'];
        }
    }
?>
</body>
</html>
	