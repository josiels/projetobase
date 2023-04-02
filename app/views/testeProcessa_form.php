<?php

require_once('../controllers/UserController.php');



// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cria um objeto UserController
    $userController = new UserController();

    // Cria um objeto com as informações do usuário
    //$nome = $_POST['nome'];
    //$email = $_POST['email'];
    //$senha = $_POST['senha'];

    $user = new User();
    $user->setName($_POST['nome']);
    $user->setEmail($_POST['email']);
    $user->setPasskey($_POST['senha']);
    $user->setLevel($_POST['level']);

    // Chama o método create para criar o usuário no banco de dados
    $result = $userController->create($user);

    // Verifica se a criação do usuário foi bem sucedida
    if ($result) {
        header("Location: /projetobase/public/");
        exit;
       //echo "Usuário criado com sucesso!";
    } else {
        echo "Erro ao criar usuário.";
    }

    $dadosInseridos = $userController->readAll();

    //print_r($dadosInseridos);

    foreach($dadosInseridos as $value){
        echo $value['name_user'].'<hr />';
    }

}

?>