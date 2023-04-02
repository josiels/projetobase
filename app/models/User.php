<?php

/**
 * Classe para representar um usuário no sistema.
 */
class User {
    /**
     * A chave única do usuário.
     *
     * @var string
     */
    private $key;
  
    /**
     * O nome do usuário.
     *
     * @var string
     */
    private $nome;
  
    /**
     * O e-mail do usuário.
     *
     * @var string
     */
    private $email;
  
    /**
     * A senha criptografada do usuário.
     *
     * @var string
     */
    private $passkey;

    /**
     * O nível de acesso do usuário.
     *
     * @var int
     */
    private $level;

    public function __construct() {
      // Construtor padrão sem parâmetros
    }
  
    /**
     * Construtor da classe.
     *
     * @param string $key A chave única do usuário.
     * @param string $nome O nome do usuário.
     * @param string $email O e-mail do usuário.
     * @param string $passkey A senha criptografada do usuário.
     */
    //public function __construct($nome, $email, $passkey) {
      //$this->key = uniqid();//gera uma chave unica para identificação do usuário
    //  $this->nome = $nome;
    //  $this->email = $email;
    //  $this->passkey = $passkey;
    //}
  
    /**
     * Retorna a chave única do usuário.
     *
     * @return string A chave única do usuário.
     */
    public function getKey() {
      return uniqid();
    }

    /**
     * Define o nome do usuário.
     *
     * @param string $key O nome do usuário.
     */
    public function setKey($key) {
      $this->nome = $key;
    }

    /**
     * Retorna o nome do usuário.
     *
     * @return string O nome do usuário.
     */
    public function getName() {
      return $this->nome;
    }
  
    /**
     * Define o nome do usuário.
     *
     * @param string $nome O nome do usuário.
     */
    public function setName($nome) {
      $this->nome = $nome;
    }
  
    /**
     * Retorna o e-mail do usuário.
     *
     * @return string O e-mail do usuário.
     */
    public function getEmail() {
      return $this->email;
    }
  
    /**
     * Define o e-mail do usuário.
     *
     * @param string $email O e-mail do usuário.
     */
    public function setEmail($email) {
      $this->email = $email;
    }
  
    /**
     * Retorna a senha criptografada do usuário.
     *
     * @return string A senha criptografada do usuário.
     */
    public function getPasskey() {
      return $this->passkey;
    }

    /**
     * Define a senha criptografada do usuário.
     *
     * @param string $passkey A senha do usuário.
     */
    public function setPasskey($passkey) {
      $this->passkey = password_hash($passkey, PASSWORD_DEFAULT);
    }

    /**
     * Retorna o nível do usuário.
     *
     * @return int O nível do usuário.
     */
    public function getLevel() {
      return $this->level;
    }
  
    /**
     * Define o nível do usuário.
     *
     * @param int $level O nível do usuário.
     */
    public function setLevel($level) {
      $this->level = $level;
    }

}

?>