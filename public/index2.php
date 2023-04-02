<?php
    //require_once(__DIR__ . "/../app/controllers/UserController.php");
    require_once('../app/controllers/UserController.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto base</title>
</head>
<body>
    <h1>Index</h1>
    <h3>Public</h3>
    <ul>
        <li><a href="/projetobase/dashboard">Painel administrativo</a></li>
        <li><a href="/projetobase/app/views/testeCadastro.php">Incluir novo item</a></li>
        <li><a href="/projetobase/app/config/login.php">Login</a></li>
    </ul>
    <hr />
<?php
    $userControler = new UserController();

    $listaUsers = $userControler->readAll();
    

    foreach($listaUsers as $value)
    {
        echo 'Nome: '.$value['name_user'].' - ';
        echo '<a href="?action=delete&code='.$value['key_code'].'">Deletar</a><br />';
    }

    //DELETAR USUÁRIOS
    if(isset($_GET['action']) && isset($_GET['code'])){
        $userControler->delete($_GET['code']);
        header("Location: ./");
        exit;
    }


?>

</body>
</html>