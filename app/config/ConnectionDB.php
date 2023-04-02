<?php
 
 require_once 'ConstantesDB.php';
 
 class ConnectionDB 
 {
     private $pdo;
 
     /**
      * Construtor da classe
      */
     public function __construct() {
         $this->connect();
     }
 
     /**
      * Retorna a conexão PDO
      * 
      * @return PDO
      */
     public function getConnection(): PDO
     {
         return $this->pdo;
     }
 
     /**
      * Conecta ao banco de dados usando PDO e com métodos de acesso sanitizados e uso de CSRF
      */
     private function connect(): void
     {
         $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
         $options = [
             PDO::ATTR_EMULATE_PREPARES   => false,
             PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
         ];
 
         try {
             $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
         } catch (PDOException $e) {
             throw new PDOException($e->getMessage(), (int)$e->getCode());
         }
     }
}
 

