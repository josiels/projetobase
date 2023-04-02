<?php

require_once('ConnectionDB.php');

/**
 * Classe responsável por realizar a autenticação de usuários
 */
class UserAuth
{
    private $pdo; // Conexão com o banco de dados

    /**
     * Construtor da classe. Recebe uma conexão com o banco de dados como parâmetro.
     * @param PDO $pdo Conexão com o banco de dados
     */
    public function __construct()
    {
        $this->pdo = (new ConnectionDB())->getConnection();
    }

    /**
     * Método responsável por realizar o login do usuário.
     * @param string $username Nome de usuário informado pelo usuário
     * @param string $password Senha informada pelo usuário
     * @return bool Retorna true se o login for bem-sucedido e false caso contrário
     */
    public function login($username, $password): bool
    {
        // Sanitiza os dados de entrada
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($password, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Busca o usuário no banco de dados
        $stmt = $this->pdo->prepare('SELECT * FROM users_db WHERE email_user = :login LIMIT 1');
        $stmt->execute([':login' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário foi encontrado e se a senha está correta
        if ($user && password_verify($password, $user['passkey_user'])) {
            // Inicia a sessão
            session_start();
            $_SESSION['user_id'] = $user['key_code'];
            $_SESSION['user_nome'] = $user['nome_user'];
            $_SESSION['user_email'] = $user['email_user'];
            $_SESSION['user_nivel'] = $user['nivel_user'];
            return true;
        }
        return false;
    }


    /**
     * Método responsável por verificar se o usuário está logado.
     * @return bool Retorna true se o usuário estiver logado e false caso contrário
     */
    public function isLogged(): bool
    {
        if (session_status() == PHP_SESSION_NONE) 
        {
            session_start();
        }
        
        return isset($_SESSION['user_id']);
    }

    /**
     * Método responsável por realizar o logout do usuário.
     */
    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
    }

    /**
     * Método responsável por verificar nível de acesso do usuário no sistema.
     * Verifica se o usuário tem permissão para acessar a página, caso não tenha ele será redirecionado para uma página pré definida.
     * @param int $levelPage nível exigido da página.
     * @param int $levelUser nível do usuario que está acessando.
     * @return bool Retorna true caso tenha permissão de acesso e falso caso não tenha.
     */
    public function checkLevel($levelPage, $levelUser): void
    {
        try{
            if($levelUser != $levelPage)
            {
                header('Location: accessdenied.php');
                exit();
            } else {
                //$accessLog = new AccessLog();
                //$accessLog->registerAccess($levelUser);
            }
        }catch (Exception $e) {
            //error_log('Erro na função checkLevel: ' . $e->getMessage());
        }
    }

    /**
     * Método responsável por expulsar o usuário do sistema.
     * Verifica se o usuário está logado e, se sim, realiza o logout e redireciona para a página de login.
     */
    public function kickUser(): void
    {
        // Verifica se o usuário está logado
        if ($this->isLogged()) {
            // Realiza o logout
            $this->logout();

            // Redireciona o usuário para a página de login
            header('Location: login.php');
            exit;
        }
    }
}
