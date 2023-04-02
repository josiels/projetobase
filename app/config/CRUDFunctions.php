<?php

/**
 * Arquivo que contém a classe abstrata CRUD para realizar operações de CRUD genéricas em tabelas do banco de dados
 */

require_once('ConnectionDB.php');


/**
 * Classe abstrata CRUD para realizar operações de CRUD genéricas em tabelas do banco de dados
 */
abstract class CRUDFunctions 
{
    
    /**
     * Nome da tabela no banco de dados
     * @var string
     */
    protected $table;
    
    /**
     * Instância da classe de conexão com o banco de dados
     * @var ConnectionDB
     */
    protected $pdo;

    /**
     * Construtor da classe
     * 
     * @param string $table Nome da tabela do banco de dados
     */
    public function __construct(string $table) 
    {
        $this->table = $table;
        $connection = new ConnectionDB();
        $this->pdo = $connection->getConnection();
    }
    
    /**
     * Método abstrato para criar um novo registro na tabela
     * @param object $obj Objeto contendo os dados a serem inseridos na tabela
     * @return bool Resultado da operação
     */
    abstract public function create($obj);
    
    /**
     * Método abstrato para buscar um registro na tabela pelo seu ID
     * @param int $id ID do registro a ser buscado
     * @return mixed Objeto contendo os dados do registro buscado ou null caso não seja encontrado
     */
    abstract public function read($id);
    
    /**
     * 
     * 
     * 
     */
    abstract public function readAll();

    /**
     * Método abstrato para atualizar um registro na tabela
     * @param object $obj Objeto contendo os dados a serem atualizados na tabela
     * @return bool Resultado da operação
     */
    abstract public function update($obj);
    
    /**
     * Método abstrato para excluir um registro da tabela pelo seu ID
     * @param int $id ID do registro a ser excluído
     * @return bool Resultado da operação
     */
    abstract public function delete($id);
    
    /**
     * Método protegido para executar uma query no banco de dados
     * @param string $query Query SQL a ser executada
     * @param array $params Parâmetros da query (opcional)
     * @return mixed Resultado da query
     * @throws PDOException se ocorrer um erro na execução da query
     */
    protected function executeInsertQuery($query, $params = []): bool
    {
        try {
            $query = filter_var($query, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 
            foreach ($params as &$value) {
                $value = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
 
            $stmt = $this->pdo->prepare($query);
            
            return $stmt->execute($params);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    protected function executeReadAllQuery($query): array
    {
        try {
            $query = filter_var($query, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    protected function executeReadQuery($query, $params = []): array
    {
        try {
            $query = filter_var($query, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    protected function executeUpdateQuery($query, $params = []): bool 
    {
        try {
            $query = filter_var($query, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 
            foreach ($params as &$value) {
                $value = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
 
            $stmt = $this->pdo->prepare($query);
            
            return $stmt->execute($params);

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    protected function executeDeleteQuery($query, $params = []): bool
    {
        try {
            $stmt = $this->pdo->prepare($query);
            
            return $stmt->execute($params);

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
}

?>
