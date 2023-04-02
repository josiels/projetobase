<?php

require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../config/CRUDFunctions.php');

/**
 * Classe UserController para gerenciar as operações CRUD de usuários
 */
class UserController extends CRUDFunctions 
{
    
    /**
     * Construtor da classe
     */
    public function __construct() 
    {
        parent::__construct('users_db');
    }

    //ÍNICIO do estudo de ROTAS


    //FIM do estudo de ROTAS
    
    /**
     * Método para criar um novo usuário
     * @param User $user Objeto User contendo os dados do usuário a ser criado
     * @return bool Resultado da operação
     */
    public function create($user) 
    {
        $query = "INSERT INTO {$this->table} (key_code, name_user, email_user, passkey_user, nivel_user) VALUES (?, ?, ?, ?, ?)";
        
        $params = [
            $user->getKey(),
            $user->getName(), 
            $user->getEmail(), 
            $user->getPassKey(),
            $user->getLevel()
        ];

        return $this->executeInsertQuery($query, $params);
    }
    
    /**
     * Método para buscar um usuário pelo ID
     * @param int $id ID do usuário a ser buscado
     * @return User Objeto User contendo os dados do usuário buscado ou null caso não seja encontrado
     */
    public function read($id) 
    {
        $query = "SELECT * FROM {$this->table} WHERE key_code = ?";
        
        $params = [$id];
        
        $result = $this->executeReadQuery($query, $params);
        
        if ($result) {
            $user = new User();
            $user->setKey($result['key_code']);
            $user->setName($result['name_user']);
            $user->setEmail($result['email_user']);
            $user->setPasskey($result['passkey_user']);
            $user->setLevel($result['level_user']);
            
            return $user;
        }
        return null;
    }
    
    /**
     * Método para buscar um usuário pelo ID
     * @param int $id ID do usuário a ser buscado
     * @return User Objeto User contendo os dados do usuário buscado ou null caso não seja encontrado
     */
    public function readAll() 
    {
        $query = "SELECT * FROM {$this->table}";
            
        return $this->executeReadAllQuery($query);
    }

    /**
     * Método para atualizar um usuário
     * @param User $user Objeto User contendo os dados do usuário a ser atualizado
     * @return bool Resultado da operação
     */
    public function update($user) 
    {
        $query = "UPDATE {$this->table} SET name_user = ?, email_user = ?, passkey_user = ?, nivel_user = ? WHERE key_user = ?";
        
        $params = [
            $user->getName(), 
            $user->getEmail(), 
            $user->getPasskey(),
            $user->getLevel(), 
            $user->getKey()];

        return $this->executeUpdateQuery($query, $params);
    }
    
    /**
     * Método para excluir um usuário pelo Key_code
     * @param int $key do usuário a ser excluído
     * @return bool Resultado da operação
     */
    public function delete($key) 
    {
        $query = "DELETE FROM {$this->table} WHERE key_code = ?";
        
        $params = [$key];
        
        return $this->executeDeleteQuery($query, $params);
    }


}

